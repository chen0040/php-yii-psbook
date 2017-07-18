<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('research_field_id')); ?>:</b>
	<?php 
	$rfield=ResearchField::model()->find('id=?', $data->research_field_id);
	$rfield_detail = CHtml::encode($rfield->research_field_category) . ' [' . CHtml::encode($rfield->research_field_name).']';
	echo CHtml::link($rfield_detail, array('studentResearchField/view', 'id'=>$data->id, 'sid'=>$data->student_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php
	$s=Student::model()->find('id=?', $data->student_id);
	echo CHtml::link(CHtml::encode($s->first_name.' '.$s->last_name.'('.$s->username.')'), array('student/view', 'id'=>$s->id)); ?>
	<br />
	
	
	


</div>