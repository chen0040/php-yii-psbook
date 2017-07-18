<div class="form">
<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<?php
$style_header='color: #3366ff;';

$profile_image=$model->getImagePathIfFileExists();
?>
<img style="position: absolute; left: 50px; top: 90px; width: 250px; height: 250px; z-index: 3;" src="<?php echo $profile_image; ?>" alt="" width="450" height="300" /> 

<div style="position: absolute; left: 50px; top: 350px; width: 300px; height: 50px; z-index: 3;">
	<div class="row" style="color:white">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
</div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-student-password-dialog',
    'options'=>array(
        'title'=>'Change Password',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangePassword', array('model'=>$model)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/CP.png', "Change Password", array('style'=>'vertical-align:middle;')), '#', array(
   'onclick'=>'$("#change-student-password-dialog").dialog("open"); return false;', 
   'style'=>'position: absolute; left: 772px; top: 430px; width: 102px; height: 34px; z-index: 22;',
));
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-student-localization-dialog',
    'options'=>array(
        'title'=>'Change Localization',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeLocalization', array('model'=>$model)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/CL.png', "Change Localization", array('style'=>'vertical-align:middle;')), '#', array(
   'onclick'=>'$("#change-student-localization-dialog").dialog("open"); return false;', 
   'style'=>'position: absolute; left: 772px; top: 480px; width: 102px; height: 34px; z-index: 22;',
));
?>

<div style="position: absolute; left: 400px; top: 90px; width: 560px; height: 295px; z-index: 4;color:white;">
	<table>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'first_name'); ?> 
		<?php echo $form->textField($model,'first_name',array('size'=>30,'maxlength'=>128)); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>30,'maxlength'=>128)); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->error($model,'first_name'); ?>
	</td>
	<td>
		<?php echo $form->error($model,'last_name'); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'highest_education_school'); ?>
		<?php echo $form->hiddenField($model, 'highest_education_school'); ?>
		<?php 
		//echo $form->textField($model,'highest_education_school',array('size'=>30,'maxlength'=>256)); 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			'name'=>'highest_education_school_autocomplete',
			'value'=>$model->highest_education_school,
			'source'=>Yii::app()->schoolService->getSchools(),
			'options'=>array(
				'minLength'=>'1', // min chars to start search
				'select'=>'js:function(event, ui) { $("#Student_highest_education_school").val(ui.item.value); }'
			),
			'htmlOptions'=>array(
				'id'=>'highest_education_school_autocomplete',
				'rel'=>'val',
				'size'=>'30',
			),
		));
		?>
		<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-student-school-dialog',
			'options'=>array(
				'title'=>'Select Student School',
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formSelectSchool', array('model'=>$model)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');
		echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/edit.png', "Edit", array('style'=>'vertical-align:middle;')), '#', array(
		   'onclick'=>'$("#select-student-school-dialog").dialog("open"); return false;', 
		));
		?>
	</td>
	<td>
		
		<?php echo $form->labelEx($model, 'country_id', array('label'=>Yii::t('translation','Country'))); ?>
		<?php echo $form->dropDownList($model,'country_id', CHtml::listData(Country::model()->findAll(), 'id', 'country_name')); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->error($model,'highest_education_school'); ?>
	</td>
	<td>
		<?php echo $form->error($model,'country_id'); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'email1'); ?>
		<?php echo $form->textField($model,'email1',array('size'=>30,'maxlength'=>128)); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model,'gender_id'); ?>
		<?php echo $form->dropDownList($model,'gender_id', CHtml::listData(Gender::model()->findAll(), 'id', 'gender_name')); ?>
	</div>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->error($model,'email1'); ?>
	</td>
	<td>
		<?php echo $form->error($model,'gender_id'); ?>
	</td>
	</tr>
	
	<tr>
	<td>
		<?php echo $form->labelEx($model,'phone1', array('label'=>Yii::t('translation', 'Phone'))); ?>
		<?php echo $form->textField($model,'phone1',array('size'=>30,'maxlength'=>128)); ?>		
	</td>
	<td>
		<?php echo $form->labelEx($model,'race'); ?>
		<?php echo $form->textField($model,'race',array('size'=>30,'maxlength'=>128)); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->error($model,'phone1'); ?>
	</td>
	<td>
		<?php echo $form->error($model,'race'); ?>
	</td>
	</tr>
	
	<tr>
	<td colspan="2">
		<?php echo $form->labelEx($model,'looking_for'); ?>
		<?php echo $form->textField($model,'looking_for',array('size'=>77,'maxlength'=>128)); ?>		
	</td>
	</tr>
	<tr>
	<td colspan="2">
		<?php echo $form->error($model,'looking_for'); ?>
	</td>
	</tr>
	
	</table>
</div>

	

	
<div style="position: absolute; left: 10px; top: 450px; width: 860px; height: 695px; z-index: 4;">
	<?php echo $form->errorSummary($model); ?>
	
	<table>
	<tr>
	<td colspan="3">
	<p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Education'); ?>: </span></p>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'gpa_score'); ?>
	</td>
	<td>
		<?php echo $form->textField($model,'gpa_score'); ?>
	</td>
	<td>
		<?php echo $form->error($model,'gpa_score'); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'education_level_id'); ?>
	</td>
	<td>
		<?php echo $form->dropDownList($model,'education_level_id', CHtml::listData(EducationLevel::model()->findAll(), 'id', 'education_level_name')); ?>
	</td>
	<td>
		<?php echo $form->error($model,'education_level_id'); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'study_level_id'); ?>
	</td>
	<td>
		<?php echo $form->dropDownList($model,'study_level_id', CHtml::listData(StudyLevel::model()->findAll(), 'id', 'study_level_name')); ?>
	</td>
	<td>
		<?php echo $form->error($model,'study_level_id'); ?>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'study_type_id'); ?>
	</td>
	<td>
		<?php echo $form->dropDownList($model,'study_type_id', CHtml::listData(StudyType::model()->findAll(), 'id', 'study_type_name')); ?>
	</td>
	<td>
		<?php echo $form->error($model,'study_type_id'); ?>
	</td>
	</tr>
	<tr>
	<td colspan="3">
		<p class="heading1"><span style="<?php echo $style_header; ?>">
		<?php echo $form->labelEx($model,'proposed_research_topic'); ?>
		</span></p>
	</td>
	</tr>
	<tr>
	<td colspan="2">
		<?php echo $form->textArea($model,'proposed_research_topic',array('rows'=>6, 'cols'=>50)); ?>
	</td>
	<td>
		<?php echo $form->error($model,'proposed_research_topic'); ?>
	</td>
	</tr>
	<tr>
	<td colspan="3">
		<p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'English'); ?>: </span></p>
	</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'gre_score'); ?>
	</td>
	<td>
		<?php echo $form->textField($model,'gre_score'); ?> 
	</td>
	<td>
		<?php echo $form->error($model,'gre_score'); ?>
	</td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'tofle_score'); ?></td>
		<td><?php echo $form->textField($model,'tofle_score'); ?></td>
		<td><?php echo $form->error($model,'tofle_score'); ?></td>
	</tr>
	<tr>
		<td colspan="3"><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Universities You Applied'); ?>:</span></p></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $form->textArea($model,'universities_applied',array('rows'=>6, 'cols'=>50)); ?></td>
		<td><?php echo $form->error($model,'universities_applied'); ?></td>
	</tr>
	
	<tr>
		<td colspan="3"><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Address'); ?>:</span></p></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'address_line1'); ?></td>
		<td><?php echo $form->textField($model,'address_line1',array('size'=>30,'maxlength'=>128)); ?></td>
		<td><?php echo $form->error($model,'address_line1'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'address_line2'); ?></td>
		<td><?php echo $form->textField($model,'address_line2',array('size'=>30,'maxlength'=>128)); ?></td>
		<td><?php echo $form->error($model,'address_line2'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'address_line3'); ?></td>
		<td><?php echo $form->textField($model,'address_line3',array('size'=>30,'maxlength'=>128)); ?></td>
		<td><?php echo $form->error($model,'address_line3'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'address_line4'); ?></td>
		<td><?php echo $form->textField($model,'address_line4',array('size'=>30,'maxlength'=>128)); ?></td>
		<td><?php echo $form->error($model,'address_line4'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'postal'); ?></td>
		<td><?php echo $form->textField($model,'postal',array('size'=>30,'maxlength'=>16)); ?></td>
		<td><?php echo $form->error($model,'postal'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->labelEx($model,'province'); ?></td>
		<td><?php echo $form->textField($model,'province',array('size'=>30,'maxlength'=>128)); ?></td>
		<td><?php echo $form->error($model,'province'); ?></td>
	</tr>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>

</div><!-- form -->