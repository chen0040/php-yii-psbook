<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	$model->student->username=>array('student/view', 'id'=>$model->student_id),
	'Articles'=>array('studentArticle/index', 'sid'=>$model->student_id),
	'Add Article',
);

$this->menu=array(
	array('label'=>'List StudentArticle', 'url'=>array('index', 'sid'=>$model->student_id)),
	array('label'=>'Manage StudentArticle', 'url'=>array('admin', 'sid'=>$model->student_id)),
);
?>

<h1>Add Article</h1>

<h2><?php echo CHtml::link('Create a Article Reference', array('article/create')); ?></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>