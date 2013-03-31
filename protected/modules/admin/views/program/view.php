<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Create Program', 'url'=>array('create')),
	array('label'=>'Update Program', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Program', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>View Program #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'url',
		'description',
		array(
		'name'	=> 'imageId',
		'value' => $model->image->title
		),
		array(
			'name' => 'timing',
			'value' => date("l, h:i A", strtotime($program->timing))
		),
		array(
		 'name' => 'status',
		 'value' => Yii::app()->params["app"]["programStatusArray"][$model->status],
		),
		array(
		 'name' => 'type',
		 'value' => Yii::app()->params["app"]["programTypesArray"][$model->type],
		),
		'upVotes',
		'downVotes',
	),
)); ?>
