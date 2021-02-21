<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Events;
    use backend\models\EventsSearch;
    use common\components\HelperComponent;

    class EventsController extends Controller
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
                    'url' => '/uploads/events',
                    'path' => '@uploads/events',
                    'width' => 800,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new EventsSearch();
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
                'az' => new Events(),
                'ru' => new Events(),
                'en' => new Events(),
            ];

            if (Events::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Events::tableName())->queryOne()['id'] + 1;
                $date = $models['az']['date'];
                $price_old = $models['az']['price_old'];
                $price_new = $models['az']['price_new'];
                $image = Yii::$app->request->post()['Events']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->date = $date;
                    $model->price_old = $price_old;
                    $model->price_new = $price_new;
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
            $models = Events::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Events::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $date = $models[0]['date'];
                $price_old = $models[0]['price_old'];
                $price_new = $models[0]['price_new'];
                $image = Yii::$app->request->post()['Events']['image'];

                foreach ($modelsByLanguage as $model) {
                    $model->date = $date;
                    $model->price_old = $price_old;
                    $model->price_new = $price_new;
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
            Events::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Events::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Events::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }