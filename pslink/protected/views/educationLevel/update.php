<?php
$this->breadcrumbs=array(
	'Education Levels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EducationLevel', 'url'=>array('index')),
	array('label'=>'Create EducationLevel', 'url'=>array('create')),
	array('label'=>'View EducationLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EducationLevel', 'url'=>array('admin')),
);
?>

<h1>Update EducationLevel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>