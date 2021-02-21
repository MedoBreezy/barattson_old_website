<?php
/* @var $this RegistrationController */
/* @var $model Registr */

$this->breadcrumbs=array(
	'Registrs'=>array('index'),
	'Create',
);
?>

<div class="progress-main page-2">
	<div class="step step-1 old">Registration form</div>
	<div class="step step-2 active">Payment Methods</div>
	<div class="step step-3">Step 3</div>
	<div class="step step-4">Step 4</div>
	<div class="step step-5">Step 5</div>
</div>

<h1><span>Payment Methods</span></h1>
<div class="form methods-page">
	<table>
		<tr class="row">
			<td class="col-1">
				<?php '<a class="like-a-button" href="<?php echo Yii::app()->createUrl("registration/order"); ?>">ONLINE</a>';
				?>
			</td>
			<td class="col-2">
				<a class="like-a-button" href="<?php echo Yii::app()->createUrl('registration/cash', array('id'=>$model->id)); ?>">CASH</a>
			</td>
		</tr>
	</table>
</div>

<?php $page_is = "page-2"; ?>