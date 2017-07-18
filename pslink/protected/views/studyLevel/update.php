<?php
$this->breadcrumbs=array(
	'Study Levels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudyLevel', 'url'=>array('index')),
	array('label'=>'Create StudyLevel', 'url'=>array('create')),
	array('label'=>'View StudyLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudyLevel', 'url'=>array('admin')),
);
?>

<h1>Update StudyLevel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>