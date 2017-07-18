<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('research_field_id')); ?>:</b>
	<?php 
	$rfield=ResearchField::model()->find('id=?', $data->research_field_id);
	$rfield_detail = CHtml::encode($rfield->research_field_category) . ' [' . CHtml::encode($rfield->research_field_name).']';
	echo CHtml::link($rfield_detail, array('professorResearchField/view', 'id'=>$data->id, 'sid'=>$data->professor_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('professor_id')); ?>:</b>
	<?php
	$s=Professor::model()->find('id=?', $data->professor_id);
	echo CHtml::link(CHtml::encode($s->first_name.' '.$s->last_name.'('.$s->username.')'), array('professor/view', 'id'=>$s->id)); ?>
	<br />

</div>