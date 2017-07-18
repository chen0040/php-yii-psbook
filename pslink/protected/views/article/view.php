<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Article', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Update Article', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Article', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);
?>

<h1>Article: <?php echo $model->title; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'journal',
		'pages',
		'publish_year',
		'note',
		'author',
	),
)); ?>

<br />
<h1>Professors</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$professorArticleDataProvider, 
		'itemView'=>'/professorArticle/_view',
	)
); 
?>

<br />
<h1>Students</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$studentArticleDataProvider, 
		'itemView'=>'/studentArticle/_view',
	)
); 
?>
