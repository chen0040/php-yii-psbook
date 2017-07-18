<?php 
$url=Yii::app()->createAbsoluteUrl('mobile/index'); 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'mobile-site-dialog',
		'options'=>array(
			'title'=>'QR Code for Mobile',
			'autoOpen'=>false,
			'modal' => true,
			'resizable' => false,
			'width'=>'auto',
			'height'=>'auto',
		),
	));

$file='qrcode/home.png';
Yii::app()->QRGen->createQRCode($url, $file);
echo CHtml::image($file, '#');
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<table style="width:100%">
<tr>
<td style="width:100%">
<?php
echo Yii::t('translation', 'Our mobile site is at').' '; 
echo CHtml::link($url, array('mobile/index'));
?>
</td>
<td style="width:120px">
<?php
echo CHtml::link('QR for Mobile', '#', array('id'=>'btn-site-qr', 'class'=>'orange', 'style'=>'float:right;width:120px;', 'onclick'=>'$("#mobile-site-dialog").dialog("open"); return false;'));
Yii::app()->getClientScript()->registerScript('style-site-qr', '$("#btn-site-qr").corner();', CClientScript::POS_READY);
?>
</td>
</tr>
</table>

<?php
$professor_group=new CActiveDataProvider('Professor', 
			array(
				'criteria'=>array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
					'limit' => 10,
				),
			),
			array( 
				'pagination'=>array( 
					'pageSize'=>10,
				), 
			)
		);
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$professor_group, 
		'viewData'=>array('user'=>$user),
		'itemView'=>'/professor/_looking_for',
	)
);
?>
<br /><br />
<?php
if(!isset($user))
{
echo CHtml::link(Yii::t('translation', 'Learn More'), '#', array('id'=>'btn-learn-more', 'class'=>'orange', 'style'=>'width:120px;float:right;', 'onclick'=>'$("#login-dialog").dialog("open"); return false;')); 
Yii::app()->getClientScript()->registerScript(
'script-style-btn-learn-more',
'
$("#btn-learn-more").corner();
',
CClientScript::POS_READY);
}
?>

<br /><br />

<table style="border-style:dotted;border-width:1px;">
<tr>
<td>
<?php
echo CHtml::link('Atom', array('site/feedAtom'), array('id'=>'btn-feed-atom','style'=>'float:left;width:60px;text-decoration:none;font-weight:bold;', 'target'=>'_blank'));
//Yii::app()->getClientScript()->registerScript('style-feed-atom', '$("#btn-feed-atom").corner("right");', CClientScript::POS_READY);
?>
<?php
echo CHtml::link('RSS1', array('site/feedRSS1'), array('id'=>'btn-feed-rss1', 'style'=>'float:right;width:60px;text-decoration:none;font-weight:bold;', 'target'=>'_blank'));
//Yii::app()->getClientScript()->registerScript('style-feed-rss1', '$("#btn-feed-rss1").corner();', CClientScript::POS_READY);
?>
<?php
echo CHtml::link('RSS2', array('site/feedRSS2'), array('id'=>'btn-feed-rss2', 'style'=>'float:right;width:60px;text-decoration:none;font-weight:bold;', 'target'=>'_blank'));
//Yii::app()->getClientScript()->registerScript('style-feed-rss2', '$("#btn-feed-rss2").corner("left");', CClientScript::POS_READY);
?>
</td>
</tr>
</table>

