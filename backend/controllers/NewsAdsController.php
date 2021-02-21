<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\NewsAds;
    use backend\models\NewsAdsSearch;
use backend\models\PhotoFiles;
use common\components\HelperComponent;
use yii\helpers\BaseFileHelper;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class NewsAdsController extends Controller
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
                    'url' => '/uploads/news_ads',
                    'path' => '@uploads/news_ads',
                    'width' => 800,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new NewsAdsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['date' => SORT_DESC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
            $dataProvider->pagination = ['pageSize' => 50];

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }


                /**
         * Debug function
         * d($var);
         */
        function d($var,$caller=null)
        {
            if(!isset($caller)){
                $caller = array_shift(debug_backtrace(1));
            }
            echo '<code>File: '.$caller['file'].' / Line: '.$caller['line'].'</code>';
            echo '<pre>';
            VarDumper::dump($var, 10, true);
            echo '</pre>';
        }

        /**
         * Debug function with die() after
         * dd($var);
         */
        function dd($var)
        {
            $caller = array_shift(debug_backtrace(1));
            $this->d($var,$caller);
            die();
        }

        public function actionCreate()
        {
            $models = [
                'az' => new NewsAds(),
                'ru' => new NewsAds(),
                'en' => new NewsAds(),
            ];

            $fileModel = new PhotoFiles();
            $fileUploadId = uniqid();

            
            if (NewsAds::loadMultiple($models, Yii::$app->request->post())) {
                // $this->dd($files);
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".NewsAds::tableName())->queryOne()['id'] + 1;
                $type = $models['az']['type'];

                if (count($type) > 1) {
                    $type = HelperComponent::newsAdsTypeNewsAds;
                } else {
                    $type = $type[0];
                }

                $date = $models['az']['date'];
                $image = Yii::$app->request->post()['NewsAds']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->type = $type;
                    $model->date = $date;
                    $model->image = $image;
                    $model->status = HelperComponent::itemsStatusEnabled;
                    $model->save();
                }

                $files = UploadedFile::getInstances($fileModel, 'file');
                if (count($files) >= 1) {
                    $path = Yii::getAlias('@uploads/photo-files/').$fileUploadId;
                    BaseFileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                    foreach ($files as $file) {
                        $random = Yii::$app->getSecurity()->generateRandomString(10);
                        $filename = $random.'.'.$file->extension;
                        
                        $file->saveAs(Yii::getAlias('@uploads/photo-files/').$fileUploadId.'/'.$filename);
                        
                        $modelFile = new PhotoFiles();
                        $modelFile->file = $fileUploadId . '/' . $filename;
                        $modelFile->file_handler = $fileUploadId;
                        $modelFile->news_id = $lastId;
                        $modelFile->save();
                    }
                }

                return $this->redirect('index');
            }

            return $this->render('create', [
                'models' => $models,
                'uploadId' => $fileUploadId,
                'fileModel' => $fileModel
            ]);
        }

        private function getBase64URLForImage($filePath)
        {
            $path = $filePath;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);

            return 'data:image/' . $type . ';base64,' . base64_encode($data);
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

        public function actionUpdate($id)
        {
            $models = NewsAds::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (NewsAds::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $type = $models[0]['type'];

                if (count($type) > 1) {
                    $type = HelperComponent::newsAdsTypeNewsAds;
                } else {
                    $type = $type[0];
                }

                $date = $models[0]['date'];
                $image = Yii::$app->request->post()['NewsAds']['image'];

                foreach ($modelsByLanguage as $model) {
                    $model->type = $type;
                    $model->date = $date;
                    $model->image = $image;
                    $model->save();
                }

                return $this->redirect('index');
            }

            return $this->render('update', [
                'models' => $modelsByLanguage,
            ]);
        }

        public function actionDelete($id)
        {
            NewsAds::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = NewsAds::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = NewsAds::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }