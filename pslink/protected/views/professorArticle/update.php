<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($model->professor->username)=>array('professor/view', 'id'=>$model->professor_id),
	'Professor Articles'=>array('index', 'sid'=>$model->professor_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProfessorArticle', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Create ProfessorArticle', 'url'=>array('create', 'sid'=>$model->professor_id)),
	array('label'=>'View ProfessorArticle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProfessorArticle', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Update ProfessorArticle <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>