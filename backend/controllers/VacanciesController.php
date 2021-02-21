<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Vacancies;
    use backend\models\VacanciesSearch;
    use common\components\HelperComponent;

    class VacanciesController extends Controller
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
                    'url' => '/uploads/vacancies',
                    'path' => '@uploads/vacancies',
                    'width' => 800,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new VacanciesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['date_start' => SORT_DESC]];
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
                'az' => new Vacancies(),
                'ru' => new Vacancies(),
                'en' => new Vacancies(),
            ];

            if (Vacancies::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Vacancies::tableName())->queryOne()['id'] + 1;
                $date_start = $models['az']['date_start'];
                $date_finish = $models['az']['date_finish'];
                $image = Yii::$app->request->post()['Vacancies']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->date_start = $date_start;
                    $model->date_finish = $date_finish;
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
            $models = Vacancies::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Vacancies::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $date_start = $models[0]['date_start'];
                $date_finish = $models[0]['date_finish'];
                $image = Yii::$app->request->post()['Vacancies']['image'];

                foreach ($modelsByLanguage as $model) {
                    $model->date_start = $date_start;
                    $model->date_finish = $date_finish;
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
            Vacancies::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Vacancies::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Vacancies::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }