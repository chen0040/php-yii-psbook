<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($model->student->username)=>array('student/view', 'id'=>$model->student_id),
	'Past Experiences, Awards'=>array('index', 'sid'=>$model->student_id),
	$model->award_name,
);

$this->menu=array(
	array('label'=>'List Awards', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Create Awards', 'url'=>array('create', 'sid'=>$model->student_id)),
	array('label'=>'Update Awards', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Awards', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'sid'=>$model->student_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Awards', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>Past Experiences, Awards Details: <?php echo $model->award_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'award_name',
		'note'
	),
)); ?>
