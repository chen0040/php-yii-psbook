<?php
$this->breadcrumbs=array(
	'Study Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudyType', 'url'=>array('index')),
	array('label'=>'Create StudyType', 'url'=>array('create')),
	array('label'=>'View StudyType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudyType', 'url'=>array('admin')),
);
?>

<h1>Update StudyType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>