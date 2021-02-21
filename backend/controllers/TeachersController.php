<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Teachers;
    use backend\models\TeachersSearch;
    use backend\models\TeachersCourses;
    use common\components\HelperComponent;

    class TeachersController extends Controller
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
                    'url' => '/uploads/teachers',
                    'path' => '@uploads/teachers',
                    'width' => 500,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new TeachersSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['order' => SORT_ASC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
            $dataProvider->pagination = ['pageSize' => 50];

            $itemsOrder = Teachers::find()->where(['lang' => 'az'])->orderBy(['order' => SORT_ASC])->all();

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
                $models = Teachers::find()->where(['r_id' => $id])->all();

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
                'az' => new Teachers(),
                'ru' => new Teachers(),
                'en' => new Teachers(),
            ];

            $teachersCoursesModel = new TeachersCourses();

            if (Teachers::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Teachers::tableName())->queryOne()['id'] + 1;
                $image = Yii::$app->request->post()['Teachers']['image'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->image = $image;
                    $model->status = HelperComponent::itemsStatusEnabled;
                    $model->save();
                }

                if($teachersCoursesModel->load(Yii::$app->request->post()) && !empty($teachersCoursesModel['course_id'])) {
                    foreach ($teachersCoursesModel['course_id'] as $teachersCoursesItem) {
                        $teachersCoursesModel = new TeachersCourses();
                        $teachersCoursesModel->teacher_id = $lastId;
                        $teachersCoursesModel->course_id = $teachersCoursesItem;
                        $teachersCoursesModel->save();
                    }
                }

                return $this->redirect('index');
            }

            return $this->render('create', [
                'models' => $models,
                'teachersCoursesModel' => $teachersCoursesModel,
            ]);
        }

        public function actionUpdate($id)
        {
            $models = Teachers::findAll(['r_id' => $id]);
            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            $teachersCoursesModel = new TeachersCourses();

            if (Teachers::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $image = Yii::$app->request->post()['Teachers']['image'];

                foreach ($modelsByLanguage as $model) {
                    $model->image = $image;
                    $model->save();
                }

                if($teachersCoursesModel->load(Yii::$app->request->post()) && !empty($teachersCoursesModel['course_id'])) {
                    TeachersCourses::deleteAll(['teacher_id' => $id]);
                    foreach ($teachersCoursesModel['course_id'] as $teachersCoursesItem) {
                        $teachersCoursesModel = new TeachersCourses();
                        $teachersCoursesModel->teacher_id = $id;
                        $teachersCoursesModel->course_id = $teachersCoursesItem;
                        $teachersCoursesModel->save();
                    }
                }

                return $this->redirect('index');
            }

            return $this->render('update', [
                'models' => $modelsByLanguage,
                'teachersCoursesModel' => $teachersCoursesModel,
            ]);
        }

        public function actionDelete($id)
        {
            Teachers::deleteAll(['r_id' => $id]);
            TeachersCourses::deleteAll(['teacher_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Teachers::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Teachers::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }