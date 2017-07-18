<?php
$this->breadcrumbs=array(
	'Education Divisions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EducationDivision', 'url'=>array('index')),
	array('label'=>'Create EducationDivision', 'url'=>array('create')),
	array('label'=>'View EducationDivision', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EducationDivision', 'url'=>array('admin')),
);
?>

<h1>Update EducationDivision <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>