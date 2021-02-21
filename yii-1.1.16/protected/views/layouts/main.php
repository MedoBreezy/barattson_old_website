<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screena.css" media="screen, projection">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iea.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/maina.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/forma.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/printa.css" media="print">
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<style>
			.progress-main {
						display:none !important;
					}
	</style>
</head>

<body>

<div class="container <?php echo !Yii::app()->user->isGuest? 'admin':''; ?>" id="page">
	
	
	<div class="page-inner">
		<img style="margin:30px;" class="barattson-logo" src="http://barattson.com/media/img/logo.png">

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'CBE Payment', 'url'=>array('/registration/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Online Payment', 'url'=>array('/payonline/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>

	<?php echo $content; ?> 

	<div class="clear"></div></div>
</div><!-- page -->
</body>
</html>
