<?php
$this->breadcrumbs=array(
	'Education Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EducationLevel', 'url'=>array('index')),
	array('label'=>'Create EducationLevel', 'url'=>array('create')),
	array('label'=>'Update EducationLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EducationLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EducationLevel', 'url'=>array('admin')),
);
?>

<h1>View EducationLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'education_level_name',
	),
)); ?>
