<?php

$currentDate = date('d/m/Y', time());
$dueDate = date('d/m/Y', time()+60*60*24);
$from = $model->name.' '.$model->surname;
$to = 'Barattson';
$reasonPayment = '';
if($model->fab==1) $reasonPayment .= $model->getAttributeLabel('fab').'<br/>';
if($model->fma==1) $reasonPayment .= $model->getAttributeLabel('fma').'<br/>';
if($model->ffa==1) $reasonPayment .= $model->getAttributeLabel('ffa').'<br/>';
if($model->glo==1) $reasonPayment .= $model->getAttributeLabel('glo').'<br/>';
if($model->eng==1) $reasonPayment .= $model->getAttributeLabel('eng').'<br/>';
if($model->fa_one==1) $reasonPayment .= $model->getAttributeLabel('fa_one').'<br/>';
if($model->ma_one==1) $reasonPayment .= $model->getAttributeLabel('ma_one').'<br/>';
if($model->fa_two==1) $reasonPayment .= $model->getAttributeLabel('fa_two').'<br/>';
if($model->ma_two==1) $reasonPayment .= $model->getAttributeLabel('ma_two').'<br/>';
$amount = $model->amount.' GBP';
?>

<div class="progress-main page-4">
	<div class="step step-1 old">Registration form</div>
	<div class="step step-2 old">Payment Methods</div>
	<div class="step step-3 old">Important Notes</div>
	<div class="step step-4 active">Payment Invoice</div>
	<div class="step step-5">Step 5</div>
</div>

<h1><span>Cash Payment Invoice</span></h1>
<div class="form">

<div class="invoce">
	<div class="invoce-top">
		<table class="table-1">
			<tr class="row-1">
				<td class="col-1">Registration date</td><td class="col-2"><?php echo $currentDate;?></td>
			</tr>
			<tr class="row-2">
				<td class="col-1">Payment due date</td><td class="col-2"><?php echo $dueDate;?></td>
			</tr>
			<tr class="row-3">
				<td class="col-1">From</td><td class="col-2"><?php echo $from;?></td>
			</tr>
			<tr class="row-4">
				<td class="col-1">Tel.</td><td class="col-2"><?php echo $model->phone;?></td>
			</tr>
			<tr class="row-4">
				<td class="col-1">E-mail</td><td class="col-2"><?php echo $model->email;?></td>
			</tr>
			<?php if(isset($model->company) && !empty($model->company)): ?>
			<tr class="row-4">
				<td class="col-1">Company</td><td class="col-2"><?php echo $model->company;?></td>
			</tr>
			<?php endif; ?>
			<tr class="row-5">
				<td class="col-1">Reson of payment</td><td class="col-2"><?php echo $reasonPayment;?></td>
			</tr>
			<tr class="row-6">
				<td class="col-1">Amount payable</td><td class="col-2"><?php echo $amount;?></td>
			</tr>
		</table>
	</div>
	<div class="invoce-bottom">
		<table class="table-2">
			<tr class="row-7"><td class="col-1"><u>Filled by Cashier</u></td></tr>
			<tr class="row-8"><td class="col-1">Amount Received</td></tr>
			<tr class="row-9"><td class="col-1">Received Date</td></tr>
			<tr class="row-10"><td class="col-1">Account's Signature</td></tr>
			<tr class="row-11"><td class="col-1">Cashier's Signature</td></tr>
			<tr class="row-12"><td class="col-1">Chief Accountan's Signature</td></tr>
		</table>
	</div>
	
	<table class="table-3">
	<tr class="row-2">
		<td class="col-1">
			<a class="like-a-button" href="<?php echo Yii::app()->createUrl('registration/update', array('id'=>$model->id)); ?>">INCORRECT</a>
		</td>
		<td class="col-2">
			<a class="like-a-button" href="<?php echo Yii::app()->createUrl('registration/confirm', array('id'=>$model->id)); ?>">CORRECT</a>
		</td>
	</tr>
</table>
</div>
</div>