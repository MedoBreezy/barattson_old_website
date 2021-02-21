<?php
	$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'),
		require(__DIR__ . '/../../common/config/params-local.php'),
		require(__DIR__ . '/params.php'),
		require(__DIR__ . '/params-local.php')
	);
	
	return [
		'id' => 'app-backend',
		'basePath' => dirname(__DIR__),
		'controllerNamespace' => 'backend\controllers',
        'sourceLanguage' => 'az',
        'language' => 'az',
        'name' => 'BARATTSON',
		'bootstrap' => ['log'],
		'components' => [
			'request' => [
				'csrfParam' => '_csrf-backend',
			],
			'session' => [
				'name' => 'advanced-backend',
			],
			'log' => [
				'traceLevel' => YII_DEBUG ? 3 : 0,
				'targets' => [
					[
						'class' => 'yii\log\FileTarget',
						'levels' => ['error'],
					],
				],
			],
			'errorHandler' => [
				'errorAction' => 'site/error',
			],
            'assetManager' => [
                'class' => 'yii\web\AssetManager',
                'forceCopy' => true,
                'bundles' => [
                    'dmstr\web\AdminLteAsset' => [
                        'skin' => 'skin-black',
                    ],
                ],
            ],
			'urlManager' => [
				'enablePrettyUrl' => true,
				'showScriptName' => false,
				'rules' => [],
			],
		],
        'controllerMap' => [
            'elfinder' => [
                'class' => 'mihaildev\elfinder\PathController',
                'access' => ['@'],
                'root' => [
                    'baseUrl' => 'http://barattson.orkhanalyshov.com',
                    'basePath' => '@public',
                    'path' => 'uploads/files',
                    'name' => 'Files'
                ],
            ]
        ],
		'params' => $params,
	];