<?php

$cs=Yii::app()->getClientScript();
$cs->registerCss(
'css-resume-item',
'
.resume_item {
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
.resume_item:hover {
	background: #000;
	background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
	background: -moz-linear-gradient(top,  #444,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#444444\', endColorstr=\'#000000\');
}
.resume_item:active {
	color: #666;
	background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
	background: -moz-linear-gradient(top,  #000,  #444);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#000000\', endColorstr=\'#666666\');
');

$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jquery.corner.js');

$cs->registerScript(
	'register-resume-round-corner',
	'
	$("a.resume_item").corner();
	',
	
	CClientScript::POS_READY
);

$menu_width=180;
$menu_height=20;
$menu_left=0;



?>

<table style="<?php echo 'z-index: 22;'; ?>text-align:center;">
<tr>
<td style="vertical-align:top">
<?php
echo CHtml::link('Resume Style (Plain)',
	array($user->tag_lcase().'/resume1', 'id'=>$user->id), 
	array('style'=>'width: '.$menu_width.'px; height: '.$menu_height.'px;',
	'class'=>'resume_item')
);
?>
</td>
<td  style="vertical-align:top;text-align:center">
<?php 
echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/normal_cv.jpg', 'Plain CV'),
	array($user->tag_lcase().'/resume1', 'id'=>$user->id)
	);
	
?>
</td>
<td style="vertical-align:top;">
<?php
echo CHtml::link('Resume Style (Fancy)',
	array($user->tag_lcase().'/resume2', 'id'=>$user->id), 
	array('style'=>'width: '.$menu_width.'px; height: '.$menu_height.'px; ',
	'class'=>'resume_item')
);
?>
</td>
<td  style="vertical-align:top;text-align:center">
<?php 
echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/fancy_cv.jpg', 'Fancy CV'),
	array($user->tag_lcase().'/resume2', 'id'=>$user->id)
	);
?>
</td>
</tr>

</table>