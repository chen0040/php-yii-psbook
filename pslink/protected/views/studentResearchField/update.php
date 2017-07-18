<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($model->student->username)=>array('student/view', 'id'=>$model->student_id),
	'Student Research Fields'=>array('index', 'sid'=>$model->student_id),
	'Update ' . ResearchField::model()->find('id=?', $model->research_field_id)->research_field_name,
);

$this->menu=array(
	array('label'=>'List StudentResearchField', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Create StudentResearchField', 'url'=>array('create', 'sid'=>$model->student_id)),
	array('label'=>'View StudentResearchField', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentResearchField', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>Update StudentResearchField <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>