<div class="view">

	<?php $s=Student::model()->find('id=?', $data->student_id); ?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php
	echo CHtml::link(CHtml::encode($s->first_name.' '.$s->last_name.' ('.$s->username.')'), array('student/view', 'id'=>$s->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode('Like to pursuit:'); ?></b>
	<?php
	echo CHtml::encode($s->getStudyLevelName().' ('.$s->getStudyTypeName().')');
	?>
	<br />
	
	<b><?php echo CHtml::encode('Research Interest:'); ?></b>
	<?php
	echo CHtml::encode($s->proposed_research_topic);
	?>
	<br />
	
	<b><?php echo CHtml::encode('Country:'); ?></b>
	<?php
	echo CHtml::encode($s->getCountryName());
	?>
	<br />
	
	<b><?php echo CHtml::encode('Education:'); ?></b>
	<?php
	echo CHtml::encode($s->highest_education_school.' ('.$s->getEducationLevelName().')');
	?>
	<br />
	
	<b><?php echo CHtml::encode('Gender:'); ?></b>
	<?php
	echo CHtml::encode($s->getGenderName());
	?>
	<br />


</div>