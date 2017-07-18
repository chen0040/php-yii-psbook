<div class="form">

<?php
$user=Yii::app()->accountMgr->getUser();
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<table>
	
	<tr><td colspan="4"><hr /></td></tr>

	
	<tr>
	<td>
		<?php echo Yii::t('translation','First Name'); ?>
	</td><td>
		<?php echo $form->textField($model,'first_name'); ?>
	</td>

	<td>
		<?php echo Yii::t('translation','Last Name'); ?>
	</td><td>
		<?php echo $form->textField($model,'last_name'); ?>
	</td>
	</tr>

	<tr>
	<td>
		<?php echo Yii::t('translation','Email'); ?>
	</td><td>
		<?php echo $form->textField($model,'email1'); ?>
	</td>

	<td>
		<?php echo Yii::t('translation','Website'); ?>
	</td><td>
		<?php echo $form->textField($model,'email2'); ?>
	</td>
	</tr>

	<tr>
	<td>
		<?php echo Yii::t('translation','Phone'); ?>
	</td><td>
		<?php echo $form->textField($model,'phone1'); ?>
	</td>

	<td>
		<?php echo Yii::t('translation','School'); ?>
	</td><td>
		<?php echo $form->hiddenField($model, 'university'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			'name'=>'university_autocomplete',
			'value'=>$model->university,
			'source'=>Yii::app()->schoolService->getSchools(),
			'options'=>array(
				'minLength'=>'1', // min chars to start search
				'select'=>'js:function(event, ui) { $("#Professor_university").val(ui.item.value); }'
			),
			'htmlOptions'=>array(
				'id'=>'university_autocomplete',
				'rel'=>'val',
				'size'=>'20',
			),
		));
		?>
		<?php if(isset($user)): ?>
		<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-professor-school-dialog',
			'options'=>array(
				'title'=>'Select Professor School',
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
		   'onclick'=>'$("#select-professor-school-dialog").dialog("open"); return false;', 
		));
		?>
		<?php endif; ?>
	</td>
	</tr>

	<tr>
	<td>
		<?php echo Yii::t('translation','Research'); ?>
	</td><td>
		<?php echo $form->hiddenField($model, 'research'); ?>
		<?php 
		$rfs=array();
		$rf_all=ResearchField::model()->findAll('research_field_name !=""');
		foreach($rf_all as $rf_model)
		{
			$rfs[]=($rf_model->research_field_name);
		}
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			'name'=>'research_autocomplete',
			'value'=>$model->research,
			'source'=>$rfs,
			'options'=>array(
				'minLength'=>'1', // min chars to start search
				'select'=>'js:function(event, ui) { $("#Professor_research").val(ui.item.value); }'
			),
			'htmlOptions'=>array(
				'id'=>'research_autocomplete',
				'rel'=>'val',
				'size'=>'20',
			),
		));
		?>
		
		<?php if(isset($user)): ?>
		<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-professor-research-dialog',
			'options'=>array(
				'title'=>'Select Professor Research',
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
		   'onclick'=>'$("#select-professor-research-dialog").dialog("open"); return false;', 
		   
		));
		?>
		<?php endif; ?>
	</td>
	</tr>
	
	<tr><td colspan="4"><hr /></td></tr>

	<tr>
	<td colspan="4">
	
		<?php echo CHtml::submitButton(Yii::t('translation', 'Search'), array('id'=>'btn-search', 'class'=>'black', 'style'=>'color:white;float:right;width:120px;')); ?>
	
	</td>
	</tr>
	
	</table>

<?php $this->endWidget(); ?>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript(
	'register-text-change-research-complete',
	'
		$("#research_autocomplete").change(function() 
		{ 
			$("#Professor_research").val($("#research_autocomplete").val());
		});
	',
	CClientScript::POS_READY
);

$cs->registerScript(
	'register-text-change-school-complete',
	'
		$("#university_autocomplete").change(function() 
		{ 
			$("#Professor_university").val($("#university_autocomplete").val());
		});
		$("#btn-search").corner();
	',
	CClientScript::POS_READY
);

?>

</div><!-- search-form -->