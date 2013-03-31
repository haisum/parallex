<?php
/* @var $this ProgramController */
/* @var $data Program */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b style="vertical-align:top;"><?php echo CHtml::encode($data->getAttributeLabel('imageId')); ?>:</b>
	<img src="<?php echo Yii::app()->baseUrl . '/' . $data->image->path; ?>" alt="thumbnail"/>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timing')); ?>:</b>
	<?php echo date("l, h:i A", strtotime($data->timing)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo Yii::app()->params["app"]["programTypesArray"][$data->type]; ?>
	<br />

	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php Yii::app()->params["app"]["programTypesArray"]; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upVotes')); ?>:</b>
	<?php echo CHtml::encode($data->upVotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downVotes')); ?>:</b>
	<?php echo CHtml::encode($data->downVotes); ?>
	<br />

	*/ ?>

</div>