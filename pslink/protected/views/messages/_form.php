<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'from_id'); ?>
		<?php echo $form->textField($model,'from_id'); ?>
		<?php echo $form->error($model,'from_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_type'); ?>
		<?php echo $form->textField($model,'from_type'); ?>
		<?php echo $form->error($model,'from_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to_id'); ?>
		<?php echo $form->textField($model,'to_id'); ?>
		<?php echo $form->error($model,'to_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to_type'); ?>
		<?php echo $form->textField($model,'to_type'); ?>
		<?php echo $form->error($model,'to_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_message'); ?>
		<?php echo $form->textArea($model,'text_message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text_message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_date'); ?>
		<?php echo $form->textField($model,'text_date'); ?>
		<?php echo $form->error($model,'text_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field1'); ?>
		<?php echo $form->textField($model,'field1',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'field1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field2'); ?>
		<?php echo $form->textField($model,'field2',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'field2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_type'); ?>
		<?php echo $form->textField($model,'text_type'); ?>
		<?php echo $form->error($model,'text_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->