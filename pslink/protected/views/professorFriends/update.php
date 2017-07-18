<?php
$this->breadcrumbs=array(
	'Professor Friends'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProfessorFriends', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Create ProfessorFriends', 'url'=>array('create', 'sid'=>$model->professor_id)),
	array('label'=>'View ProfessorFriends', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProfessorFriends', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Update ProfessorFriends <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>