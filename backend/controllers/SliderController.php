<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Slider;
    use backend\models\SliderSearch;
    use common\components\HelperComponent;

    class SliderController extends Controller
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
                    'url' => '/uploads/slider',
                    'path' => '@uploads/slider',
                    'width' => 1920,
                    'height' => 550,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionIndex()
        {
            $searchModel = new SliderSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['order' => SORT_ASC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
            $dataProvider->pagination = ['pageSize' => 50];

            $itemsOrder = Slider::find()->where(['lang' => 'az'])->orderBy(['order' => SORT_ASC])->all();

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
                $models = Slider::find()->where(['r_id' => $id])->all();

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
                'az' => new Slider(),
                'ru' => new Slider(),
                'en' => new Slider(),
            ];

            if (Slider::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Slider::tableName())->queryOne()['id'] + 1;
                $image = Yii::$app->request->post()['Slider']['image'];

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
            $models = Slider::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Slider::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $image = Yii::$app->request->post()['Slider']['image'];

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
            Slider::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Slider::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Slider::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }