<div class="view">

	<?php $s=Professor::model()->find('id=?', $data->professor_id); ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('professor_id')); ?>:</b>
	<?php
	if(isset($s))
	{
	echo CHtml::link(CHtml::encode($s->first_name.' '.$s->last_name.' ('.$s->username.')'), array('professor/view', 'id'=>$s->id)); 
	}?>
	<br />
	
	<b><?php echo CHtml::encode('Research Interest:'); ?></b>
	<?php
	echo CHtml::encode($s->research);
	?>
	<br />
	
	<b><?php echo CHtml::encode('Country:'); ?></b>
	<?php
	echo CHtml::encode($s->getCountryName());
	?>
	<br />
	
	<b><?php echo CHtml::encode('Institute:'); ?></b>
	<?php
	echo CHtml::encode($s->university.' ('.$s->getSchoolName().')');
	?>
	<br />
	
	<b><?php echo CHtml::encode('Faculty:'); ?></b>
	<?php
	echo CHtml::encode($s->getDivisionName());
	?>
	<br />
	
	<b><?php echo CHtml::encode('Gender:'); ?></b>
	<?php
	echo CHtml::encode($s->getGenderName());
	?>
	<br />

</div>