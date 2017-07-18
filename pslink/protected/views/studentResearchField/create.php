<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	$model->student->username=>array('student/view', 'id'=>$model->student_id),
	'Research Fields'=>array('studentResearchField/index', 'sid'=>$model->student_id),
	'Add Research Field',
);

$this->menu=array(
	array('label'=>'List StudentResearchField', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Manage StudentResearchField', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>Add Research Field</h1>

<h2><?php echo CHtml::link('Create a Research Field Reference', array('researchField/create')); ?></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>