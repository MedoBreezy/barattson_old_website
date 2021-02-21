<?php
	namespace backend\controllers;
	
	use Yii;
	use yii\web\Controller;
	
	class SiteController extends Controller {
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
				'error' => [
					'class' => 'yii\web\ErrorAction',
				],
			];
		}
		
		public function actionIndex()
        {
            return $this->render('index', []);
		}

		public function actionLogout()
        {
			Yii::$app->user->logout();
			
			return $this->goHome();
		}
	}