<?php $p=Professor::model()->find('id=?', $model->friend_id) ?>
<?php if(isset($p)): ?>

<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($p->username)=>array('professor/view', 'id'=>$model->professor_id),
	'Professor Friends'=>array('index', 'sid'=>$model->professor_id),
	$p->username,
);

$this->menu=array(
	array('label'=>'List ProfessorFriends', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Create ProfessorFriends', 'url'=>array('create', 'sid'=>$model->professor_id)),
	array('label'=>'Update ProfessorFriends', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProfessorFriends', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'sid'=>$model->professor_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProfessorFriends', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>View ProfessorFriends #<?php echo $model->id; ?></h1>

<?php 
$rfriend=Professor::model()->find('id=?', $model->professor_id);
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

<?php else: ?>
	
<b>Friend with ID=<?php echo $model->friend_id; ?> is not found</b>

<?php endif; ?>
