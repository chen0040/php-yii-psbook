<?php
$this->breadcrumbs=array(
	'Study Levels',
);

$this->menu=array(
	array('label'=>'Create StudyLevel', 'url'=>array('create')),
	array('label'=>'Manage StudyLevel', 'url'=>array('admin')),
);
?>

<h1>Study Levels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
