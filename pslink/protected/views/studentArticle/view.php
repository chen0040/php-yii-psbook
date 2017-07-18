<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($model->student->username)=>array('student/view', 'id'=>$model->student_id),
	'Student Articles'=>array('index', 'sid'=>$model->student_id),
	Article::model()->find('id=?', $model->article_id)->title,
);

$this->menu=array(
	array('label'=>'List StudentArticle', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Create StudentArticle', 'url'=>array('create', 'sid'=>$model->student_id)),
	array('label'=>'Update StudentArticle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudentArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'sid'=>$model->student_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentArticle', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>View StudentArticle <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'student_id',
		'article_id',
	),
)); ?>
