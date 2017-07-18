<div class="view">
	<?php $rfield=Article::model()->find('id=?', $data->article_id); ?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('article_id')); ?>:</b>
	<?php 
	$rfield_detail = CHtml::encode($rfield->title);
	echo CHtml::link($rfield_detail, array('professorArticle/view', 'id'=>$data->id, 'sid'=>$data->professor_id)); ?>
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
	
	<?php $s=Professor::model()->find('id=?', $data->professor_id); ?>
	<b><?php echo CHtml::encode('Currently Claimed Professor'); ?>:</b>
	<?php
		$s_detail=CHtml::encode($s->first_name.' '.$s->last_name.' ('.$s->username.')');
		echo CHtml::link($s_detail, array('professor/view', 'id'=>$data->professor_id)); 
	?>
	<br />



</div>