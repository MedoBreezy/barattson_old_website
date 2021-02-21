<?php
    namespace frontend\widgets;
	
	use Yii;
	use backend\models\Header;
	use backend\models\Menu;
	use common\components\HelperComponent;
    use yii\base\Widget;
	
    class FooterWidget extends Widget {
        public function init() {
            parent::init();
        }
		
        public function run() {
			$lang = Yii::$app->language;

            $header = Header::find()
                ->where(['lang' => $lang])
                ->one();
			
			$menus = Menu::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->orderBy(['order' => SORT_ASC])
                ->all();
			
            return $this->render('footer', [
				'header' => $header,
				'menus' => $menus,
			]);
        }
    }