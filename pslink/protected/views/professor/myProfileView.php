<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List Professor', 'url'=>array('index')),
	array('label'=>'Create Professor', 'url'=>array('create')),
	array('label'=>'Update Professor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Professor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Professor', 'url'=>array('admin')),
	array('label'=>'Add Research Field', 'url'=>array('professorResearchField/create',
'sid'=>$model->id)),
	array('label'=>'List Research Fields', 'url'=>array('professorResearchField/index',
'sid'=>$model->id)),
	array('label'=>'Add Article', 'url'=>array('professorArticle/create',
'sid'=>$model->id)),
	array('label'=>'List Articles', 'url'=>array('professorArticle/index',
'sid'=>$model->id)),
	array('label'=>'Add Friend', 'url'=>array('professorFriends/create',
'sid'=>$model->id)),
	array('label'=>'List Friends', 'url'=>array('professorFriends/index',
'sid'=>$model->id)),
);
?>

<h1>Professor <?php echo $model->first_name.' '.$model->last_name; ?> (<?php echo $model->username; ?>)</h1>

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
		'create_time',
		'update_time',
		'last_login_time',
		'university',
		array(
			'name'=>'school',
			'value'=>CHtml::encode($model->getSchoolName()),
		),
		array(
			'name'=>'division',
			'value'=>CHtml::encode($model->getDivisionName()),
		),
		'research',
	),
)); ?>

<br />
<h1>Research Fields</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$professorResearchFieldDataProvider, 
		'itemView'=>'/professorResearchField/_view',
	)
); 
?>

<br />
<h1>Research Articles</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$professorArticleDataProvider, 
		'itemView'=>'/professorArticle/_view',
	)
); 
?>
<br />
<h1>Friends</h1>
<?php 
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$professorFriendsDataProvider, 
		'itemView'=>'/professorFriends/_view',
	)
); 
?>
