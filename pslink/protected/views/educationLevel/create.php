<?php
$this->breadcrumbs=array(
	'Education Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EducationLevel', 'url'=>array('index')),
	array('label'=>'Manage EducationLevel', 'url'=>array('admin')),
);
?>

<h1>Create EducationLevel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>