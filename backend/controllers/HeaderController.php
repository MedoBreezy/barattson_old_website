<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use backend\models\Header;

    class HeaderController extends Controller
    {
        public function behaviors()
        {
            return [
                'ghost-access'=> [
                    'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
                ],
            ];
        }

        public function actionUpdate($id)
        {
            $models = Header::findAll(['r_id' => $id]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (Header::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $phone = $models[0]['phone'];

                foreach ($modelsByLanguage as $model) {
                    $model->phone = $phone;
                    $model->save();
                }

                return $this->redirect('/admin-bs/site/index');
            }

            return $this->render('update', [
                'models' => $modelsByLanguage,
            ]);
        }

        protected function findModel($id)
        {
            if (($model = Header::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }