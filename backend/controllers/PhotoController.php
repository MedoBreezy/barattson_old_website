<?php
    namespace backend\controllers;

    use Yii;
    use backend\models\Photo;
    use backend\models\PhotoSearch;
    use backend\models\PhotoFiles;
    use common\components\HelperComponent;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\web\UploadedFile;
    use yii\helpers\BaseFileHelper;

    class PhotoController extends Controller
    {
        public function behaviors()
        {
            return [
                'ghost-access'=> [
                    'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
                ],
            ];
        }

        public function actions()
        {
            return [
                'uploadImage' => [
                    'class' => 'budyaga\cropper\actions\UploadAction',
                    'url' => '/uploads/photo',
                    'path' => '@uploads/photo',
                    'width' => 800,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new PhotoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['date' => SORT_DESC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
			$dataProvider->pagination = ['pageSize' => 50];

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        public function actionUploadFile()
        {
            $model = new PhotoFiles();
            $fileHandler = Yii::$app->request->post('file_handler');
            $files = UploadedFile::getInstances($model, 'file');

            if (count($files) >= 1) {
                $path = Yii::getAlias('@uploads/photo-files/').$fileHandler;
                BaseFileHelper::createDirectory($path, $mode = 0775, $recursive = true);

                $file = $files[0];
                $random = Yii::$app->getSecurity()->generateRandomString(10);
                $filename = $random.'.'.$file->extension;

                $file->saveAs(Yii::getAlias('@uploads/photo-files/').$fileHandler.'/'.$filename);

                $model = new PhotoFiles();
                $model->file = $fileHandler . '/' . $filename;
                $model->file_handler = $fileHandler;
                $model->save();

                echo json_encode([
                    'error' => '',
                    'initialPreview' => [
                        $this->getBase64URLForImage(Yii::getAlias('@uploads/photo-files/').$fileHandler.'/'.$filename)
                    ],
                    'initialPreviewConfig' => [
                        [
                            'caption' => $filename,
                            'extra' => [
                                'id' => $model->id,
                                'filePath' => $fileHandler .'/'. $filename
                            ]
                        ]
                    ]
                ]);
            }
        }

        private function getBase64URLForImage($filePath)
        {
            $path = $filePath;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);

            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        public function actionDeleteFile()
        {
            $modelId = Yii::$app->request->post('id');
            $filePath = Yii::$app->request->post('filePath');

            $model = PhotoFiles::find()->where('id = :id', [':id' => $modelId])->one();
            $model->delete();

            unlink(Yii::getAlias('@uploads/photo-files/').$filePath);

            echo json_encode([
                'error' => '',
                'modelID' => $modelId
            ]);
        }

        public function actionCreate()
        {
            $models = [
                'az' => new Photo(),
                'ru' => new Photo(),
                'en' => new Photo(),
            ];

            $fileModel = new PhotoFiles();
            $fileUploadId = uniqid();

            if (Photo::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Photo::tableName())->queryOne()['id'] + 1;
                $date = $models['az']['date'];
                $image = Yii::$app->request->post()['Photo']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->date = $date;
                    $model->image = $image;
                    $model->status = HelperComponent::itemsStatusEnabled;
                    $model->save();
                }

                $fileHandler = Yii::$app->request->post('file_handler');

                $files = PhotoFiles::find()
                    ->where('file_handler = :file_handler', [':file_handler' => $fileHandler] )
                    ->all();

                foreach ($files as $file) {
                    $file->photo_id = $lastId;
                    $file->save();
                }

                return $this->redirect(['index']);
            }

            return $this->render('create', [
                'models' => $models,
                'uploadId' => $fileUploadId,
                'fileModel' => $fileModel
            ]);
        }

        public function actionUpdate($id)
        {
            $models = Photo::findAll(['r_id' => $id]);

            $fileModel = new PhotoFiles();
            $fileUploadId = uniqid();
            $files = PhotoFiles::find()->where('photo_id = :id', [':id' => $id])->all();

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Photo::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $date = $modelsByLanguage['az']['date'];
                $image = Yii::$app->request->post()['Photo']['image'];

                foreach ($modelsByLanguage as $model) {
                    $model->date = $date;
                    $model->image = $image;
                    $model->save();
                }

                $fileHandler = Yii::$app->request->post('file_handler');
                $files = PhotoFiles::find()->where('file_handler = :file_handler', [':file_handler' => $fileHandler])->all();

                foreach ($files as $file) {
                    $file->photo_id = $id;
                    $file->save();
                }

                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'models' => $modelsByLanguage,
                'uploadId' => $fileUploadId,
                'fileModel' => $fileModel,
                'files' => $files,
            ]);
        }

        public function actionDelete($id)
        {
            $image = Photo::find()->select('image')->where(['r_id' => $id])->one();
            $image = Yii::getAlias('@public').$image->image;

            if (is_file($image) && file_exists($image)) {
                unlink($image);
            }

            Photo::deleteAll(['r_id' => $id]);

            $files = PhotoFiles::find()->where('photo_id = :id', [':id' => $id])->all();

            if ($files >= 1) {
                foreach ($files as $file) {
                    if (file_exists(Yii::getAlias('@uploads/photo-files/').$file['file'])) {
                        unlink(Yii::getAlias('@uploads/photo-files/').$file['file']);
                    }
                }
            }

            $modelDeleteRecords = PhotoFiles::find()->where('photo_id = :id', [':id' => $id])->all();

            if ($modelDeleteRecords >= 1) {
                foreach ($modelDeleteRecords as $modelDeleteRecord) {
                    $modelDeleteRecord->delete();
                }
            }

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Photo::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Photo::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }