<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Menu;
    use backend\models\MenuSearch;
    use common\components\HelperComponent;

    class MenuController extends Controller
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
            $searchModel = new MenuSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort = ['defaultOrder' => ['order' => SORT_ASC]];
            $dataProvider->query->andWhere(['lang' => 'az']);
            $dataProvider->pagination = ['pageSize' => 50];

            $itemsOrder = Menu::find()->where(['lang' => 'az'])->orderBy(['order' => SORT_ASC])->all();

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
                $models = Menu::find()->where(['r_id' => $id])->all();

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
                'az' => new Menu(),
                'ru' => new Menu(),
                'en' => new Menu(),
            ];

            if (Menu::loadMultiple($models, Yii::$app->request->post())) {
                $lastId = Yii::$app->db->createCommand("SELECT MAX(id) AS `id` FROM ".Menu::tableName())->queryOne()['id'] + 1;
                $type = $models['az']['type'];

                foreach ($models as $model) {
                    $model->r_id = $lastId;
                    $model->type = $type;
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
            $models = Menu::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Menu::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $type = $models[0]['type'];

                foreach ($modelsByLanguage as $model) {
                    $model->type = $type;
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
            Menu::deleteAll(['r_id' => $id]);

            return $this->redirect(['index']);
        }

        public function actionStatusChange($rid, $status)
        {
            $models = Menu::find()->where(['r_id' => $rid])->all();

            foreach ($models as $model) {
                $model->status = $status;
                $model->save();
            }
        }

        protected function findModel($id)
        {
            if (($model = Menu::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }