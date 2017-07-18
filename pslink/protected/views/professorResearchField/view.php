<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($model->professor->username)=>array('professor/view', 'id'=>$model->professor_id),
	'Professor Research Fields'=>array('index', 'sid'=>$model->professor_id),
	ResearchField::model()->find('id=?', $model->research_field_id)->research_field_name,
);

$this->menu=array(
	array('label'=>'List ProfessorResearchField', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Create ProfessorResearchField', 'url'=>array('create', 'sid'=>$model->professor_id)),
	array('label'=>'Update ProfessorResearchField', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProfessorResearchField', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'sid'=>$model->professor_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProfessorResearchField', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<?php 
$p = Professor::model()->find('id=?', $model->professor_id);
$rf = ResearchField::model()->find('id=?', $model->research_field_id);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'professor_id',
			'value'=>(CHtml::encode($p->first_name.' '.$p->last_name.' ('.$p->username.')')),
		),
		array(
			'name'=>'research_field',
			'value'=>(CHtml::encode($rf->research_field_name)),
		),
		array(
			'name'=>'research_category',
			'value'=>(CHtml::encode($rf->research_field_category)),
		),
	),
)); ?>
