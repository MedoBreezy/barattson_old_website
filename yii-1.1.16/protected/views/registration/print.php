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

<style>
	

#page table {
  border-spacing: 0mm;
  border-collapse: collapse;
}

#page .invoce-top,
#page .form {
  border:none;
  padding:0mm;
  margin:0mm;
}

#page h1{
  color:#000;
  margin-bottom:8mm;
	display:block;
	text-align:center;
	width:150mm;
	font-family:Arial;
}

#page .invoce-bottom {
  display:block;
}

#page .table-1 td,
#page .table-2 td{
  vertical-align:top;
  color:#000;
  padding-bottom:1mm;
}

#page .table-1 .row-1 td,
#page .table-1 .row-2 td{
  font-weight:normal;
}

#page .table-1 .row-3 td,
#page .table-1 .row-4 td,
#page .table-1 .row-5 td,
#page .table-1 .row-6 td,
#page .table-2 .row-8 td,
#page .table-2 .row-9 td{
  border-bottom:1px solid #000;
  padding-top:6mm;
}

#page .table-2 .row-10 td{
  padding-top:6mm;
}

#page .table-2 .row-11 td{
  padding-top:12mm;
}

#page .table-2 .row-12 td{
  padding-bottom:6mm;
}

#page .invoce-bottom {
  margin-top:12mm;
  border:1px solid #000;
  padding:3mm;
}

#page .table-2 .row-7 .col-1{
  font-weight:bold;
}
</style>

<div id="page">
<div style="text-align:center;"><img class="barattson-logo" src="http://barattson.com/sites/all/themes/baratson/images/sitelogo.png"></div>
<br><br>
<h1><span>Cash Payment Invoice</span></h1>
<br><br>
<div class="form">

<div class="invoce">
	<div class="invoce-top">
		<table class="table-1" cellpadding="0" cellspacing="0">
			<?php if(isset($model->reference) && !empty($model->reference)): ?>
			<!--<tr class="row-1">
				<td class="col-1"><strong>Reference</strong></td><td class="col-2"><?php echo $model->reference;?></td>
			</tr>-->
			<?php endif; ?>
			<tr class="row-1">
				<td class="col-1">Registration date</td><td class="col-2"><?php echo $currentDate;?></td>
			</tr>
			<tr class="row-2">
				<td class="col-1">Payment due date</td><td class="col-2"><?php echo $dueDate;?></td>
			</tr>
			<tr class="row-3">
				<td class="col-1"><strong>From</strong></td><td class="col-2"><?php echo $from;?></td>
			</tr>
			<tr class="row-4">
				<td class="col-1"><strong>To</strong></td><td class="col-2"><?php echo $to;?></td>
			</tr>
			<tr class="row-5">
				<td class="col-1"><strong>Reson of payment</strong></td><td class="col-2"><?php echo $reasonPayment;?></td>
			</tr>
			<tr class="row-6">
				<td class="col-1"><div style="width:60mm"><strong>Amount payable</strong></div></td><td class="col-2"><div style="width:118mm"><?php echo $amount;?></div></td>
			</tr>
		</table>
	</div>
	<div class="invoce-bottom">
		<table class="table-2" cellpadding="0" cellspacing="0">
			<tr class="row-7"><td class="col-1"><strong><u>Filled by Cashier</u></strong></td></tr>
			<tr class="row-8"><td class="col-1">Amount Received</td></tr>
			<tr class="row-9"><td class="col-1">Received Date</td></tr>
			<tr class="row-10"><td class="col-1">Account's Signature</td></tr>
			<tr class="row-11"><td class="col-1">Cashier's Signature</td></tr>
			<tr class="row-12"><td class="col-1"><div style="width:170mm">Chief Accountan's Signature</div></td></tr>
		</table>
	</div>
</div>
</div>
</div>
