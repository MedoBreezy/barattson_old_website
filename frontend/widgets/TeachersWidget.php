<?php
    namespace frontend\widgets;
	
    use Yii;
    use yii\base\Widget;
    use backend\models\Teachers;
    use common\components\HelperComponent;
	
    class TeachersWidget extends Widget {
        public function init() {
            parent::init();
        }
		
        public function run() {
            $lang = Yii::$app->language;
            
			$teachers = Teachers::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['image' => '']])
                ->orderBy(['order' => SORT_ASC])
                ->limit(3)
                ->all();
            
			return $this->render('teachers', [
                'teachers' => $teachers,
            ]);
        }
    }