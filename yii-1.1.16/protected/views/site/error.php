<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h1><span>Error <?php echo $code; ?></span></h1>

<div class="page-error">
<?php echo CHtml::encode($message); ?>
</div>