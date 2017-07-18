<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-research-field-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->hiddenField($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'research_field_id'); ?>
		<?php echo $form->dropDownList($model,'research_field_id', CHtml::listData(ResearchField::model()->findAll(), 'id', 'research_field_name', 'research_field_category')); ?>
		<?php echo $form->error($model,'research_field_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->