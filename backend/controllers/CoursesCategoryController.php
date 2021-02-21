<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\CoursesCategory;
    use backend\models\CoursesCategorySearch;

    class CoursesCategoryController extends Controller
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
            $searchModel = new CoursesCategorySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
                'az' => new CoursesCategory(),
                'ru' => new CoursesCategory(),
                'en' => new CoursesCategory(),
            ];

            if (CoursesCategory::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".CoursesCategory::tableName())->queryOne()['id'] + 1;

                foreach ($models as $model) {
                    $model->r_id = $lastId;
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
            $models = CoursesCategory::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (CoursesCategory::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                foreach ($modelsByLanguage as $model) {
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
            CoursesCategory::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        protected function findModel($id)
        {
            if (($model = CoursesCategory::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }