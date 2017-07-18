<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	$model->professor->username=>array('professor/view', 'id'=>$model->professor_id),
	'Articles'=>array('professorArticle/index', 'sid'=>$model->professor_id),
	'Add Article',
);

$this->menu=array(
	array('label'=>'List ProfessorArticle', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Manage ProfessorArticle', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Create ProfessorArticle</h1>

<h2><?php echo CHtml::link('Create a Article Reference', array('article/create')); ?></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>