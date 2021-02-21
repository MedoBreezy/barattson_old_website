<?php
/* @var $this RegistrationController */
/* @var $model Registr */

$this->breadcrumbs=array(
	'Registrs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Registr', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#registr-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Registrs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registr-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('width'=>10),
        ),
		array(
            'name'=>'reg_num',
            'value'=>'$data->reg_num',
        ),
		array(
            'name'=>'reference',
            'value'=>'isset($data->reference) && !empty($data->reference) ? $data->reference: "Empty"',
            'htmlOptions'=>array('width'=>90),
        ),
		array(
            'name'=>'name',
            'value'=>'$data->name." ".$data->surname',
            'htmlOptions'=>array('width'=>'120px'),
        ),
		array(
            'name'=>'date',
            'value'=>'date("d-m-Y", strtotime($data->date))',
            'htmlOptions'=>array('width'=>'75px'),
        ),
		array(
            'name'=>'phone',
            'value'=>'$data->phone',
        ),
		array(
            'name'=>'email',
            'value'=>'$data->email',
        ),
		array(
            'name'=>'status',
            'value'=>'$data->status==1?"Online (1)":"Cash (2)"',
        ),
		array(
            'name'=>'amount',
            'value'=>'$data->amount." AZN"',
        ),
		/*
		'company',
		'date',
		'email',
		'imgpath',
		'fab',
		'fma',
		'ffa',
		'glo',
		'eng',
		'fa_one',
		'ma_one',
		'fa_two',
		'ma_two',
		'fab_date',
		'fma_date',
		'ffa_date',
		'glo_date',
		'eng_date',
		'fa_one_date',
		'ma_one_date',
		'fa_two_date',
		'ma_two_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
