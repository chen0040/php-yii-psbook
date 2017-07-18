<?php
$this->breadcrumbs=array(
	'Students'=>array('student/index'),
	CHtml::encode($student->username)=>array('student/view', 'id'=>$student->id),
	'Student Research Fields'=>array('index', 'sid'=>$student->id),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StudentResearchField', 'url'=>array('index', 'sid'=>$student->id)),
	array('label'=>'Create StudentResearchField', 'url'=>array('create', 'sid'=>$student->id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-research-field-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Research Fields</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-research-field-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'student_id',
		'research_field_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
