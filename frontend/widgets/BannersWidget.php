<?php
    namespace frontend\widgets;
	
    use Yii;
    use yii\base\Widget;
    use backend\models\Banners;
    use common\components\HelperComponent;
	
    class BannersWidget extends Widget {
        public function init() {
            parent::init();
        }
		
        public function run() {
            $lang = Yii::$app->language;

            $banners = Banners::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['image' => '']])
                ->orderBy(['r_id' => SORT_DESC])
                ->limit(6)
                ->all();
            
			return $this->render('banners', [
                'banners' => $banners,
            ]);
        }
    }