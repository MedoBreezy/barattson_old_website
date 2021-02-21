<?php
/* @var $this RegistrationController */
/* @var $model Registr */

$this->breadcrumbs=array(
	'Registrs'=>array('index'),
	'Create',
);
?>

<div class="progress-main page-3">
	<div class="step step-1 old">Registration form</div>
	<div class="step step-2 old">Payment Methods</div>
	<div class="step step-3 active">Important Notes</div>
	<div class="step step-4">Step 4</div>
	<div class="step step-5">Step 5</div>
</div>

<h1><span>Important Notes</span></h1>
<div class="form importantnotes-page">
<table>
	<tr class="row-1">
		<td class="col-1" colspan="2">
			In case of cash choosing the cash method, the candidate must deliver the payment to Barattson office within 24 hours after the completion of online registration process.
			<br/><br/>In addition, the nearest exam date cannot be earlier than 96 hours after the completion of online registration process.
			<br/><br/>If the payment is not made in due course, your exam registration will be cancelled.
			<br/><br/>If you accept the terms then click CASH button, otherwise click ONLINE payment button.
		</td>
	</tr>
	<tr class="row-2">
		<td class="col-1">
			<a class="like-a-button" href="<?php echo Yii::app()->createUrl('registration/order'); ?>">ONLINE</a>
		</td>
		<td class="col-2">
			<a class="like-a-button" href="<?php echo Yii::app()->createUrl('registration/invoice', array('id'=>$model->id)); ?>">CASH</a>
		</td>
	</tr>
	</table>
</div>