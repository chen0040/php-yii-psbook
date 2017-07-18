<?php
$this->breadcrumbs=array(
	'Student Friends'=>array('index'),
	$model->student_id=>array('view','id'=>$model->student_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentFriends', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Create StudentFriends', 'url'=>array('create', 'sid'=>$model->student_id)),
	array('label'=>'View StudentFriends', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentFriends', 'url'=>array('admin', 'sid'->$model->student_id)),
);
?>

<h1>Update StudentFriends <?php echo $model->student_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>