<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Reviews;
    use backend\models\ReviewsSearch;
    use common\components\HelperComponent;

    class ReviewsController extends Controller
    {
        public function behaviors()
        {
            return [
                'ghost-access'=> [
                    'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new ReviewsSearch();
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
                'az' => new Reviews(),
                'ru' => new Reviews(),
                'en' => new Reviews(),
            ];

            if (Reviews::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Reviews::tableName())->queryOne()['id'] + 1;
                $date = $models['az']['date'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->date = $date;
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
            $models = Reviews::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Reviews::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $date = $models[0]['date'];

                foreach ($modelsByLanguage as $model) {
                    $model->date = $date;
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
            Reviews::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Reviews::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Reviews::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }