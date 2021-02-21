<?php
	namespace frontend\assets;
	
	use yii\web\AssetBundle;
	
	class AppAsset extends AssetBundle {
		public $basePath = '@webroot';
		public $baseUrl = '@web';
		
		public $css = [
            '/media/css/fonts.css',
            '/media/css/owl.carousel.min.css',
            '/media/css/all.min.css',
            '/media/css/bootstrap.min.css',
            '/media/css/app.css',
            '/media/css/style.css',
        ];

		public $js = [
		    '/media/js/manifest.js',
		    '/media/js/vendor.js',
		    '/media/js/app.js',
		    '/media/js/owl.carousel.min.js',
		    '/media/js/main.js',
        ];

		public $depends = [];
	}