<?php
	return [
		'aliases' => [
			'@bower' => '@vendor/bower-asset',
			'@npm'   => '@vendor/npm-asset',
		],
		'components' => [
			'db' => [
				'class' => 'yii\db\Connection',
				'dsn' => 'mysql:host=localhost;dbname=barattson-new',
				'username' => 'root',
				'password' => '1234qwe',
				'charset' => 'utf8',
			],
		],
	];