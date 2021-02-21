<?php
    namespace frontend\widgets;
	
    use Yii;
    use yii\base\Widget;
    use backend\models\Slider;
    use backend\models\Menu;
    use backend\models\Header;
    use common\components\HelperComponent;
	
    class HeaderWidget extends Widget {
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
            
			$slides = Slider::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['image' => '']])
                ->orderBy(['order' => SORT_ASC])
                ->limit(6)
                ->all();
            
			return $this->render('header', [
                'header' => $header,
			    'menus' => $menus,
			    'slides' => $slides,
            ]);
        }
    }