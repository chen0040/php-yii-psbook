<?php
$this->breadcrumbs=array(
	'Professors'=>array('professor/index'),
	CHtml::encode($model->professor->username)=>array('professor/view', 'id'=>$model->professor_id),
	'Professor Articles'=>array('index', 'sid'=>$model->professor_id),
	Article::model()->find('id=?', $model->article_id)->title,
);

$this->menu=array(
	array('label'=>'List ProfessorArticle', 'url'=>array('index', 'sid'=>$model->professor_id)),
	array('label'=>'Create ProfessorArticle', 'url'=>array('create', 'sid'=>$model->professor_id)),
	array('label'=>'Update ProfessorArticle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProfessorArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'sid'=>$model->professor_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProfessorArticle', 'url'=>array('admin', 'sid'=>$model->professor_id)),
);
?>

<h1>Professor Article Relations</h1>

<?php 
$p=Professor::model()->find('id=?', $model->professor_id);
$a=Article::model()->find('id=?', $model->article_id);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'professor_id',
			'value'=>CHtml::encode($p->first_name.' '.$p->last_name.' ('.$p->username.')'),
		),
		array(
			'name'=>'article_id',
			'value'=>CHtml::encode($a->title),
		),
	),
)); ?>
