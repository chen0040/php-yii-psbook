<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl.'/img'; ?>/favicon.ico" type="image/x-icon" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/rbac.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="all" />
	
	<!--[if lt IE 7]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/IE7.js"></script>
<![endif]-->
<!--[if lt IE 8]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/IE8.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/IE9.js"></script>
<![endif]-->



<?php
$cs=Yii::app()->getClientScript();
$cs->registerCss(
'css-index',
'
/* inbox_btn */
.inbox_btn {
	color: #d7d7d7;
	border: solid 1px #333;
	padding: 3px 1px;
	display:block;
	text-decoration:none;
	text-align:center;
	background: #333;
	background: -webkit-gradient(linear, left top, left bottom, from(#666), to(#000));
	background: -moz-linear-gradient(top,  #666,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#666666\', endColorstr=\'#000000\');
}
.inbox_btn:hover {
	background: #000;
	background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
	background: -moz-linear-gradient(top,  #444,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#444444\', endColorstr=\'#000000\');
}
.inbox_btn:active {
	color: #666;
	background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
	background: -moz-linear-gradient(top,  #000,  #444);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#000000\', endColorstr=\'#666666\');
}


/* black */
.black {
	color: #d7d7d7;
	border: 1px solid rgba(0,0,0,0.5);
	padding: 3px 1px;
	display:block;
	text-decoration:none;
	text-align:center;
	background: #27659C;
   box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -o-box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -webkit-box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -moz-box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#666666\', endColorstr=\'#000000\');
}
.black:hover {
	color: #fff;
	background: #000;
	background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
	background: -moz-linear-gradient(top,  #444,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#444444\', endColorstr=\'#000000\');
}
.black:active {
	color: #666;
	background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
	background: -moz-linear-gradient(top,  #000,  #444);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#000000\', endColorstr=\'#666666\');
}

/* orange */
.orange {
	color: #fef4e9;
	border: 1px solid rgba(0,0,0,0.5);
	padding: 3px 1px;
	display:block;
	text-decoration:none;
	text-align:center;
	background: green;
	 box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -o-box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -webkit-box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -moz-box-shadow: inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#faa51a\', endColorstr=\'#f47a20\');
}
.orange:hover {
	background: #f47c20;
	background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
	background: -moz-linear-gradient(top,  #f88e11,  #f06015);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#f88e11\', endColorstr=\'#f06015\');
}
.orange:active {
	color: #fcd3a5;
	background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
	background: -moz-linear-gradient(top,  #f47a20,  #faa51a);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#f47a20\', endColorstr=\'#faa51a\');
}
');

$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jquery.corner.js');
//$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jquery.curvycorners.min.js');

?>


	<style type="text/css">
#twsbtxt3 {position: absolute; left: 26px; top: 8px; width: 130px; height: 58px; z-index: 2;} 
#wsbimg1 {position: absolute; left: 500px; top: 90px; width: 450px; height: 300px; z-index: 3;} 
#wsbtxt2 {position: absolute; left: 10px; top: 110px; width: 460px; height: 100px; z-index: 4;} 
#wsbtxt3 {position: absolute; left: 12px; top: 272px; width: 326px; height: 35px; z-index: 5;} 
#wsbtxt6 {position: absolute; left: 0px; top: 409px; width: 961px; height: 569px; z-index: 6;} 
#wsbtxt8 {position: absolute; left: 86px; top: 532px; width: 780px; height: 387px; z-index: 8;} 
ul#wsbtxt8ul1, #wsbtxt8ul1 ul {list-style-type: none; list-style-image: none; margin: 0; padding: 0 0 0 20px; line-height: 18.75px;} 
#wsbtxt8ul1 li {background: transparent url('images/arrow.png') no-repeat 0% 9.38px; padding: 8px 0 0 25px;} 

#wsbnavbar3 {position: absolute; left: 570px; top: 10px; width: 502px; height: 53px; z-index: 11;} 

#wsbnavbar3 ul li a
{
	margin:0;
	padding:0;
	list-style:none
}

#wsbnavbar3 ul
{
	width:100%;
	float:left;
	list-style:none;
}

#wsbnavbar3 li
{
	float:left;position:relative;
}

#wsbnavbar3 a
{
	display:block;
	position:relative;
	text-decoration:none;	
	font-family:Verdana,Tahoma,Geneva,sans-serif;
	font-size:12px;
	font-weight:bold;
	text-align:center;
	margin-right:0;
	margin-bottom:0;
	display:block;
	float:left;
	line-height:51px;color:#333;
	text-decoration:none;
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-item.png');
	background-repeat:no-repeat;
	background-position:left top;
	width:150px
}

#wsbnavbar3 a:hover
{
	text-decoration:underline
}

#wsbnavbar3 ul li.active a
{
	color: #fff;
	text-decoration:none;
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-active-item.png');
}

#wsbnavbar3 li:nth-child(1) a
{
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-first-item.png');
	background-repeat:no-repeat;
	float:left;position:relative;
	width:21px
}

#wsbnavbar3 li:nth-last-child(1) a
{
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-last-item.png');
	background-repeat:no-repeat;
	background-position:left top;
	width:24px
}

#wsbnavbar4 {position: absolute; left: 300px; top: 10px; width: 662px; height: 53px; z-index: 11;} 

#wsbnavbar4 ul li a
{
	margin:0;
	padding:0;
	list-style:none;
}

#wsbnavbar4 ul
{
	width:100%;
	float:left;
	list-style:none;
}

#wsbnavbar4 li
{
	float:left;position:relative;
}

#wsbnavbar4 a
{
	display:block;
	position:relative;
	text-decoration:none;	
	font-family:Verdana,Tahoma,Geneva,sans-serif;
	font-size:12px;
	font-weight:bold;
	text-align:center;
	margin-right:0;
	margin-bottom:0;
	display:block;
	float:left;
	line-height:51px;color:#333;
	text-decoration:none;
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-item.png');
	background-repeat:no-repeat;
	background-position:left top;
	width:150px
}

#wsbnavbar4 a:hover
{
	text-decoration:underline
}

#wsbnavbar4 ul li.active a
{
	color: #fff;
	text-decoration:none;
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-active-item.png');
}

#wsbnavbar4 li:nth-child(1) a
{
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-first-item.png');
	background-repeat:no-repeat;
	float:left;position:relative;
	width:21px
}

#wsbnavbar4 li:nth-last-child(1) a
{
	background-image:url('<?php echo Yii::app()->theme->baseUrl; ?>/images/nb-last-item.png');
	background-repeat:no-repeat;
	background-position:left top;
	width:24px
}

div#nbstyle1preload1{background-image:url('../images/nb-item.png');background-repeat:no-repeat;background-position:-9999px -9999px}
div#nbstyle1preload2{background-image:url('../images/nb-last-item.png');background-repeat:no-repeat;background-position:-9999px -9999px}
div#nbstyle1preload3{background-image:url('../images/nb-first-item.png');background-repeat:no-repeat;background-position:-9999px -9999px}

#wsbtxt1 {position: absolute; left: 1px; top: 997px; width: 960px; height: 80px; z-index: 12;} 
#twsbtxt1 {position: absolute; left: 0px; top: 70px; width: 960px; height: 1007px; z-index: 1;} 
#content-area {position: absolute; left: 0px; top: 70px; min-width: 100%; width: auto !important; width: 100%; height: 1007px;} 
#content-area1 {width: 982px;} #container {position:relative; margin: 0 auto; width: 982px; height: 1077px; text-align:left;} 
#inner-container {position: relative; width: 982px; height: 1077px;} body {text-align: center;} 
</style>
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="ifldasb2" class="page-default">

<div id="content-area" class="content-area">
<div id="content-area1"></div>
</div>

<div class="container" id="container">

<div id="inner-container">

	<div id="twsbtxt3">
		<address class="heading1"><?php echo CHtml::encode(Yii::app()->name); ?></address>
	</div><!-- header -->

	<?php if(Yii::app()->user->isGuest): ?>
	<div id="wsbnavbar3">
	<?php else: ?>
	<div id="wsbnavbar4">
	<?php endif; ?>
		<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'+', 'url'=>array('_')),
				array('label'=>Yii::t('translation', 'Home'), 'url'=>array('/site/index')),
				array('label'=>'Admin', 'url'=>array('/admin/default/index'), 'visible'=>Yii::app()->authManager->checkAccess("admin", Yii::app()->user->id)),
				array('label'=>Yii::t('translation', 'Settings'), 'url'=>array('student/settings', 'id'=>Yii::app()->user->getState('cId')), 'visible'=>(Yii::app()->user->hasState('cLoginType') && Yii::app()->user->getState('cLoginType')=='Student')),
				array('label'=>Yii::t('translation', 'Settings'), 'url'=>array('professor/settings', 'id'=>Yii::app()->user->getState('cId')), 'visible'=>(Yii::app()->user->hasState('cLoginType') && Yii::app()->user->getState('cLoginType')=='Professor')),
				array('label'=>Yii::t('translation', 'Search'), 'url'=>array('site/search'), 'visible'=>(Yii::app()->user->hasState('cLoginType'))),
				//array('label'=>Yii::t('translation', 'Search'), 'url'=>array('professor/search'), 'visible'=>(Yii::app()->user->hasState('cLoginType') && Yii::app()->user->getState('cLoginType')=='Professor')),
				//array('label'=>Yii::t('translation', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('translation', 'Signup'), 'url'=>array('/student/create'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>(Yii::t('translation', 'Logout').' ('.Yii::app()->user->name.')'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'+', 'url'=>array('_')),
			),
		)); ?>
	</div><!-- mainmenu -->
	

	<?php echo $content; ?>
</div><!-- inner container -->




</body>


</html>