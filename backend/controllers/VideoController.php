<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Video;
    use backend\models\VideoSearch;
    use common\components\HelperComponent;

    class VideoController extends Controller
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
                    'url' => '/uploads/video',
                    'path' => '@uploads/video',
                    'width' => 800,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new VideoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['date' => SORT_DESC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
            $dataProvider->pagination = ['pageSize' => 50];

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        public function actionCreate()
        {
            $models = [
                'az' => new Video(),
                'ru' => new Video(),
                'en' => new Video(),
            ];

            if (Video::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Video::tableName())->queryOne()['id'] + 1;
                $date = $models['az']['date'];
                $image = Yii::$app->request->post()['Video']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->date = $date;
                    $model->image = $image;
                    $model->status = HelperComponent::itemsStatusEnabled;
                    $model->save();
                }

                return $this->redirect('index');
            }

            return $this->render('create', [
                'models' => $models,
            ]);
        }

        public function actionUpdate($id)
        {
            $models = Video::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Video::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $date = $models[0]['date'];
                $image = Yii::$app->request->post()['Video']['image'];

                foreach ($modelsByLanguage as $model) {
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
            Video::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Video::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Video::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }