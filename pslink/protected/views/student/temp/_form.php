<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
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
		<?php echo $form->labelEx($model,'gre_score'); ?>
		<?php echo $form->textField($model,'gre_score'); ?>
		<?php echo $form->error($model,'gre_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tofle_score'); ?>
		<?php echo $form->textField($model,'tofle_score'); ?>
		<?php echo $form->error($model,'tofle_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gpa_score'); ?>
		<?php echo $form->textField($model,'gpa_score'); ?>
		<?php echo $form->error($model,'gpa_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'study_avail_time'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    
			'attribute'=>'study_avail_time',
			
			'model'=>$model,
			
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;',

			),
		));
		?>
		<?php echo $form->error($model,'study_avail_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'study_level_id'); ?>
		<?php echo $form->dropDownList($model,'study_level_id', CHtml::listData(StudyLevel::model()->findAll(), 'id', 'study_level_name')); ?>
		<?php echo $form->error($model,'study_level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'study_type_id'); ?>
		<?php echo $form->dropDownList($model,'study_type_id', CHtml::listData(StudyType::model()->findAll(), 'id', 'study_type_name')); ?>
		<?php echo $form->error($model,'study_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'education_level_id'); ?>
		<?php echo $form->dropDownList($model,'education_level_id', CHtml::listData(EducationLevel::model()->findAll(), 'id', 'education_level_name')); ?>
		<?php echo $form->error($model,'education_level_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'highest_education_school'); ?>
		<?php echo $form->textField($model,'highest_education_school',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'highest_education_school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposed_research_topic'); ?>
		<?php echo $form->textArea($model,'proposed_research_topic',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'proposed_research_topic'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->