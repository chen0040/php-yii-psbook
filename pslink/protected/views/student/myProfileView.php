<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
	array('label'=>'Add Research Field', 'url'=>array('studentResearchField/create',
'sid'=>$model->id)),
	array('label'=>'List Research Fields', 'url'=>array('studentResearchField/index',
'sid'=>$model->id)),
	array('label'=>'Add Article', 'url'=>array('studentArticle/create',
'sid'=>$model->id)),
	array('label'=>'List Articles', 'url'=>array('studentArticle/index',
'sid'=>$model->id)),
	array('label'=>'Add Award', 'url'=>array('awards/create',
'sid'=>$model->id)),
	array('label'=>'List Awards', 'url'=>array('awards/index',
'sid'=>$model->id)),
	array('label'=>'Add Friend', 'url'=>array('studentFriends/create',
'sid'=>$model->id)),
	array('label'=>'List Friends', 'url'=>array('studentFriends/index',
'sid'=>$model->id)),
);
?>

<h1>Student <?php echo $model->first_name.' '.$model->last_name; ?> (<?php echo $model->username; ?>)</h1>

<?php
$imageUrl = $model->getImagePathIfFileExists();
$image = CHtml::image($imageUrl, $model->username, array('class' => 'photo_image', 'width'=>128, 'height'=>128));

echo CHtml::link($image, array('student/view', 'id'=>$model->id));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'first_name',
		'last_name',
		array(
			'name'=>'gender_id',
			'value'=>CHtml::encode($model->getGenderName())
		),
		'race',
		'nationality',
		'address_line1',
		'address_line2',
		'address_line3',
		'address_line4',
		'postal',
		array(
			'name'=>'country_id',
			'value'=>CHtml::encode($model->getCountryName())
		),
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
		array(
			'name'=>'study_level_id',
			'value'=>CHtml::encode($model->getStudyLevelName())
		),
		array(
			'name'=>'study_type_id',
			'value'=>CHtml::encode($model->getStudyTypeName())
		),
		array(
			'name'=>'education_level_id',
			'value'=>CHtml::encode($model->getEducationLevelName())
		),
		'highest_education_school',
		'proposed_research_topic',
		'create_time',
		'update_time',
	),
)); ?>

<br />
<h1>Research Fields</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$studentResearchFieldDataProvider, 
		'itemView'=>'/studentResearchField/_view',
	)
); 
?>

<br />
<h1>Research Articles</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$studentArticleDataProvider, 
		'itemView'=>'/studentArticle/_view',
	)
); 
?>

<br />
<h1>Past Experiences, Awards</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$studentAwardsDataProvider, 
		'itemView'=>'/awards/_view',
	)
); 
?>

<br />
<h1>Friends</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$studentFriendsDataProvider, 
		'itemView'=>'/studentFriends/_view',
	)
); 
?>

