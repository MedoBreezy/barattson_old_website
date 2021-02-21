<?php
    namespace frontend\widgets;

    use Yii;
    use yii\base\Widget;
    use backend\models\StaticPages;
    use common\components\HelperComponent;
	
    class FactsWidget extends Widget {
        public function init() {
            parent::init();
        }
		
        public function run() {
            $lang = Yii::$app->language;

            $facts = StaticPages::find()
                ->where(['lang' => $lang, 'type' => HelperComponent::staticMainPage])
                ->one();

            return $this->render('facts', [
                'facts' => $facts,
            ]);
        }
    }