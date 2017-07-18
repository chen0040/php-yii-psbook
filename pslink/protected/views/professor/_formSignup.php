<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'professor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('translation', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('translation', 'are required'); ?>.</p>
	<table>
	<tr>
		<td>
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'first_name'); ?>
		</td>
		<td>
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'last_name'); ?>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
		</td>
		<td>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo $form->labelEx($model,'email1'); ?>
		<?php echo $form->textField($model,'email1',array('size'=>20,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email1'); ?>
		</td>
	</tr>
	<tr>
		<td>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('style'=>'background:transparent url("'.Yii::app()->theme->baseUrl.'/images/blank-blue-button.png") no-repeat center top;width:185px;height:40px;border-style: none;display: block;cursor:pointer;cursor: cursor;color:white;')); ?>
		</td>
	</tr>
	</table>
	
	<br />
	<?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->