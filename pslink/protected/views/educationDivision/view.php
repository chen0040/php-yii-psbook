<?php
$this->breadcrumbs=array(
	'Education Divisions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EducationDivision', 'url'=>array('index')),
	array('label'=>'Create EducationDivision', 'url'=>array('create')),
	array('label'=>'Update EducationDivision', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EducationDivision', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EducationDivision', 'url'=>array('admin')),
);
?>

<h1>View EducationDivision #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'division_name',
		'note',
	),
)); ?>
