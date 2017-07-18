<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Students</h1>

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
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'first_name',
		'last_name',
		'gender_id',
		'race',
		'nationality',
		/*
		'address_line1',
		'address_line2',
		'address_line3',
		'address_line4',
		'postal',
		'country_id',
		'province',
		'email1',
		'email2',
		'country_code1',
		'country_code2',
		'area_code1',
		'area_code2',
		'phone1',
		'phone2',
		'gre_score',
		'tofle_score',
		'gpa_score',
		'study_avail_time',
		'study_level_id',
		'study_type_id',
		'education_level_id',
		'highest_education_school',
		'proposed_research_topic',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
