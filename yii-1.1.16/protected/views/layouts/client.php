<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="https://barattson.com<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="https://barattson.com<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="https://barattson.com<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="https://barattson.com<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="https://barattson.com<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	
	<meta property="og:site_name" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <meta property="og:description" content="Barattson helps students and business professionals to reach their goals in professional education and career" />
    <meta property="og:type" content="university" />
    <link rel="shortcut icon" href="http://barattson.com/sites/default/files/favicon2.ico" type="image/vnd.microsoft.icon" />
    <meta property="og:image" content="http://barattson.com/sites/default/files/barattson-bry.jpg" />
    <link rel="image_src" href="http://barattson.com/sites/default/files/barattson-bry.jpg" />
    <meta name="copyright" content="Barattson LLC" />
    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <meta property="og:url" content="<?php echo CHtml::encode($this->pageUrl); ?>" />
    <meta name="description" content="Barattson helps students and business professionals to reach their goals in professional education and career" />
    <meta name="keywords" content="training in Baku, ACCA, CIMA, CMGA, DIPIFR, CFA, SAT, GMAT, GRE, TOEFL, English, Microsoft, HR, Project Management, Procurement Management, Business English, Islamic Finance, Legal English, FRM, CIA, Education, Professional Education" />
    <meta name="robots" content="nofollow, noindex" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container <?php echo !Yii::app()->user->isGuest? 'admin':''; ?>" id="page">
	<div class="page-inner">
		<img class="barattson-logo" src="http://barattson.com/media/img/logo.png">
	<?php echo $content; ?>

	<div class="clear"></div>

	</div>
</div><!-- page -->

</body>
</html>
