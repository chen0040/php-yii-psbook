<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_id'); ?>
		<?php echo $form->textField($model,'from_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_type'); ?>
		<?php echo $form->textField($model,'from_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to_id'); ?>
		<?php echo $form->textField($model,'to_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to_type'); ?>
		<?php echo $form->textField($model,'to_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text_message'); ?>
		<?php echo $form->textArea($model,'text_message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text_date'); ?>
		<?php echo $form->textField($model,'text_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field1'); ?>
		<?php echo $form->textField($model,'field1',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field2'); ?>
		<?php echo $form->textField($model,'field2',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text_type'); ?>
		<?php echo $form->textField($model,'text_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->