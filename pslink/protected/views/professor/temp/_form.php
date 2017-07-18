<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'professor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'gender_id'); ?>
		<?php echo $form->dropDownList($model,'gender_id', CHtml::listData(Gender::model()->findAll(), 'id', 'gender_name')); ?>
		<?php echo $form->error($model,'gender_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'race'); ?>
		<?php echo $form->textField($model,'race',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'race'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line1'); ?>
		<?php echo $form->textField($model,'address_line1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address_line1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line2'); ?>
		<?php echo $form->textField($model,'address_line2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address_line2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line3'); ?>
		<?php echo $form->textField($model,'address_line3',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address_line3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line4'); ?>
		<?php echo $form->textField($model,'address_line4',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address_line4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postal'); ?>
		<?php echo $form->textField($model,'postal',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'postal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model,'country_id', CHtml::listData(Country::model()->findAll(), 'id', 'country_name')); ?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email1'); ?>
		<?php echo $form->textField($model,'email1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email2'); ?>
		<?php echo $form->textField($model,'email2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_code1'); ?>
		<?php echo $form->textField($model,'country_code1',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'country_code1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_code2'); ?>
		<?php echo $form->textField($model,'country_code2',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'country_code2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_code1'); ?>
		<?php echo $form->textField($model,'area_code1',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'area_code1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_code2'); ?>
		<?php echo $form->textField($model,'area_code2',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'area_code2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone1'); ?>
		<?php echo $form->textField($model,'phone1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'phone1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone2'); ?>
		<?php echo $form->textField($model,'phone2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'phone2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo $form->textArea($model,'university',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'university'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'school'); ?>
		<?php echo $form->dropDownList($model,'school', CHtml::listData(EducationSchool::model()->findAll(), 'id', 'institute_name')); ?>
		<?php echo $form->error($model,'school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'division'); ?>
		<?php echo $form->dropDownList($model,'division', CHtml::listData(EducationDivision::model()->findAll(), 'id', 'division_name')); ?>
		<?php echo $form->error($model,'division'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'research'); ?>
		<?php echo $form->textArea($model,'research',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'research'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->