<h1><span>Order Details</span></h1>
<div class="form cheking-details">
	<table class="table-1">
		<?php if(($model->reference!='Empty') ): ?><tr class="row-1"><td class="col-1">Reference:</td><td class="col-2"><?php echo $model->reference; ?></td></tr><?php endif; ?>
		<tr class="row-1"><td class="col-1">Full  Name:</td><td class="col-2"><?php echo $model->name; ?></td></tr>
		<tr class="row-2"><td class="col-1">Tel.:</td><td class="col-2"><?php echo $model->phone; ?></td></tr>
		<tr class="row-3"><td class="col-1">E-mail:</td><td class="col-2"><?php echo $model->email; ?></td></tr>
		<tr class="row-4"><td class="col-1">Purpose:</td><td class="col-2"><?php echo $model->purpose; ?></td></tr>
		<tr class="row-5"><td class="col-1">Amount:</td><td class="col-2"><?php echo $model->amount; ?> <?php echo Yii::app()->params['currency'][$model->currency.'']; ?></td></tr>
		<?php if(Yii::app()->user->isGuest && ($model->reference=='Empty') ): ?>
            <tr class="row-6">
                <td class="col-1">
                    <a class="like-a-button" href="<?php echo Yii::app()->createUrl('payonline/update', array('id'=>$model->id)); ?>">INCORRECT</a>
                </td>
                <td class="col-2">
                    <a class="like-a-button" href="<?php echo Yii::app()->createUrl('payonline/online'); ?>">CORRECT</a>
                    
                </td>
            </tr>
		<?php else: ?>
            <tr class="row-6">
                <td colspan="2" class="col-1" style="text-align:center; padding-right:0px;">
                    <a class="like-a-button" href="javascript:window.history.back()">Back</a>
                </td>
            </tr>
		<?php endif; ?>
	</table>
</div>


