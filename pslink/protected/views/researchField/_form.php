<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'research-field-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'research_field_name'); ?>
		<?php if($model->isNewRecord): ?>
		<?php echo $form->textField($model,'research_field_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php else: ?>
		<?php echo $model->research_field_name; ?>
		<?php endif; ?>
		<?php echo $form->error($model,'research_field_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'research_field_category'); ?>
		<?php echo $form->textField($model,'research_field_category',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'research_field_category'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->