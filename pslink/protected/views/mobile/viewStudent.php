<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<?php
$username='Guest';
$userId='Guest';
$loginType='NA';
$jqmUrl=Yii::app()->baseUrl.'/jqm';
$user=null;
if(isset(Yii::app()->user))
{
	$username=Yii::app()->user->id; 
	$userId=$username;
	if(Yii::app()->user->hasState('cLoginType'))
	{
		$loginType=Yii::app()->user->cLoginType;
	}
}
 
if(strcmp($loginType, 'Professor')==0)
{
	$user=Professor::model()->find('id=?', array(Yii::app()->user->cId));
}
else if(strcmp($loginType, 'Student')==0)
{
	$user=Student::model()->find('id=?', array(Yii::app()->user->cId));
}
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo Yii::app()->name; ?></title>
	
<link rel="stylesheet"  href="<?php echo $jqmUrl; ?>/css/themes/default/jquery.mobile.css" />
<link rel="stylesheet" href="<?php echo $jqmUrl; ?>/docs/_assets/css/jqm-docs.css" />
<script src="<?php echo $jqmUrl; ?>/js/jquery.tag.inserter.js"></script>
<script src="<?php echo $jqmUrl; ?>/js/jquery.js"></script>
<script src="<?php echo $jqmUrl; ?>/docs/_assets/js/jqm-docs.js"></script>
<script src="<?php echo $jqmUrl; ?>/js/"></script>
</head>
<body> 

<div data-role="page" id="public-students" data-theme="d">
	<div data-role="header" data-theme="a">
		<a data-rel="back" data-role="button" data-inline="true" data-icon="back">Back</a>
		<h1>Student: <?php echo $model->first_name.' '.$model->last_name; ?></h1>
		<?php if(!isset($user)): ?>
		<a href="index.php?r=mobile/login&url=viewStudent&id=<?php echo $model->id; ?>" data-role="button" data-rel="dialog" data-transition="pop">Login</a>
		<?php else: ?>
		<a href="index.php?r=mobile/logout" data-role="button" data-icon="delete">Logout</a>
		<?php endif; ?>
	</div>
	
	<div data-role="content">	
	
	
	<b>Student: <?php echo $model->first_name.' '.$model->last_name; ?></b>
	
	<div data-role="collapsible-set" data-theme="a">
	
	<div data-role="collapsible" data-collapsed="false">
	<h3>Contact: Detail</h3>

	

	<label for="txt-school" >School</label>		
	<input id="txt-school" name="txt-school" type="text" value="<?php echo $model->getSchoolName(); ?>"/>

	<label for="txt-email" >Email</label>		
	<input id="txt-email" name="txt-email" type="text" value="<?php echo $model->getEmail(); ?>"/>

	<label for="txt-phone" >Tel</label>		
	<input id="txt-phone" name="txt-phone" type="text" value="<?php echo $model->getContactFullNumber(); ?>"/>


	</div>

	<div data-role="collapsible">
	<h3>Contact: Image</h3>
	<p><img src="<?php echo $model->getImagePathIfFileExists(); ?>" width="250px" height="250px" align="middle"></p>
	</div>
	
	<div data-role="collapsible">
	<h3>Research Interest</h3>
	<p>
	<?php echo $model->getResearchInterest(); ?>
	</p>
	</div>
	
	<div data-role="collapsible">
	<h3>Research Experiences</h3>
	<p>
	<?php $articles=$model->getArticles(); ?>
	<?php $article_count=count($articles); ?>
	<?php if($article_count > 0): ?>
	<ol data-role="listview" data-theme="d">
	<?php foreach($articles as $article_key => $article): ?>
	<li><?php echo $article->toString(); ?><br />
	<?php echo $article->note; ?>
	</li>
	<?php endforeach; ?>
	</ol>
	</span></p>
	</td></tr>
	<?php endif; ?>
	</p>
	</div>
	
	</div>

	</div>
</div>

</body>
</html>