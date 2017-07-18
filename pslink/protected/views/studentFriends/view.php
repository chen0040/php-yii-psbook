<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($model->student->username)=>array('student/view', 'id'=>$model->student_id),
	'Student Friends'=>array('index', 'sid'=>$model->student_id),
	Student::model()->find('id=?', $model->friend_id)->username,
);
$this->menu=array(
	array('label'=>'List StudentFriends', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Create StudentFriends', 'url'=>array('create', 'sid'=>$model->student_id)),
	array('label'=>'Update StudentFriends', 'url'=>array('update', 'id'=>$model->student_id)),
	array('label'=>'Delete StudentFriends', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_id, 'sid'=>$model->student_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentFriends', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>View Friends <?php echo $model->student->username; ?></h1>

<?php 
$rfriend=Student::model()->find('id=?', $model->student_id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'name'=>'friend_id',
		'value'=>$rfriend->username,
		),
		array(
		'name'=>'first_name',
		'value'=>$rfriend->first_name,
		),
		array(
		'name'=>'last_name',
		'value'=>$rfriend->last_name,
		),
		array(
		'name'=>'email1',
		'value'=>$rfriend->email1,
		),
	),
)); ?>
