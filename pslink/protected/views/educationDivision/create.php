<?php
$this->breadcrumbs=array(
	'Education Divisions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EducationDivision', 'url'=>array('index')),
	array('label'=>'Manage EducationDivision', 'url'=>array('admin')),
);
?>

<h1>Create EducationDivision</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>