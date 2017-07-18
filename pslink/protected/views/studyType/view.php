<?php
$this->breadcrumbs=array(
	'Study Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudyType', 'url'=>array('index')),
	array('label'=>'Create StudyType', 'url'=>array('create')),
	array('label'=>'Update StudyType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudyType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudyType', 'url'=>array('admin')),
);
?>

<h1>View StudyType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'study_type_name',
	),
)); ?>
