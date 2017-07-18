<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'student_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'article_id'); ?>
		<?php echo $form->dropDownList($model,'article_id', CHtml::listData(Article::model()->findAll(), 'id', 'title', 'journal')); ?>
		<?php echo $form->error($model,'article_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->