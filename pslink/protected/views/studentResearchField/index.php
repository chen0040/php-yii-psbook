<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($student->username)=>array('student/view', 'id'=>$student->id),
	'Research Fields',
);


$this->menu=array(
	array('label'=>'Create StudentResearchField', 'url'=>array('create', 'sid'=>$student->id)),
	array('label'=>'Manage StudentResearchField', 'url'=>array('admin', 'sid'=>$student->id)),
);
?>

<h1>Student Research Fields</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
