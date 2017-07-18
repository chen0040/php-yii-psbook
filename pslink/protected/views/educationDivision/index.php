<?php
$this->breadcrumbs=array(
	'Education Divisions',
);

$this->menu=array(
	array('label'=>'Create EducationDivision', 'url'=>array('create')),
	array('label'=>'Manage EducationDivision', 'url'=>array('admin')),
);
?>

<h1>Education Divisions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
