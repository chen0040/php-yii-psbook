<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	$model->professor->username=>array('professor/view', 'id'=>$model->professor_id),
	'Research Fields'=>array('professorResearchField/index', 'sid'=>$model->professor_id),
	'Add Research Field',
);

$this->menu=array(
	array('label'=>'List ProfessorResearchField', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Manage ProfessorResearchField', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Create ProfessorResearchField</h1>

<h2><?php echo CHtml::link('Create a Research Field Reference', array('researchField/create')); ?></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>