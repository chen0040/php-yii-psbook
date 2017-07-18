<?php
$cs=Yii::app()->getClientScript();
//http://nicolasgallagher.com/pure-css-speech-bubbles/demo/
if(!$cs->isCssRegistered('css-pview-style'))
{
$cs->registerCss(
'css-pview-style',
'
/* ============================================================================================================================
== BUBBLE WITH A BORDER AND TRIANGLE
** ============================================================================================================================ */

/* THE SPEECH BUBBLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-border {
	position:relative;
	padding:15px;
	margin:1em 0 3em;
	border:5px solid #27659C;
	color:#333;
	background:#fff;
	/* css3 */
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
}

/* Variant : for left positioned triangle
------------------------------------------ */

.triangle-border.left {
	margin-left:30px;
}

/* Variant : for right positioned triangle
------------------------------------------ */

.triangle-border.right {
	margin-right:30px;
}
');
}
?>
<div class="triangle-border">
	<table style="width:100%">
	<tr>
	<td style="width:100%;vertical-align:top;">
	<b><?php echo Yii::t('translation', 'Research'); ?>:</b>
	<?php echo CHtml::link(Yii::t('translation', $data->research_field_name), array('view', 'research_field_name'=>$data->research_field_name)); ?>
	<br />
	</td>
	<td style="width:60px;vertical-align:top;">
	<?php 
	$file='qrcode/research_view_'.$data->id.'.png';
	$url=Yii::app()->getBaseUrl(true).Yii::app()->controller->createUrl('researchField/view', array('research_field_name'=>$data->research_field_name));
	Yii::app()->QRGen->createQRCode($url, $file);
	echo CHtml::image($file, '#', array('style'=>'width:60px;height:60px;'));
	?>
	</td>
	</tr>
	</table>

</div>