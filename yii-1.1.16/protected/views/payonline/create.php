<?php
/* @var $this PayonlineController */
/* @var $model Payonline */

$this->breadcrumbs=array(
	'Payonlines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Payonline', 'url'=>array('admin')),
);
?>

<h1><span>Online Payment</span></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>