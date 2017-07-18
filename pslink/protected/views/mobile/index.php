<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<?php
$jqmUrl=Yii::app()->baseUrl.'/jqm';

$username='Guest';
$userId='Guest';
$loginType='NA';
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

<!-- Start of first page: #one -->
<div data-role="page" id="home" data-theme="d">

<div data-role="header" data-theme="a">
	<h1><?php echo Yii::app()->name; ?></h1>
	<?php if(!isset($user)): ?>
	<a href="index.php?r=mobile/login&url=index" data-role="button" data-rel="dialog" data-transition="pop">Login</a>
	<?php else: ?>
	<a href="index.php?r=mobile/logout" data-role="button" data-icon="delete">Logout</a>
	<?php endif; ?>
</div><!-- /header -->

<div data-role="content" style="color:#3366ff">

<?php if(isset($user)): ?>
<h2>Welcome! <?php echo $user->first_name.' '.$user->last_name; ?></h2>
<?php else: ?>
<h2>The Book of Professors & Students All Over the World!</h2>
<p>What are you looking for?</p>
<?php endif; ?>

<p><a href="index.php?r=mobile/lookingForStudent" data-role="button">Students</a></p>	
<p><a href="index.php?r=mobile/lookingForProfessor" data-role="button">Professors</a></p>

<?php if(!isset($user)): ?>
<p><a href="#signup" data-role="button" data-rel="dialog" data-transition="pop">Sign up</a></p>
<?php else: ?>
<?php if($user->isStudent()): ?>
<p><a href="index.php?r=mobile/viewStudent&id=<?php echo $user->id; ?>" data-role="button">View Profile</a></p>
<?php else: ?>
<p><a href="index.php?r=mobile/viewProfessor&id=<?php echo $user->id; ?>" data-role="button">View Profile</a></p>
<?php endif; ?>
<?php endif; ?>

</div>



</div><!-- /page one -->

<!-- Start of third page: #popup -->
<div data-role="page" id="signup">
	<div data-role="header" data-theme="e">
		<h1>Sign up</h1>
	</div><!-- /header -->
	
	<div data-role="content">
		<h1>Under construction</h1>
	</div>
</div>

</body>
</html>