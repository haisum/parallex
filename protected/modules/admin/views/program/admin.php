<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'Programs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Create Program', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#program-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Programs</h1>

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
	'id'=>'program-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'title',
			'type' => 'raw',
			'value' => 'CHtml::image(Yii::app()->baseUrl. "/" . $data->image->path, "thumbnail", array("style" => "width:100px;"))',
			'header' => 'Image',
			'filter' => false,
		),
		'name',
		'url',
		array(
			'name' => 'timing',
			'value' => 'date("l, h:i A", strtotime($data->timing))',
			'filter' => false
		),
		array(
			'name' => 'type',
			'value' => 'Yii::app()->params["app"]["programTypesArray"][$data->type]',
			'filter' => Yii::app()->params["app"]["programTypesArray"]
		),
		/*
		'status',
		'upVotes',
		'downVotes',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
