<?php
/* @var $this RegistrationController */
/* @var $model Registr */

$this->breadcrumbs=array(
	'Registrs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Registr', 'url'=>array('create')),
	array('label'=>'View Registr', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Registr', 'url'=>array('admin')),
);
?>

<div class="progress-main page-1">
	<div class="step step-1 active">Registration form</div>
	<div class="step step-2">Step 2</div>
	<div class="step step-3">Step 3</div>
	<div class="step step-4">Step 4</div>
	<div class="step step-5">Step 5</div>
</div>

<h1><span>Correct<?php /*echo $model->id; */?></span></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>