<?php
	return [
		'timeZone' => 'Asia/Baku',
		'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
		'components' => [
			'cache' => [
				'class' => 'yii\caching\FileCache',
			],
			'user' => [
				'class' => 'webvimark\modules\UserManagement\components\UserConfig',
				
				'on afterLogin' => function($event) {
					\webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
				}
			],
			'db' => require(__DIR__ . '/db.php'),
		],
		'modules' => [
			'user-management' => [
				'class' => 'webvimark\modules\UserManagement\UserManagementModule',
				
				'on beforeAction'=>function(yii\base\ActionEvent $event) {
					if ( $event->action->uniqueId == 'user-management/auth/login' ) {
						$event->action->controller->layout = 'loginLayout.php';
					};
				},
			],
		],
	];