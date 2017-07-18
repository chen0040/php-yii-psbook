<?php
$this->breadcrumbs=array(
	'Study Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudyLevel', 'url'=>array('index')),
	array('label'=>'Create StudyLevel', 'url'=>array('create')),
	array('label'=>'Update StudyLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudyLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudyLevel', 'url'=>array('admin')),
);
?>

<h1>View StudyLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'study_level_name',
	),
)); ?>
