<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-friends-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'student_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'friend_id'); ?>
		<?php echo $form->dropDownList($model,'friend_id', CHtml::listData(Student::model()->findAll(), 'id', 'username')); ?>
		<?php echo $form->error($model,'friend_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->