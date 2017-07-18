<?php
if(!isset($countryName))
{
	$countryName='';
}
?>

<div id="floatbar">
<table>
<tr>
<td>
<?php 
$this->widget('application.extensions.WSocialButton', array('style'=>'standard', 'type'=>'horizontal'));
?>
</td>
<td style="vertical-align:top;text-align:center;padding:10px;">
<?php if(isset($user)): ?>
<?php echo Yii::t('translation', 'Welcome').'!'; ?> <b><?php echo $profile->username; ?></b>
<?php else: ?>
<?php echo Yii::t('translation', 'Welcome').'! '.Yii::t('translation', 'Friends from').' '; ?> 
<b><?php echo Yii::t('translation', $countryName); ?></b>
<?php endif; ?>
</td>
<td style="vertical-align:top;text-align:center;padding:10px;">
<?php
Yii::app()->counter->refresh();
?>
online: <?php echo Yii::app()->counter->getOnline(); ?><br />
</td>
<?php if(isset($user)): ?>
<td style="vertical-align:top;text-align:right;padding:0px;">
<?php
$menu_width=120;
$menu_height=20;
echo CHtml::link(Yii::t('translation', 'Photo Gallery'),
	array('index', 'status'=>ViewController::VIEW_IMAGEGALLERY),
	array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
	'class'=>$controller->tag==ViewController::VIEW_IMAGEGALLERY ? 'orange' : 'black',
	'id'=>'btn-menu-image-gallery')
);
Yii::app()->getClientScript()->registerScript('style-btn-menu-image-gallery', '$("#btn-menu-image-gallery").corner("bottom")', CClientScript::POS_READY);

echo CHtml::link(Yii::t('translation', 'Video Gallery'),
	array('index', 'status'=>ViewController::VIEW_VIDGALLERY),
	array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
	'class'=>$controller->tag==ViewController::VIEW_VIDGALLERY ? 'orange' : 'black',
	'id'=>'btn-menu-vid-gallery')
);
Yii::app()->getClientScript()->registerScript('style-btn-menu-vid-gallery', '$("#btn-menu-vid-gallery").corner("bottom")', CClientScript::POS_READY);
?>
</td>
<?php else: ?>

<td style="vertical-align:top;text-align:right;padding:10px;">
Copyright &copy; <?php echo date('Y'); ?> by <a href="index.php">P</a>S-Book All Rights Reserved
</td>
<?php endif; ?>
</td>
</tr>
</table>
</div>

<?php
$cs = Yii::app()->getClientScript();
$cs->registerCss(
'css-floating-bar',
'
#floatbar {
 width:100%;
 position: fixed;
 border-top: 1px solid;
 bottom: 0px;
 left:0px;
 z-index: 9999;
 background-color:rgba(255,255,255, 1);
 filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=\'#ffffffff\', endColorstr=\'#ffffffff\');
 height: 34px;
 color: #000000;
 font-size: 12px;
 padding:0px;
}		
');
?>