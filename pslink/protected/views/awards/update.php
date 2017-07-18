<?php
$this->breadcrumbs=array(
	'Awards'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Awards', 'url'=>array('index')),
	array('label'=>'Create Awards', 'url'=>array('create')),
	array('label'=>'View Awards', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Awards', 'url'=>array('admin')),
);
?>

<h1>Update Awards <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>