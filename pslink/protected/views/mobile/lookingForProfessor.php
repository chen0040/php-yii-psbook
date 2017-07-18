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
		<h1>Professors</h1>
		<?php if(!isset($user)): ?>
		<a href="index.php?r=mobile/login&url=lookingForProfessor" data-role="button" data-rel="dialog" data-transition="pop">Login</a>
		<?php else: ?>
		<a href="index.php?r=mobile/logout" data-role="button" data-icon="delete">Logout</a>
		<?php endif; ?>
	</div><!-- /header -->
	
	<div data-role="content">	
	<ul data-role="listview" data-theme="d">
		<?php
		$student_group=Professor::model()->findAll('looking_for !=""');
		?>
		<?php foreach($student_group as $student): ?>
		<li>
		<a href="index.php?r=mobile/viewProfessor&id=<?php echo $student->id; ?>">
		<img src="<?php echo $student->getThumbnailImagePathIfFileExists(); ?>" width="80px" height="80px" align="middle">
		<p><b><?php echo $student->first_name.' '.$student->last_name; ?></b><p>
		<p>Research Interests: <?php echo $student->getResearchInterest(); ?></p>
		<p>School: <?php echo $student->getSchoolName(); ?></p>
		<p><?php echo $student->getAds(); ?></p>
		</a>
		</li>
		<?php endforeach; ?>
	</ul>
	</div>
</div>

</body>
</html>