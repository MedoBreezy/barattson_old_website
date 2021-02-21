<?php
	$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'),
		require(__DIR__ . '/../../common/config/params-local.php'),
		require(__DIR__ . '/params.php'),
		require(__DIR__ . '/params-local.php')
	);
	
	return [
		'id' => 'app-frontend',
		'basePath' => dirname(__DIR__),
		'bootstrap' => ['log'],
		'controllerNamespace' => 'frontend\controllers',
        'sourceLanguage' => 'en',
        'language' => 'en',
        'name' => 'Barattson - Employability through education!',
		'components' => [
			'request' => [
				'csrfParam' => '_csrf-frontend',
			],
            'session' => [
				'name' => 'advanced-frontend',
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
			'urlManager' => [
                'class' => 'codemix\localeurls\UrlManager',
                'languages' => ['az', 'ru', 'en'],
                'enableDefaultLanguageUrlCode' => false,
                'enableLanguageDetection' => false,
                'enablePrettyUrl' => true,
				'showScriptName' => false,
                'rules' => [
                    '/' => 'site/index',
                    'about' => 'site/about',
                    'testimonials' => 'site/testimonials',
                    'contacts' => 'site/contact',
                    'register' => 'site/register',
                    'search' => 'site/search',
                    
					'news-ads' => 'site/news-ads',
					'news-ads/<slug>-<id:\d+>' => 'site/news-ads-view',
                    'news-ads/<id:\d+>' => 'site/news-ads-view',
                    
					'courses' => 'site/courses',
					'courses/<slug>-<id:\d+>' => 'site/courses-view',
					'courses/<id:\d+>' => 'site/courses-view',
					
					'events' => 'site/events',
                    'events/<slug>-<id:\d+>' => 'site/events-view',
					'events/<id:\d+>' => 'site/events-view',
					
					'photo' => 'site/photo',
					'photo/<slug>-<id:\d+>' => 'site/photo-view',
					'photo/<id:\d+>' => 'site/photo-view',
					
					'teachers' => 'site/teachers',
                    'teachers/<slug>-<id:\d+>' => 'site/teachers-view',
					'teachers/<id:\d+>' => 'site/teachers-view',
					
					'team' => 'site/team',
                    'team/<slug>-<id:\d+>' => 'site/team-view',
					'team/<id:\d+>' => 'site/team-view',
					
					'vacancies' => 'site/vacancies',
                    'vacancies/<slug>-<id:\d+>' => 'site/vacancies-view',
					'vacancies/<id:\d+>' => 'site/vacancies-view',
                    
					'video' => 'site/video',
					'video/<slug>-<id:\d+>' => 'site/video-view',
					'video/<id:\d+>' => 'site/video-view',
                ],
			],
            'i18n' => [
                'translations' => [
                    'common*' => [
                        'class' => 'yii\i18n\PhpMessageSource',
                        'basePath' => '@frontend/messages',
                    ],
                ],
            ],
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => '',
                    'password' => '',
                    'port' => '587',
                    'encryption' => 'tls',
                    'streamOptions' => [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                    ],
                ],
            ],
		],
		'params' => $params,
	];