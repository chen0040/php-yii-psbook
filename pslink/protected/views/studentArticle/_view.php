<div class="view">
	<?php $rfield=Article::model()->find('id=?', $data->article_id); ?>
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('article_id')); ?>:</b>
	<?php 
	$rfield_detail = CHtml::encode($rfield->title);
	echo CHtml::link($rfield_detail, array('studentArticle/view', 'id'=>$data->id, 'sid'=>$data->student_id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('journal')); ?>:</b>
	<?php 
	echo CHtml::encode($rfield->journal);
	 ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_year')); ?>:</b>
	<?php 
	echo CHtml::encode($rfield->publish_year);
	 ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php 
	echo CHtml::encode($rfield->author);
	 ?>
	<br />
	
	<?php $s=Student::model()->find('id=?', $data->student_id); ?>
	<b><?php echo CHtml::encode('Currently Claimed Student'); ?>:</b>
	<?php
		$s_detail=CHtml::encode($s->first_name.' '.$s->last_name.' ('.$s->username.')');
		echo CHtml::link($s_detail, array('student/view', 'id'=>$data->student_id)); 
	?>
	<br />

</div>