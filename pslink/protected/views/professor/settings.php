<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<?php

$cs=Yii::app()->getClientScript();

if(!$cs->isCssRegistered('style-iphone-switch'))
{
$cs->registerCss(
'style-iphone-switch',
'
/* Container */
.switch {
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  position: relative;
  width: 105px;
  height: 30px;
  vertical-align: middle;
}
/* Background image */
.switch .background {
  background: url("'.Yii::app()->baseUrl.'/img/switch-background.png");
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 161px;
  height: 30px;
}
/* Mask */
.switch .mask {
  background: url("'.Yii::app()->baseUrl.'/img/switch-mask.png");
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 105px;
  height: 30px;
}
');

$cs->registerScript(
'script-iphone-switch',
'
// Replace checkboxes with switch
	$("input[type=checkbox].switch").each(function() {

		// Insert switch
		$(this).before("<span class=\'switch\'>" + "<span class=\'mask\' /><span class=\'background\' />" + "</span>");

		// Hide checkbox
		$(this).hide();

		// Set inital state
		if (!$(this)[0].checked) $(this).prev().find(".background").css({left: "-56px"});
	});
			
	// Toggle switch when clicked
	$("span.switch").click(function() 
	{
		// Slide switch off
		if ($(this).next()[0].checked) {
			$(this).find(".background").animate({left: "-56px"}, 200);

		// Slide switch on
		} else {
			$(this).find(".background").animate({left: "0px"}, 200);
		}

		// Toggle state of checkbox
		$(this).next()[0].checked = !$(this).next()[0].checked;
	});
			
',
CClientScript::POS_READY
);
}

echo CHtml::link(Yii::t('translation', 'Public Preview'), array($model->tag_lcase().'/view', 'id'=>$model->id), array(
	   'style'=>'position: absolute; left: 10px; top: 46px; z-index: 3;cursor:hand;width:120px;',
	   'class'=>'inbox_btn',
	   'target'=>'_blank',
	   'id'=>'btn-public-preview',
	));

Yii::app()->getClientScript()->registerScript(
		'style-public-preview',
		'$("#btn-public-preview").corner("cc:#0F4D92 top");',
		CClientScript::POS_READY
);
?>




<?php
$style_header='color: #3366ff;';
$menu_height=20;
$menu_width=180;
$menu_left=960;
$menu_top=410;
$corner_method='.corner("bottom")';
$profile_image=$model->getImagePathIfFileExists();
?>
<img style="position: absolute; left: 10px; top: 90px; width: 250px; height: 250px; z-index: 3;" src="<?php echo $profile_image; ?>" alt="" width="450" height="300" /> 



<?php
$cs=Yii::app()->getClientScript();
$cs->registerCss(
'css-scroll-menu-always-top',
'
#toolbox_menu {
	width:940px;
	z-index: 21;
}
.absolute_toolbox_menu {
	position:absolute;
	top:410px;
}
.fixed_toolbox_menu {
    position:fixed;
    top:0px;
}
'
);
$cs->registerScript(
'style-scroll-menu-orig-top',
'
$("#toolbox_menu").addClass("absolute_toolbox_menu");
',
CClientScript::POS_READY);

$cs->registerScript(
'style-scroll-menu-always-top',
'
var msie6 = $.browser == \'msie\' && $.browser.version < 7;
if (!msie6) {
    var top = $("#toolbox_menu").offset().top;
    $(window).scroll(function(event) {
        var y = $(this).scrollTop();
        if (y >= top) {
            $("#toolbox_menu").addClass("fixed_toolbox_menu").removeClass("absolute_toolbox_menu");
        } 
		 else {
           $("#toolbox_menu").addClass("absolute_toolbox_menu").removeClass("fixed_toolbox_menu");
        }
    });
}
',
CClientScript::POS_LOAD);
?>

<div id="toolbox_menu">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$model->tag_lcase().'-password-dialog',
    'options'=>array(
        'title'=>'Change Password',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangePassword', array('model'=>$model)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$model->tag_lcase().'-qrcode-dialog',
    'options'=>array(
        'title'=>'QR Code for Mobile',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

$file='qrcode/'.$model->tag_lcase().'_view_'.$model->id.'.png';
$url=Yii::app()->createAbsoluteUrl('mobile/view'.$model->tag_ucase(), array('id'=>$model->id));
Yii::app()->QRGen->createQRCode($url, $file);
echo CHtml::image($file, '#');

$this->endWidget('zii.widgets.jui.CJuiDialog');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$model->tag_lcase().'-localization-dialog',
    'options'=>array(
        'title'=>'Change Localization',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeLocalization', array('model'=>$model)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
$menu_left-=$menu_width;
echo CHtml::link(Yii::t('translation', 'QR Code'), '#', array(
   'onclick'=>'$("#change-'.$model->tag_lcase().'-qrcode-dialog").dialog("open"); return false;', 
   'style'=>'float:right; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
   'class'=>'black',
   'id'=>'btn-menu-change-qrcode',
));
Yii::app()->getClientScript()->registerScript('style-btn-change-qrcode', '$("#btn-menu-change-qrcode")'.$corner_method.';', CClientScript::POS_READY);

// the link that may open the dialog
$menu_left-=$menu_width;
echo CHtml::link(Yii::t('translation', 'Change Password'), '#', array(
   'onclick'=>'$("#change-'.$model->tag_lcase().'-password-dialog").dialog("open"); return false;', 
   'style'=>'float:right; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
   'class'=>'black',
   'id'=>'btn-menu-change-password',
));
Yii::app()->getClientScript()->registerScript('style-btn-change-password', '$("#btn-menu-change-password")'.$corner_method.';', CClientScript::POS_READY);

// the link that may open the dialog
$menu_left-=$menu_width;
echo CHtml::link(Yii::t('translation', 'Change Language'), '#', array(
   'onclick'=>'$("#change-'.$model->tag_lcase().'-localization-dialog").dialog("open"); return false;', 
   'style'=>'float:right; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
   'class'=>'black',
   'id'=>'btn-menu-change-language',
));
Yii::app()->getClientScript()->registerScript('style-btn-change-language', '$("#btn-menu-change-language")'.$corner_method.';', CClientScript::POS_READY);
?>
</div>

<?php 
$rule_index=1;
?>

<div style="position: absolute; left: 400px; top: 90px; width: 560px; height: 295px; z-index: 4;color:white;">
<?php
$rules=array();
$rules[]='Share news on my resume change status';
$rules[]='Share news on my image upload status';
$rules[]='Share news on my image change status';
$rules[]='Share news on my video upload status';
$rules[]='Share news on my video change status';
$rule_count=count($rules);
?>

<table style="width:100%;">
<?php for($rule_index=0; $rule_index < $rule_count; ++$rule_index): ?>
<tr>
<td style="font-weight:bold">
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo CHtml::image(Yii::app()->baseUrl.'/img/setting.png', '', array('style'=>'width:16px;height:16px;vertical-align:bottom;')); ?> 
<?php echo Yii::t('translation', $rules[$rule_index]); ?>
</td>
<td style="width:100px"><input type="checkbox" class="switch"  
<?php 
if(strcmp($model->getRule($rules[$rule_index], 'Yes'), 'Yes')==0)
{
	echo 'checked';
}
?> ></td>
</tr>

<?php endfor; ?>

</table>

<button name="btnUpdateSettings" id="btnUpdateSettings" value="Update Settings"><?php echo Yii::t('translation', 'Update'); ?></button>


</div>

<div style="position: absolute; left: 10px; top: 460px; width: 960px; z-index: 4;">

<?php

$rules=array();
$rules[]='Who can view my web profile';
$rules[]='Who can recommend someone to me';
$rules[]='Who can recommend me to someone else';
$rules[]='Who can download my resume';
$rules[]='Who can leave a message to me';

$subrules=array();
$subrules[]='Only followers can view my web profile';
$subrules[]='Only followers can recommend someone to me';
$subrules[]='Only followers can recommend me to someone else';
$subrules[]='Only followers can download my resume';
$subrules[]='Only followers can leave a message to me';

$rule_section_count=count($rules);
?>

<table style="width:100%">

<?php for($rule_index=0; $rule_index < $rule_section_count; ++$rule_index): ?>

<tr>
<td style="font-weight:bold"><?php echo CHtml::image(Yii::app()->baseUrl.'/img/user.png', '', array('style'=>'width:16px;height:16px;vertical-align:bottom;')); ?> 
<?php echo Yii::t('translation', $rules[$rule_index]).'?'; ?>
</td>
<td style="width:100px"><input type="checkbox" class="switch" <?php echo rand(0, 10) < 5 ? 'checked' : ''; ?> /></td>
</tr>
<tr>
<td style="font-weight:bold">
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo CHtml::image(Yii::app()->baseUrl.'/img/setting.png', '', array('style'=>'width:16px;height:16px;vertical-align:bottom;')); ?> 
<?php echo Yii::t('translation', $subrules[$rule_index]); ?>
</td>
<td style="width:100px"><input type="checkbox" class="switch"  
<?php 
if(strcmp($model->getRule($subrules[$rule_index], 'Yes'), 'Yes')==0)
{
	echo 'checked';
}
?> ></td>
</tr>

<?php endfor; ?>

</table>

</div>

<?php
$cs=Yii::app()->getClientScript();
for($row=1; $row <= 3; ++$row)
{
	for($col=1; $col <= 3; ++$col)
	{
		$cs->registerScript('script-style-dlg-header-'.$row.'-'.$col, '$("#header'.$row.'-'.$col.'").corner("top");', CClientScript::POS_READY); 
		$cs->registerScript('script-style-dlg-footer-'.$row.'-'.$col, '$("#footer'.$row.'-'.$col.'").corner("bottom");', CClientScript::POS_READY); 
	}
}
?>
