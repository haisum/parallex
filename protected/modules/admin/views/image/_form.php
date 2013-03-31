<?php
/* @var $this ImageController */
/* @var $model Image */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data'
	)
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php if(!$model->isNewRecord){ ?>
		<?php echo CHtml::image(Yii::app()->baseUrl. "/" . $model->path, "thumbnail") . '<br/>'; ?>
		<?php } ?>
		<?php echo $form->fileField($model, 'uploadedImage'); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'lastModified'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'lastModified', //attribute name
                'mode'=>'datetime', //use "time","date" or "datetime" (default)
                'options' => array(
                	'dateFormat' => 'yy-mm-dd',
                	'timeFormat' => 'hh:mm:00'
                ),
                'language' => '',
                'htmlOptions' => array(
                	"readonly" => "readonly"
                )
            ));
        ?>
		<?php echo $form->error($model,'lastModified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->