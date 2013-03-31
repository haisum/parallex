<?php
/* @var $this SettingController */
/* @var $model Setting */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php if($model->isNewRecord || $model->category == 'slider'){ ?>
		<?php echo $form->dropDownList($model,'category', array('system' => 'system', 'slider'=>slider)); ?>
		<?php } else{ ?>
			<?php echo $model->category; ?>
		<?php } ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key'); ?>
		<?php echo $form->textField($model,'key',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php if( $model->category == "slider"){ ?>
		<?php
			$this->widget('application.extensions.editMe.widgets.ExtEditMe', array(
			    'model'=>$model,
			    'attribute'=>'value',
			));
		 }  else {?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>255)); ?>
		<?php } ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->