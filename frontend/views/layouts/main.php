<?php
	use yii\helpers\Html;
	use frontend\assets\AppAsset;
	use frontend\widgets\HeaderWidget;
	use frontend\widgets\FooterWidget;

	AppAsset::register($this);
	
	$route = Yii::$app->controller->id.'_'.Yii::$app->controller->action->id;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '2255974611384626');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=2255974611384626&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-W4N563H');</script>
		<!-- End Google Tag Manager -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53419167-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-53419167-1');
		</script>
		<script data-ad-client="ca-pub-4120032768032526" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<link rel="shortcut icon" href="/media/img/favicon.ico" type="image/x-icon">
		<link rel="icon" type="image/png" sizes="196x196" href="/media/img/LogoIconBlack.png">
		<link rel="apple-touch-icon" href="/media/img/LogoIconBlack.png">
		<?php $this->head() ?>
	</head>
	<body class="<?= $route ?>">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4N563H"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
        <?php $this->beginBody() ?>
            <?= HeaderWidget::widget() ?>
			<div class="bodyContent">
				<?= $content ?>
			</div>
            <?= FooterWidget::widget() ?>
		<?php $this->endBody() ?>

		<!-- social messenger links -->
		<div class="social_messengers">
			<div class="content">
				<ul>
					<li><a target="_blank" href="https://wa.me/994702054496"><img src="/media/icons/whatsapp.svg" alt=""></a></li>
					<li><a target="_blank" href="https://m.me/Barattson"><img src="/media/icons/messenger.svg" alt=""></a></li>
					<li><a target="_blank" href="https://t.me/Barattson_crm"><img src="/media/icons/telegram.svg" alt=""></a></li>
				</ul>
				<div class="main_icon">
					<img class="messageIcon" src="/media/icons/socialMessengers.svg" alt="Social messengers">
					<img class="closeMessengers" src="/media/icons/ic-close.svg">
				</div>
			</div>
		</div>
	</body>
</html>
<?php $this->endPage() ?>