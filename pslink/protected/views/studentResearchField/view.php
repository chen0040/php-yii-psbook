<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($model->student->username)=>array('student/view', 'id'=>$model->student_id),
	'Student Research Fields'=>array('index', 'sid'=>$model->student_id),
	ResearchField::model()->find('id=?', $model->research_field_id)->research_field_name,
);

$this->menu=array(
	array('label'=>'List StudentResearchField', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Create StudentResearchField', 'url'=>array('create', 'sid'=>$model->student_id)),
	array('label'=>'Update StudentResearchField', 'url'=>array('update', 'id'=>$model->id, 'sid'=>$model->student_id)),
	array('label'=>'Delete StudentResearchField', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'sid'=>$model->student_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentResearchField', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>View StudentResearchField #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'research_field_id',
	),
)); ?>
