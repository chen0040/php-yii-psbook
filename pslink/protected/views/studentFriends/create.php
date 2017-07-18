<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	$model->student->username=>array('student/view', 'id'=>$model->student_id),
	'Friends'=>array('studentFriends/index', 'sid'=>$model->student_id),
	'Add Friend',
);

$this->menu=array(
	array('label'=>'List StudentFriends', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Manage StudentFriends', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>Add Friend</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>