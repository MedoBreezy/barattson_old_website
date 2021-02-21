<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Team;
    use backend\models\TeamSearch;
    use common\components\HelperComponent;

    class TeamController extends Controller
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
                    'url' => '/uploads/team',
                    'path' => '@uploads/team',
                    'width' => 500,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new TeamSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['order' => SORT_ASC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
            $dataProvider->pagination = ['pageSize' => 50];

            $itemsOrder = Team::find()->where(['lang' => 'az'])->orderBy(['order' => SORT_ASC])->all();

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'itemsOrder' => $itemsOrder,
            ]);
        }

        public function actionOrderSave()
        {
            $arrayItems = Yii::$app->request->post('items');
            $order = 1;

            foreach ($arrayItems as $k=>$v) {
                $id = substr($v, 3);
                $models = Team::find()->where(['r_id' => $id])->all();

                foreach ($models as $model) {
                    $model->order = $order;
                    $model->save();
                }

                $order++;
            }

            echo 'Yadda saxlanıldı!';
        }

        public function actionCreate()
        {
            $models = [
                'az' => new Team(),
                'ru' => new Team(),
                'en' => new Team(),
            ];

            if (Team::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Team::tableName())->queryOne()['id'] + 1;
                $image = Yii::$app->request->post()['Team']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
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
            $models = Team::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Team::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $image = Yii::$app->request->post()['Team']['image'];

                foreach ($modelsByLanguage as $model) {
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
            Team::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Team::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Team::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }