<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b style="vertical-align:top;"><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::image(Yii::app()->baseUrl. "/" . $data->path, "thumbnail"); ?>
	<br />

	<b style="vertical-align:top;">Url:</b>
	<?php echo CHtml::link(Yii::app()->getBaseUrl(true). "/" . $data->path, Yii::app()->baseUrl. "/" . $data->path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastModified')); ?>:</b>
	<?php echo CHtml::encode($data->lastModified); ?>
	<br />


</div>