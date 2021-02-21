<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use common\components\HelperComponent;
    use backend\models\StaticPages;

    class StaticController extends Controller
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
                'uploadSeoImage' => [
                    'class' => 'budyaga\cropper\actions\UploadAction',
                    'url' => '/uploads/seo',
                    'path' => '@uploads/seo',
                    'width' => 1200,
                    'height' => 630,
                    'maxSize' => 5097152,
                ],
                'uploadImage' => [
                    'class' => 'budyaga\cropper\actions\UploadAction',
                    'url' => '/uploads/static_image',
                    'path' => '@uploads/static_image',
                    'width' => 1920,
                    'height' => 550,
                    'maxSize' => 5097152,
                ],
                'uploadDirectorImage' => [
                    'class' => 'budyaga\cropper\actions\UploadAction',
                    'url' => '/uploads/director',
                    'path' => '@uploads/director',
                    'width' => 500,
                    'height' => 500,
                    'maxSize' => 5097152,
                ],
            ];
        }

        public function actionEdit($type)
        {
            $models = StaticPages::findAll(['type' => $type]);

            $modelsByLanguage = [];
            foreach ($models as $model) {
                $modelsByLanguage[$model->lang] = $model;
            }

            if (StaticPages::loadMultiple($modelsByLanguage, Yii::$app->request->post())) {
                $seoImage = @Yii::$app->request->post()['StaticPages']['seo_image'];

                if ($type == HelperComponent::staticAbout) {
                    $aboutImage = Yii::$app->request->post()['StaticPages']['image'];
                    $directorImage = Yii::$app->request->post()['StaticPages']['director_image'];
                }

                if ($type == HelperComponent::staticQualityGuarantee) {
                    $qualityGuaranteeImage = Yii::$app->request->post()['StaticPages']['image'];
                }

                if ($type == HelperComponent::staticSocialResponsibility) {
                    $socialResponsibilityImage = Yii::$app->request->post()['StaticPages']['image'];
                }

                foreach ($modelsByLanguage as $model) {
                    $model->seo_image = $seoImage;

                    if ($type == HelperComponent::staticAbout) {
                        $model->image = $aboutImage;
                        $model->director_image = $directorImage;
                    }

                    if ($type == HelperComponent::staticQualityGuarantee) {
                        $model->image = $qualityGuaranteeImage;
                    }

                    if ($type == HelperComponent::staticSocialResponsibility) {
                        $model->image = $socialResponsibilityImage;
                    }

                    $model->save();
                }

                return $this->redirect(['/site/index']);
            }

            return $this->render($type, [
                'models' => $modelsByLanguage
            ]);
        }
    }