<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($student->username)=>array('student/view', 'id'=>$student->id),
	'Awards',
);


$this->menu=array(
	array('label'=>'Create Awards', 'url'=>array('create', 'sid'=>$student->id)),
	array('label'=>'Manage Awards', 'url'=>array('admin', 'sid'=>$student->id)),
);
?>

<h1>Awards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
