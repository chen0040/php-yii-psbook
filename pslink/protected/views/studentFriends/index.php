<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($student->username)=>array('student/view', 'id'=>$student->id),
	'Friends',
);

$this->menu=array(
	array('label'=>'Create StudentFriends', 'url'=>array('create', 'sid'=>$student->id)),
	array('label'=>'Manage StudentFriends', 'url'=>array('admin', 'sid'=>$student->id)),
);
?>

<h1>Student Friends</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
