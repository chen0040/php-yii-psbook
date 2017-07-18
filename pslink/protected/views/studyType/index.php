<?php
$this->breadcrumbs=array(
	'Study Types',
);

$this->menu=array(
	array('label'=>'Create StudyType', 'url'=>array('create')),
	array('label'=>'Manage StudyType', 'url'=>array('admin')),
);
?>

<h1>Study Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
