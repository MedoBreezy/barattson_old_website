<?php

$currentDate = date('d-m-Y', strtotime($model->created));
$dueDate = date('d-m-Y', strtotime($model->created)+60*60*24);
$from = $model->name;
$amount = $model->amount.' GBP';
?>
<style>

h1{
  color:#000;
	display:block;
	text-align:center;
	width:178mm;
	font-family:Arial;
}

table {
  border-spacing: 0mm;
  border-collapse: collapse;
}

table td{
  color:#000;
  height:4mm;
  vertical-align:middle;
}

.table-1,
.table-2{
	font-size:3.5mm;
	width:150mm;
	display:inline-block;
}

.table-1 .col-2,
.table-2 .col-2,
.table-2 .col-3,
.table-2 .row-1 .col-1{
	text-align:center;
}

.table-1 .col-1,
.table-2 .row-1 td{
	font-weight:bold;
}


.table-1 .col-1 div{
	width:40mm;
}

.table-1 .col-2 div {
	width:60mm;
}

.table-2 .col-1 div{
	width:60mm;
}

.table-2 .col-2 div {
	width:10mm;
}

.table-2 .col-3 div{
	width:10mm;
}

.table-1 .col-1,
.table-1 .col-2,
.table-2 .col-1,
.table-2 .col-2,
.table-2 .col-3{
	padding:0mm 5mm;
}

.table-1{
	margin-left:15mm;
}

.table-2{
	margin-left:14mm;
}

.view-top {
	margin-bottom:8mm;
	width:150mm;
}

.view-bottom {
	width:178mm;
	padding-top:8mm;
	height:80mm;
	overflow:hidden;
	text-align:center;
}

.view-bottom img{
	max-width:100%;
	max-height:100%;
}

</style>
<div style="text-align:center;"><img class="barattson-logo" src="http://barattson.com/sites/all/themes/baratson/images/sitelogo.png"></div>
<br>
<h1><span>CBE Student Registration Sheet</span></h1>
<br>
<div class="form">
<div class="for-view">
	<div class="view-top">
		<table border="1" class="table-1">
			<tr class="row-1">
				<td class="col-1">ID number<div></div></td><td class="col-2"><?php echo $model->id;?><div></div></td>
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
		<table border="1" class="table-2">
			<tr class="row-1">
				<td class="col-1">Exam Name<div></div></td>
				<td class="col-2">Date<div></div></td>
				<td class="col-3">Time<div></div></td>
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
	    <img align="center" height="300" src="http://barattson.com/payment/<?php echo $model->imgpath; ?>" />
	</div>
</div>
</div>
