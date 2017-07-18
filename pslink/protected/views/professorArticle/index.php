<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($professor->username)=>array('professor/view', 'id'=>$professor->id),
	'Articles',
);

$this->menu=array(
	array('label'=>'Create ProfessorArticle', 'url'=>array('create', 'sid'=>$professor->id)),
	array('label'=>'Manage ProfessorArticle', 'url'=>array('admin', 'sid'=>$professor->id)),
);
?>

<h1>Professor Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
