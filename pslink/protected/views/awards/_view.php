<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('award_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->award_name), array('awards/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

</div>