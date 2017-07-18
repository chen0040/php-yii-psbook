<?php
$this->breadcrumbs=array(
	'Study Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudyType', 'url'=>array('index')),
	array('label'=>'Manage StudyType', 'url'=>array('admin')),
);
?>

<h1>Create StudyType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>