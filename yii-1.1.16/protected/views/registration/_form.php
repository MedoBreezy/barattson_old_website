<?php
/* @var $this RegistrationController */
/* @var $model Registr */
/* @var $form CActiveForm */
?>
<script language="javascript">
$(document).ready(function(){
        
    $('.Registr_fab').html(getAfterMonth($( "#Registr_fab_date" )));
    $('.Registr_fma').html(getAfterMonth($( "#Registr_fma_date" )));
    $('.Registr_ffa').html(getAfterMonth($( "#Registr_ffa_date" )));
    $('.Registr_glo').html(getAfterMonth($( "#Registr_glo_date" )));
    $('.Registr_eng').html(getAfterMonth($( "#Registr_eng_date" )));
    $('.Registr_fa_one').html(getAfterMonth($( "#Registr_fa_one_date" )));
    $('.Registr_ma_one').html(getAfterMonth($( "#Registr_ma_one_date" )));
    $('.Registr_fa_two').html(getAfterMonth($( "#Registr_fa_two_date" )));
    $('.Registr_ma_two').html(getAfterMonth($( "#Registr_ma_two_date" )));
    setAmount();
    
    $('#registr-form :checkbox').click(function() {
        var that = $(this);
        if (that.is(':checked')) {
            setAmount();
        } else {
            setAmount();
        }
    });
    $( "#Registr_fab_date" ).change(function() {
        $('.Registr_fab').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_fma_date" ).change(function() {
        $('.Registr_fma').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_ffa_date" ).change(function() {
        $('.Registr_ffa').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_glo_date" ).change(function() {
        $('.Registr_glo').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_eng_date" ).change(function() {
        $('.Registr_eng').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_fa_one_date" ).change(function() {
        $('.Registr_fa_one').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_ma_one_date" ).change(function() {
        $('.Registr_ma_one').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_fa_two_date" ).change(function() {
        $('.Registr_fa_two').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_ma_two_date" ).change(function() {
        $('.Registr_ma_two').html(getAfterMonth(this));
        setAmount();
    });
});
function setAmount(){
    var amount = 0;
    $('#registr-form :checkbox').each(function( index ) {
      var that = $(this);
      amount += that.is(':checked') ? $('.'+$(this).attr('id')).html()*1 : 0;
    });
    $('#amount').html(amount);
}
function getAfterMonth(elem){
    /*var st = $(elem).val();
    var pattern = /(\d{2})-(\d{2})-(\d{4})/;
    
    var dt = new Date(st.replace(pattern,'$3-$2-$1'));
    //console.log(dt);
    var today = new Date();
    today = today.getTime()+60*60*24*31*1000;
    dt = dt.getTime();
    return today>dt?150:130;*/
}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registr-form',
	
	'htmlOptions'=>array(
	    'enctype'=>'multipart/form-data',
	    ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<table class="table-1">
	<tr class="row-1">
		<td class="col-1"><?php echo $form->labelEx($model,'name'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-1">
		<td class="col-1"><?php echo $form->labelEx($model,'surname'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'surname',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	<tr class="row-2">
		    <td class="col-1"><?php echo $form->labelEx($model,'date'); ?></td>
		<td class="col-2">
		    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model, 'attribute'=>'date','language' => 'en-GB','options'=>array('showAnim'=>'fold','dateFormat'=>'dd-mm-yy','changeMonth'=>true,'changeYear'=>true,'yearRange'=>'1960:'.date("Y", time())),'htmlOptions'=>array(),)); ?>
		</td>
	</tr>

	<tr class="row-3">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_num'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_num',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	<tr class="row-4">
		<td class="col-1"><?php echo $form->labelEx($model,'phone'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	<tr class="row-5">
		<td class="col-1"><?php echo $form->labelEx($model,'company'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>512)); ?></td>
	</tr>

	<tr class="row-6">
		<td class="col-1"><?php echo $form->labelEx($model,'email'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	<tr class="row-7 row-last">
		<td class="col-1"><?php echo $form->labelEx($model,'imgpath'); ?>
		<?php if(!$model->isNewRecord) if(strlen($model->imgpath) > 5): ?>
		    <img src="/payment<?php echo $model->imgpath; ?>" width="150px" /><br/>
		<?php endif;?></td>
		<td class="col-2"><?php echo CHtml::activeFileField($model, 'image',array('size'=>60,'maxlength'=>1024)); ?>
		<div class="form-infos">(front side only)</div>
		</td>
	</tr>	
	</table>
	
	<table class="table-2">
	<tr class="row-8">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'fab'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'fab'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'fab_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_fab">71</span> GBP
	    </td>	</tr>
	
	<tr class="row-9">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'fma'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'fma'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'fma_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_fma">71</span> GBP
	    </td>	</tr>
	
	<tr class="row-10">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'ffa'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'ffa'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'ffa_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_ffa">71</span> GBP
	    </td>	</tr>
	
	<tr class="row-11">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'glo'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'glo'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'glo_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_glo">90</span> GBP
	    </td>	</tr>
	
	<tr class="row-12">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'eng'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'eng'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'eng_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_eng">90</span> GBP
	    </td>	</tr>
	
	<tr class="row-13">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'fa_one'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'fa_one'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'fa_one_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_fa_one">71</span> GBP
	    </td>	</tr>
	
	<tr class="row-14">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'ma_one'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'ma_one'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'ma_one_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_ma_one">71</span> GBP
	    </td>	</tr>
	
	<tr class="row-15">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'fa_two'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'fa_two'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'fa_two_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_fa_two">71</span> GBP
	    </td>	</tr>
	
	<tr class="row-16">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'ma_two'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'ma_two'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'ma_two_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_ma_two">71</span> GBP
	    </td>	</tr>
<tr class="row-17 amount-container"><td class="col-1" colspan="4">Amount payable: <span id="amount">0</span> GBP (VAT not incuded)</td></tr>
	<tr class="row-18 buttons"><td class="col-1" colspan="4">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'SUBMIT' : 'SUBMIT'); ?></td>
	</tr>
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->