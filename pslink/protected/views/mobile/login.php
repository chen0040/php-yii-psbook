<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<?php
$jqmUrl=Yii::app()->baseUrl.'/jqm';
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

<!-- Start of third page: #popup -->
<div data-role="page" id="login-dialog">
	<div data-role="header" data-theme="e">
		<h1>Login</h1>
	</div><!-- /header -->
	
	<div data-role="content" data-theme="a">	
	<form id="login-form" method="post" action="index.php?r=mobile/submitLogin" data-ajax="false">
		<table width="100%">
		<tr>
		<td colspan="2">
		<div id="usernameDiv" data-role="fieldcontain">
			<label for="username">User ID*</label>		
			<input id="username" name="username" type="text" />
		</div>
		<div id="passwordDiv" data-role="fieldcontain">
			<label for="password" id="fnameLabel" name="fnameLabel">Password*</label>		
			<input id="password" name="password" type="password" />
		</div>
		<div id="rememberMeDiv" data-role="fieldcontain">
			<label for="rememberMe">Remeber Me</label>
			<input id="rememberMe" name="rememberMe" type="checkbox"/>
		</div>
		<div id="returnUrlDiv" data-role="fieldcontain">
			<input id="returnUrl" name="returnUrl" type="hidden" value="<?php echo $url; ?>"/>
		</div>
		</td>
		</tr>
		
		<tr>
		<td style="text-align:center"><a href="index.php?r=mobile/<?php echo $url; ?>" data-icon="delete" data-role="button" data-inline="true" data-icon="back">Cancel</a></td>
		<td style="text-align:center"><input type="submit" value="Login" data-inline="true"/></td>
		</tr>
		</table>
	</form>
	</div><!-- /content -->
	
	<div data-role="footer">
		<h4><?php echo Yii::app()->name; ?>: <?php echo date('l jS \of F Y h:i:s A'); ?></h4>
	</div><!-- /footer -->
</div>

</body>
</html>