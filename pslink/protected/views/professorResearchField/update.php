<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($model->professor->username)=>array('professor/view', 'id'=>$model->professor_id),
	'Professor Research Fields'=>array('index', 'sid'=>$model->professor_id),
	'Update ' . ResearchField::model()->find('id=?', $model->research_field_id)->research_field_name,
);

$this->menu=array(
	array('label'=>'List ProfessorResearchField', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Create ProfessorResearchField', 'url'=>array('create', 'sid'=>$model->professor_id)),
	array('label'=>'View ProfessorResearchField', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProfessorResearchField', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Update ProfessorResearchField <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>