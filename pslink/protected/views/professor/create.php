<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
<?php
 $cs = Yii::app()->getClientScript();
 $cs->registerCss(
 'css-floating-bar',
 '
 #floatbar {
     width:100%;
     position: fixed;
	 bottom: 0px;
	 left:0px;
     z-index: 9999;
     background-color:rgba(0,0,0,0.5);
	 filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=\'#88000000\', endColorstr=\'#88000000\');
     height: 34px;
     color: #FFFFFF;
     font-size: 12px;
     padding:0px;
}		
');
 
Yii::import('ext.EGeoIP');
		 
$geoIp = new EGeoIP();

$ip= CHttpRequest::getUserHostAddress();
$geoIp->locate($ip); // use your IP

$countryName='';
if(isset($geoIp))
{
	$countryName=$geoIp->countryName;
}
?>

<div style="position: absolute; left: 10px; top: 90px; width: 430px; height: 300px; z-index: 3;">
<p style="color:white">
<span style="font-family: '_create_font_tag_for_style_'; font-size: large;"><?php echo Yii::t('translation', 'Join us, you can'); ?>:</span>
</p>

<ul type="circle">
<li><div class="heading1" styleclasses="cssasb3">
<span style="font-size: small;"><?php echo Yii::t('translation', 'You can find the professors who have research positions'); ?></span>
</div></li>
<li><div class="heading1" styleclasses="cssasb3">
<span style="font-size: small;"><?php echo Yii::t('translation', 'You can find the students from all over the world looking for research positions'); ?></span>
</div></li>
<li><div class="heading1" styleclasses="cssasb3">
<span style="font-size: small;"><?php echo Yii::t('translation', 'You can evaluate yourself when compare to other students'); ?></span>
</div></li>
<li><div class="heading1" styleclasses="cssasb3">
<span style="font-size: small;">...</span>
</div></li>
</ul>
<p>&nbsp;</p>
</div>

<ul style="position: absolute; left: 497px; top: 90px; width: 480px; z-index:6;float:left;margin:0;padding:0;list-style:none">
<li  style="float:left;position:relative;"><a href="" style="background-image:url('<?php echo Yii::app()->theme->baseUrl;?>/images/nb-first-item.png');display:block;
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
	line-height:51px;
	color:white;
	text-decoration:none;
	background-repeat:no-repeat;
	background-position:left top;
	width:21px">&nbsp;</a></li>
<li style="float:left;position:relative;"><?php echo CHtml::link(CHtml::encode(Yii::t('translation', 'Student')), array('student/create'), array('style'=>'display:block;
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
	line-height:51px;
	color:#333;
	text-decoration:none;
	background-image:url("'.(Yii::app()->theme->baseUrl).'/images/nb-item.png");
	background-repeat:repeat-x;
	background-position:left top;
	width:280px')); ?></li>
<li style="float:left;position:relative;"><?php echo CHtml::link(CHtml::encode(Yii::t('translation', 'Professor')), array('professor/create'), array('style'=>'display:block;
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
	line-height:51px;color:white;
	text-decoration:none;
	background-image:url("'.(Yii::app()->theme->baseUrl).'/images/nb-active-item.png");
	background-repeat:no-repeat;
	background-position:left top;
	width:150px')); ?></li>
<li style="float:left;position:relative;"><a href="" style="background-image:url('<?php echo Yii::app()->theme->baseUrl;?>/images/nb-last-item.png');display:block;
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
	line-height:51px;
	color:white;
	text-decoration:none;
	background-repeat:no-repeat;
	background-position:left top;
	width:22px">&nbsp;</a></li>
</ul>

<div style="position: absolute; left: 502px; top: 120px; width: 460px; height: 205px; z-index: 5;background-image:url('<?php echo Yii::app()->theme->baseUrl;?>/images/box1-bottom-right.gif');">
</div>

<div style="position: absolute; left: 512px; top: 150px; width: 440px; height: 205px; z-index: 6;">

<?php echo $this->renderPartial('_formSignup', array('model'=>$model)); ?>

</div>

<div id="floatbar">
<table>
<tr>
<td>
<?php 
$this->widget('application.extensions.WSocialButton', array('style'=>'standard', 'type'=>'horizontal'));
?>
</td>
<td style="vertical-align:top;text-align:center;padding:10px;">
Welcome! Friends from 
<b><?php echo Yii::t('translation', $countryName); ?></b>
</td>
<td style="vertical-align:top;text-align:center;padding:10px;">
<?php
Yii::app()->counter->refresh();
?>
online: <?php echo Yii::app()->counter->getOnline(); ?><br />
</td>
<td style="vertical-align:top;text-align:right;padding:10px;">
Copyright &copy; <?php echo date('Y'); ?> by <a href="index.php">P</a>S-Book All Rights Reserved
</td>
</tr>
</table>
</div>

