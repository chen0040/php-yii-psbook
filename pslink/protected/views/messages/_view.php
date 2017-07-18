<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_id')); ?>:</b>
	<?php echo CHtml::encode($data->from_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_type')); ?>:</b>
	<?php echo CHtml::encode($data->from_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_id')); ?>:</b>
	<?php echo CHtml::encode($data->to_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_type')); ?>:</b>
	<?php echo CHtml::encode($data->to_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text_message')); ?>:</b>
	<?php echo CHtml::encode($data->text_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text_date')); ?>:</b>
	<?php echo CHtml::encode($data->text_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field1')); ?>:</b>
	<?php echo CHtml::encode($data->field1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field2')); ?>:</b>
	<?php echo CHtml::encode($data->field2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text_type')); ?>:</b>
	<?php echo CHtml::encode($data->text_type); ?>
	<br />

	*/ ?>

</div>