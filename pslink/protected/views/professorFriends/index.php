<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($professor->username)=>array('professor/view', 'id'=>$professor->id),
	'Friends',
);
$this->menu=array(
	array('label'=>'Create ProfessorFriends', 'url'=>array('create', 'sid'=>$professor->id)),
	array('label'=>'Manage ProfessorFriends', 'url'=>array('admin', 'sid'=>$professor->id)),
);
?>

<h1>Professor Friends</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
