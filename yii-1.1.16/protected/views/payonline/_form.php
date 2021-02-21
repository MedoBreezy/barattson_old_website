<?php
/* @var $this PayonlineController */
/* @var $model Payonline */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payonline-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table class="table-1">
	<tr class="row-1">
		<td class="col-1"><?php echo $form->labelEx($model,'name'); ?></td><td class="col-2">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</tr>

	<tr class="row-2">
		<td class="col-1"><?php echo $form->labelEx($model,'phone'); ?></td><td class="col-2">
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
	</tr>

	<tr class="row-3">
		<td class="col-1"><?php echo $form->labelEx($model,'email'); ?></td><td class="col-2">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</tr>

	<tr class="row-4">
		<td class="col-1"><?php echo $form->labelEx($model,'purpose'); ?></td><td class="col-2">
		<?php echo $form->textField($model,'purpose',array('size'=>60,'maxlength'=>512)); ?>
	</tr>

	<tr class="row-5">
		<td class="col-1"><?php echo $form->labelEx($model,'amount'); ?></td><td class="col-2">
		<?php echo $form->textField($model,'amount'); ?>
	</tr>

	<tr class="row-6">
		<td class="col-1"><?php echo $form->labelEx($model,'currency'); ?></td><td class="col-2">
		<?php echo $form->dropDownList($model, 'currency', Yii::app()->params['currency']); ?>
	</tr>

	<tr class="row-7 buttons">
		<td class="col-1" colspan="2"><?php echo CHtml::submitButton($model->isNewRecord ? 'SUBMIT' : 'SUBMIT'); ?></td>
	</tr>
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->