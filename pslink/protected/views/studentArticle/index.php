<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($student->username)=>array('student/view', 'id'=>$student->id),
	'Articles',
);

$this->menu=array(
	array('label'=>'Create StudentArticle', 'url'=>array('create', 'sid'=>$student->id)),
	array('label'=>'Manage StudentArticle', 'url'=>array('admin', 'sid'=>$student->id)),
);
?>

<h1>Student Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
