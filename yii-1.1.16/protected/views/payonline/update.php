<?php
/* @var $this PayonlineController */
/* @var $model Payonline */

$this->breadcrumbs=array(
	'Payonlines'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Payonline', 'url'=>array('create')),
	array('label'=>'View Payonline', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Payonline', 'url'=>array('admin')),
);
?>

<h1><span>Correct</span></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>