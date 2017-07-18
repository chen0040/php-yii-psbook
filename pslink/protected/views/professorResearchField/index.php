<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($professor->username)=>array('professor/view', 'id'=>$professor->id),
	'Research Fields',
);


$this->menu=array(
	array('label'=>'Create ProfessorResearchField', 'url'=>array('create')),
	array('label'=>'Manage ProfessorResearchField', 'url'=>array('admin')),
);
?>

<h1>Professor Research Fields</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
