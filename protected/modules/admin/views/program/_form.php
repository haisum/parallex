<?php
/* @var $this ProgramController */
/* @var $model Program */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'program-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imageId'); ?>
		<?php echo $form->dropDownList($model,'imageId', CHtml::listData(Image::model()->findAll("type = " . Yii::app()->params["app"]["imageTypes"]["program"]), "id", "title")); ?>
		<?php echo $form->error($model,'imageId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timing'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'timing', //attribute name
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
		<?php echo $form->error($model,'timing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', Yii::app()->params["app"]["programStatusArray"]); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', Yii::app()->params["app"]["programTypesArray"]); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upVotes'); ?>
		<?php echo $form->textField($model,'upVotes',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'upVotes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'downVotes'); ?>
		<?php echo $form->textField($model,'downVotes',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'downVotes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->