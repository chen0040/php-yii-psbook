<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	$model->student->username=>array('student/view', 'id'=>$model->student_id),
	'Awards'=>array('awards/index', 'sid'=>$model->student_id),
	'Add Award',
);


$this->menu=array(
	array('label'=>'List Awards', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Manage Awards', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>Add Past Experiences, Awards</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>