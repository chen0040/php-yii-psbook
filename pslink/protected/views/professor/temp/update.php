<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Professor', 'url'=>array('index')),
	array('label'=>'Create Professor', 'url'=>array('create')),
	array('label'=>'View Professor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Professor', 'url'=>array('admin')),
);
?>

<h1>Update Professor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>