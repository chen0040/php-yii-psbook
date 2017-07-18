<div class="view">	
	<?php $rfield=Professor::model()->find('id=?', $data->friend_id); ?>
	
	<?php if(isset($rfield)): ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('friend_id')); ?>:</b>
	<?php 
	$rfield_detail = CHtml::encode($rfield->username);
	echo CHtml::link($rfield_detail, array('professorFriends/view', 'id'=>$data->id, 'sid'=>$data->professor_id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($rfield->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($rfield->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($rfield->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('gender_id')); ?>:</b>
	<?php echo CHtml::encode($rfield->getGenderName()); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('race')); ?>:</b>
	<?php echo CHtml::encode($rfield->race); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($rfield->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('address_line1')); ?>:</b>
	<?php echo CHtml::encode($rfield->address_line1); ?>
	<br />
	
	<?php else: ?>
	
	<b>Friend with ID=<?php echo CHtml::link($data->id, array('professorFriends/view', 'id'=>$data->id, 'sid'=>$data->professor_id)); ?> is not found</b>

	<?php endif; ?>
</div>