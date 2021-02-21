<?php
    namespace frontend\widgets;
	
    use Yii;
    use yii\base\Widget;
    use backend\models\Events;
    use common\components\HelperComponent;
	
    class EventsWidget extends Widget {
        public function init() {
            parent::init();
        }
		
        public function run() {
            $lang = Yii::$app->language;

            $events = Events::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['image' => '']])
                ->orderBy(['date' => SORT_DESC])
                ->limit(3)
                ->all();
            
			return $this->render('events', [
                'events' => $events,
            ]);
        }
    }