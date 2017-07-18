<?php
$this->breadcrumbs=array(
	'Education Levels',
);

$this->menu=array(
	array('label'=>'Create EducationLevel', 'url'=>array('create')),
	array('label'=>'Manage EducationLevel', 'url'=>array('admin')),
);
?>

<h1>Education Levels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
