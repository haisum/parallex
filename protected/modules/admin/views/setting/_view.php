<?php
/* @var $this SettingController */
/* @var $data Setting */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('key')); ?>:</b>
	<?php echo CHtml::encode($data->key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo Yii::app()->setting->get($data->key, $data->category); ?>
	<br />


</div>