<?php

$currentDate = date('d-m-Y', strtotime($model->created));
$dueDate = date('d-m-Y', strtotime($model->created)+60*60*24);
$from = $model->name;
$amount = $model->amount.' AZN';
?>

<h1><span>CBE Student Registration Sheet</span></h1>
<div class="form">

<div class="for-view">
	<div class="view-top">
		<table class="table-1">
			<tr class="row-1">
				<td class="col-1">ID number</td><td class="col-2"><?php echo $model->id;?></td>
			</tr>
			<tr class="row-1">
				<td class="col-1">Name</td><td class="col-2"><?php echo $model->name;?></td>
			</tr>
			<tr class="row-1">
				<td class="col-1">Name Surname</td><td class="col-2"><?php echo $model->name;?> <?php echo $model->surname;?></td>
			</tr>
			<tr class="row-1">
				<td class="col-1">Date of Birth</td><td class="col-2"><?php echo date('d-m-Y', strtotime($model->date));?></td>
			</tr>
			<tr class="row-1">
				<td class="col-1">Reg num</td><td class="col-2"><?php echo $model->reg_num;?></td>
			</tr>
			<tr class="row-1">
				<td class="col-1">Phone number</td><td class="col-2"><?php echo $model->phone;?></td>
			</tr>
			<tr class="row-1">
				<td class="col-1">E-mail</td><td class="col-2"><?php echo $model->email;?></td>
			</tr>
			<?php if(isset($model->company) && !empty($model->company)): ?>
			<tr class="row-1">
				<td class="col-1">Company</td><td class="col-2"><?php echo $model->company;?></td>
			</tr>
			<?php endif; ?>
			<tr class="row-1">
				<td class="col-1">Registration Date</td><td class="col-2"><?php echo $currentDate;?></td>
			</tr>
			<tr class="row-2">
				<td class="col-1">Due Date</td><td class="col-2"><?php echo $dueDate;?></td>
			</tr>
			<tr class="row-6">
				<td class="col-1">Amount Payable</td><td class="col-2"><?php echo $amount;?></td>
			</tr>
			<?php if(isset($model->reference) && !empty($model->reference)): ?>
			<tr class="row-1">
				<td class="col-1">Reference</td><td class="col-2"><?php echo $model->reference;?></td>
			</tr>
			<?php endif; ?>
		</table>
	</div>
	<div class="view-middle">
		<table class="table-2">
			<tr class="row-1">
				<td class="col-1">Exam Name</td>
				<td class="col-2">Date</td>
				<td class="col-3">Time</td>
			</tr>
			<?php if($model->fab==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('fab'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->fab_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->fab_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->fma==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('fma'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->fma_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->fma_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->ffa==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('ffa'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->ffa_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->ffa_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->glo==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('glo'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->glo_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->glo_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->eng==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('eng'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->eng_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->eng_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->fa_one==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('fa_one'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->fa_one_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->fa_one_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->ma_one==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('ma_one'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->ma_one_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->ma_one_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->fa_two==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('fa_two'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->fa_two_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->fa_two_date)); ?></td>
			</tr>
			<?php endif; ?>
			<?php if($model->ma_two==1): ?>
			<tr class="row-2">
				<td class="col-1"><?php echo $model->getAttributeLabel('ma_two'); ?></td>
				<td class="col-2"><?php echo date('d.m.Y', strtotime($model->ma_two_date)); ?></td>
				<td class="col-3"><?php echo date('H:i', strtotime($model->ma_two_date)); ?></td>
			</tr>
			<?php endif; ?>
		</table>
	</div>
	
	<div class="view-bottom">
	    <img src="/payment/<?php echo $model->imgpath; ?>" />
	</div>
	
	<table class="table-3">
		<tr class="row-1">
			<td class="col-1">
				<a class="like-a-button" href="javascript:window.history.back()">Back</a>
			</td>
			<td class="col-2">
				<a class="like-a-button" target="_blank" href="/pdf/<?php echo $model->pdf_invoice?>">Print Invoice</a>
			</td>
			<td class="col-3">
				<a class="like-a-button" target="_blank" href="/pdf/<?php echo $model->pdf_view?>">Print view</a>
			</td>
		</tr>
	</table>
</div>
</div>

<style>
.progress-main {
			display:none !important;
		}
	
		#content{
		  padding-top:130px !important;
		}
		
		.barattson-logo{
		   top:25px !important;
		}

</style>
