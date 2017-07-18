<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($model->student->username)=>array('student/view', 'id'=>$model->student_id),
	'Student Articles'=>array('index', 'sid'=>$model->student_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentArticle', 'url'=>array('index')),
	array('label'=>'Create StudentArticle', 'url'=>array('create')),
	array('label'=>'View StudentArticle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudentArticle', 'url'=>array('admin')),
);
?>

<h1>Update StudentArticle <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>