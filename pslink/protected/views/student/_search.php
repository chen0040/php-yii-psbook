<div class="form">

<?php
$loginType='';
$user=null;
if(isset(Yii::app()->user))
{
	if(Yii::app()->user->hasState('cLoginType'))
	{
		$loginType=Yii::app()->user->cLoginType;
	}
}
 
if(strcmp($loginType, 'Professor')==0)
{
	$user=Professor::model()->find('id=?', array(Yii::app()->user->cId));
}
else if(strcmp($loginType, 'Student')==0)
{
	$user=Student::model()->find('id=?', array(Yii::app()->user->cId));
}
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<table>
	
	<tr><td colspan="4"><hr /></td></tr>
	
	<tr>
	<td>
		<?php echo Yii::t('translation', 'First Name'); ?>
	</td>
	<td>
		<?php echo $form->textField($model,'first_name'); ?>
	</td>

	<td>
		<?php echo Yii::t('translation', 'Last Name'); ?>
	</td>
	<td>
		<?php echo $form->textField($model,'last_name'); ?>
	</td>
	</tr>
	
	<tr>
	<td>
		<?php echo Yii::t('translation','Email'); ?>
	</td>
	<td>
		<?php echo $form->textField($model,'email1'); ?>
	</td>

	<td>
		<?php echo Yii::t('translation','Phone'); ?>
	</td>
	<td>
		<?php echo $form->textField($model,'phone1'); ?>
	</td>
	</tr>

	<td>
		<?php echo Yii::t('translation','School'); ?>
	</td>
	<td>
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
				'size'=>'20',
			),
		));
		?>
		<?php if(isset($user)): ?>
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

		echo $this->renderPartial('_formSelectSchool', array('model'=>$user)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');
		echo CHtml::link(Yii::t('translation', 'Select'), '#', array(
		   'onclick'=>'$("#select-student-school-dialog").dialog("open"); return false;', 
		));
		?>
		<?php endif; ?>
	</td>

	<td>
		<?php echo Yii::t('translation','Research'); ?>
	</td>
	<td>
		<?php echo $form->hiddenField($model, 'proposed_research_topic'); ?>
		<?php 
		$rfs=array();
		$rf_all=ResearchField::model()->findAll('research_field_name !=""');
		foreach($rf_all as $rf_model)
		{
			$rfs[]=($rf_model->research_field_name);
		}
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			'name'=>'proposed_research_topic_autocomplete',
			'value'=>$model->proposed_research_topic,
			'source'=>$rfs,
			'options'=>array(
				'minLength'=>'1', // min chars to start search
				'select'=>'js:function(event, ui) { $("#Student_proposed_research_topic").val(ui.item.value); }'
			),
			'htmlOptions'=>array(
				'id'=>'proposed_research_topic_autocomplete',
				'rel'=>'val',
				'size'=>'20',
			),
		));
		?>
		
		<?php if(isset($user)): ?>
		<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-student-research-dialog',
			'options'=>array(
				'title'=>'Select Student Research',
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formSelectResearch', array('model'=>$user)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');
		echo CHtml::link(Yii::t('translation', 'Select'), '#', array(
		   'onclick'=>'$("#select-student-research-dialog").dialog("open"); return false;', 
		));
		?>
		<?php endif; ?>
	</td>
	</tr>
	
	<tr><td colspan="4"><hr /></td></tr>
	
	<tr>
	<td colspan="4">
	<?php echo CHtml::submitButton(Yii::t('translation', 'Search'), array('class'=>'black', 'style'=>'color:white;width:120px;float:right', 'id'=>'btn-search')); ?>
	</td>
	</tr>
	</table>
<?php $this->endWidget(); ?>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript(
	'register-text-change-research-complete',
	'
		$("#proposed_research_topic_autocomplete").change(function() 
		{ 
			$("#Student_proposed_research_topic").val($("#proposed_research_topic_autocomplete").val());
		});
	',
	CClientScript::POS_READY
);

$cs->registerScript(
	'register-text-change-school-complete',
	'
		$("#highest_education_school_autocomplete").change(function() 
		{ 
			$("#Student_highest_education_school").val($("#highest_education_school_autocomplete").val());
		});
		$("#btn-search").corner();
	',
	CClientScript::POS_READY
);

?>

</div><!-- search-form -->