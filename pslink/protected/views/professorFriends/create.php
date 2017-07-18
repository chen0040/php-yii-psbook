<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	$model->professor->username=>array('student/view', 'id'=>$model->professor_id),
	'Friends'=>array('professorFriends/index', 'sid'=>$model->professor_id),
	'Add Friend',
);


$this->menu=array(
	array('label'=>'List ProfessorFriends', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Manage ProfessorFriends', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Create ProfessorFriends</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>