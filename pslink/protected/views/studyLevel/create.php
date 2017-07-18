<?php
$this->breadcrumbs=array(
	'Study Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudyLevel', 'url'=>array('index')),
	array('label'=>'Manage StudyLevel', 'url'=>array('admin')),
);
?>

<h1>Create StudyLevel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>