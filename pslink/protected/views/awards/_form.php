<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'awards-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'award_name'); ?>
		<?php echo $form->textField($model,'award_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'award_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->