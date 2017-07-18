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
		<a href="index.php?r=mobile/index" data-role="button" data-inline="true" data-icon="home">Home</a>
		<h1>Students</h1>
		<?php if(!isset($user)): ?>
		<a href="index.php?r=mobile/login&url=<?php echo $url; ?>" data-role="button" data-rel="dialog" data-transition="pop">Login</a>
		<?php else: ?>
		<a href="index.php?r=mobile/logout" data-role="button" data-icon="delete">Logout</a>
		<?php endif; ?>
	</div><!-- /header -->
	
	<div data-role="content">	
	<h1>Invalid Login!</h1>
	</div>
</div>

</body>
</html>