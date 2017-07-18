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

<div style="position: absolute; left: 500px; top: 90px; width: 460px; height: 295px; z-index: 4;" class="box1-bottom-right">
<div class="box1-bottom-left" style="width: 100%; height: 100%">
<div class="box1-top-right" style="width: 100%; height: 100%">
<div class="box1-top-left box-heading-3 box-paragraph" style="width: 100%; height: 100%">
</div>
</div>
</div>
</div>

<div style="position: absolute; left: 532px; top: 142px; width: 410px; height: 215px; z-index: 5;">

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('translation', 'Fields with');?> <span class="required">*</span> <?php echo Yii::t('translation', 'are required'); ?>.</p>

	<table>
	<tr>
	<td colspan="2">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</td>
	</tr>
	
	<tr>
	<td colspan="2">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<!--
		<p class="hint">
			Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.
		</p>
		-->
	</td>
	</tr>

	<tr>
	<td colspan="2">
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	</td>
	</tr>

	<tr>
	<td>
		<?php echo CHtml::submitButton('Login', array('style'=>'background:transparent url("'.Yii::app()->theme->baseUrl.'/images/blank-blue-button.png") no-repeat center top;width:180px;height:40px;border-style:none;cursor:pointer;cursor:hand;display:block;color:white;')); ?>
	</td>
	<td>
		<?php echo CHtml::link('Join Us', array('student/create'), array('style'=>'background-image:url("'.Yii::app()->theme->baseUrl.'/images/blank-blue-button.png");width:185px;height:40px;background-repeat:no-repeat;position:relative;text-decoration:none;display:block;color:white;text-align:center;line-height: 40px')); ?>
	</td>
	</tr>
	</table>

<?php $this->endWidget(); ?>
</div><!-- form -->

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



