<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<table>
	
	<tr>
	<td colspan="2">
		<div>
		<?php
			echo CHtml::link(Yii::t('translation', 'Professor'), 
				array('search', 'mtype'=>Messages::RECTYPE_PROFESSOR), 
				array(
					'class'=>$model->mtype()==Messages::RECTYPE_PROFESSOR ? 'orange' : 'black',
					'style'=>'width:120px;float:right;',
					'id'=>'btn-link-search-keywords-by-professors',
				)
			); 
			
			echo CHtml::link(Yii::t('translation', 'Student'), 
				array('search', 'mtype'=>Messages::RECTYPE_STUDENT), 
				array(
					'class'=>$model->mtype()==Messages::RECTYPE_STUDENT ? 'orange' : 'black',
					'style'=>'width:120px;float:right;',
					'id'=>'btn-link-search-keywords-by-students',
				)
			); 
			
		?>
		</div>
	</td>
	<td>
	</td>
	</tr>
	
	<tr><td colspan="2"><hr /></td></tr>
	
	<tr>
	<td>
	<?php echo Yii::t('translation', 'You can'); ?>
	<ul>
	<li><?php echo Yii::t('translation', 'Search '.$model->tag_lcase().'s by keywords').', '.Yii::t('translation', 'for example').', '.Yii::t('translation', 'School'); ?></li>
	<li><?php echo Yii::t('translation', 'Search '.$model->tag_lcase().'s by keywords').', '.Yii::t('translation', 'for example').', '.Yii::t('translation', 'Last Name'); ?></li>
	<li><?php echo Yii::t('translation', 'Search '.$model->tag_lcase().'s by keywords').', '.Yii::t('translation', 'for example').', '.Yii::t('translation', 'First Name'); ?></li>
	<li><?php echo Yii::t('translation', 'Search '.$model->tag_lcase().'s by keywords').', '.Yii::t('translation', 'for example').', '.Yii::t('translation', 'Email'); ?></li>
	<li><?php echo Yii::t('translation', 'Search '.$model->tag_lcase().'s by keywords').', '.Yii::t('translation', 'for example').', '.Yii::t('translation', 'Research'); ?></li>
	</ul>
	</td>
	</tr>
	

	
	<tr>
	<td>
		<?php echo Yii::t('translation', 'Keywords').': '; ?>
		<?php echo $form->textField($model,'address_line1', array('size'=>64,'maxlength'=>128)); ?>
	</td>
	<td>
	<?php echo CHtml::submitButton(Yii::t('translation', 'Search'), array('class'=>'black', 'style'=>'color:white;float:right;width:120px;cursor:pointer;', 'id'=>'btn-search')); ?>
	</td>
	</tr>
	
	<tr><td colspan="2"><hr /></td></tr>

	</table>
<?php $this->endWidget(); ?>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript(
	'style-search-keywords',
	'
		$("#btn-search").corner();
		$("#btn-link-search-keywords-by-students").corner("left");
		$("#btn-link-search-keywords-by-professors").corner("right");
	',
	CClientScript::POS_READY
);

?>

</div><!-- search-form -->