<?php
/* @var $this RegistrationController */
/* @var $model Registr */
/* @var $form CActiveForm */
?>
<script language="javascript">
$(document).ready(function(){
        
    $('.Registr_gepl').html(getAfterMonth($( "#Registr_gepl_date" )));
    $('.Registr_fmpl').html(getAfterMonth($( "#Registr_fmpl_date" )));
    $('.Registr_iltpl').html(getAfterMonth($( "#Registr_iltpl_date" )));
    setAmount();
    
    $('#placement-form :checkbox').click(function() {
        var that = $(this);
        if (that.is(':checked')) {
            setAmount();
        } else {
            setAmount();
        }
    });
    $( "#Registr_gepl_date" ).change(function() {
        $('.Registr_gepl').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_fmpl_date" ).change(function() {
        $('.Registr_fmpl').html(getAfterMonth(this));
        setAmount();
    });
    $( "#Registr_iltpl_date" ).change(function() {
        $('.Registr_iltpl').html(getAfterMonth(this));
        setAmount();
    });
});
function setAmount(){
    var amount = 0;
    $('#placement-form :checkbox').each(function( index ) {
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
	'id'=>'placement-form',
	
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
	
	
	
	
	<table class="table-2">
	<tr class="row-8">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'gepl'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'gepl'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'gepl_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_gepl">10</span> AZN
	    </td>	</tr>
	
	<tr class="row-9">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'fmpl'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'fmpl'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'fmpl_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_fmpl">30</span> AZN
	    </td>	</tr>
	
	<tr class="row-10">
	    <td class="col-1">
		<?php echo $form->checkBox($model,'iltpl'); ?>
	    </td>
	    <td class="col-2">
		<?php echo $form->labelEx($model,'iltpl'); ?>
	    </td>
	    <td class="col-3">
				<?php $this->widget(
				    'ext.jui.EJuiDateTimePicker', array(
					'model'     => $model, 'attribute' => 'iltpl_date', 'language'=> 'en-GB',
					//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
					'options'   => array('dateFormat' => 'dd-mm-yy /', 'timeFormat' => 'HH:mm'),
				)); ?>
	    </td>
	    <td class="col-4">
		<span class="Registr_iltpl">10</span> AZN
	    </td>	</tr>
	
</table>
	
	
	
	<table class="table-1">
	<tr class="row-1">
		<td class="col-1"><?php echo $form->labelEx($model,'name'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-2">
		<td class="col-1"><?php echo $form->labelEx($model,'surname'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'surname',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	<tr class="row-3">
		    <td class="col-1"><?php echo $form->labelEx($model,'date'); ?></td>
		<td class="col-2">
		    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model, 'attribute'=>'date','language' => 'en-GB','options'=>array('showAnim'=>'fold','dateFormat'=>'dd-mm-yy','changeMonth'=>true,'changeYear'=>true,'yearRange'=>'1960:'.date("Y", time())),'htmlOptions'=>array(),)); ?>
		</td>
	</tr>


	<tr class="row-4">
		<td class="col-1"><?php echo $form->labelEx($model,'email'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	<tr class="row-5">
		<td class="col-1"><?php echo $form->labelEx($model,'phone'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	
	
	
	<tr class="row-6">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_course'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_course',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-7">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_course_type'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_course_type',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-8">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_class_type'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_class_type',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-9">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_pre_start_date'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_pre_start_date',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-10">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_pre_week_day'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_pre_week_day',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>
	<tr class="row-11">
		<td class="col-1"><?php echo $form->labelEx($model,'reg_pre_hours'); ?></td>
		<td class="col-2"><?php echo $form->textField($model,'reg_pre_hours',array('size'=>60,'maxlength'=>255)); ?></td>
	</tr>

	

	<tr class="row-12 row-last">
		<td class="col-1"><?php echo $form->labelEx($model,'imgpath'); ?>
		<?php if(!$model->isNewRecord) if(strlen($model->imgpath) > 5): ?>
		    <img src="/payment<?php echo $model->imgpath; ?>" width="150px" /><br/>
		<?php endif;?></td>
		<td class="col-2"><?php echo CHtml::activeFileField($model, 'image',array('size'=>60,'maxlength'=>1024)); ?>
		<div class="form-infos">(front side only)</div>
		</td>
	</tr>	
<tr class="row-17 amount-container"><td class="col-1" colspan="4">Amount payable: <span id="amount">0</span> AZN (VAT not incuded)</td></tr>
	<tr class="row-18 buttons"><td class="col-1" colspan="4">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'SUBMIT' : 'SUBMIT'); ?></td>
	</tr>
	</table>
	

<?php $this->endWidget(); ?>

</div><!-- form -->