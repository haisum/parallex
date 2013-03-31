<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>View Comment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'programId',
			'value' => $model->program->name
		),
		'name',
		'email',
		'website',
		'comment',
		array(
			'name' => 'postedTime',
			'value' => date("F jS, Y", strtotime($model->postedTime))
		),
		array(
			'name' => 'status',
			'value' => Yii::app()->params["app"]["commentStatusArray"][$model->status]
		),
	),
)); ?>
