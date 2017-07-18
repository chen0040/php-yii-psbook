<?php
/*
echo CHtml::link(Yii::t('translation', 'Public Preview'), array($user->tag_lcase().'/view', 'id'=>$user->id), array(
	   'style'=>'position: absolute; left: 140px; top: 46px; z-index: 3;cursor:hand;width:120px;',
	   'class'=>'inbox_btn',
	   'target'=>'_blank',
	   'id'=>'btn-public-preview',
	));

Yii::app()->getClientScript()->registerScript(
		'style-public-preview',
		'$("#btn-public-preview").corner("cc:#0F4D92 top");',
		CClientScript::POS_READY
);
*/
?>

<?php  
$corner_method='.corner("cc:#27659C round")';
$style_contact_detail='color:white; font-size: 14px;'; 
$style_ads='color:red;font-size:20px;font-weight:bold;';
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'upload-image-'.$user->tag_lcase().'-dialog',
	'options'=>array(
		'title'=>'Upload Image for '.$profile->username,
		'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
		'height'=>'auto',
	),
));

echo $this->renderPartial('_formUpload'.$user->tag_ucase().'Image', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(CHtml::image($profile->profile_image, "Upload Image", array('style'=>'position: absolute; left: 50px; top: 90px; width: 220px; height: 220px; z-index: 4;', 'id'=>'profile_img')), '#', array(
   'onclick'=>'$("#upload-image-'.$user->tag_lcase().'-dialog").dialog("open"); return false;', 
));
echo '<div style="position: absolute; left: 50px; top: 330px; width: 240px; height: 220px; z-index: 4;color:white;">'.Yii::t('translation', 'Click the profile image above to change').'</div>';
?>

<div style="position: absolute; left: 400px; top: 80px; width: 580px; height: 295px; z-index: 4;">

<table>

<tr>
<td style="color:white;"><?php echo Yii::t('translation', 'Share my thought').':'; ?></td>
</tr>

<tr>
<td>
<?php echo CHtml::textArea($user->tag_lcase().'_wall_message', '', array('rows'=>3, 'cols'=>58)); ?>
</td>
<td style="text-align:bottom;float:right;">
<?php
echo CHtml::link(Yii::t('translation', 'Share'), '#', array(
   'onclick'=>'sendWallMessage(); return false;', 
	'class'=>'black',
	'style'=>'width:50px;',
   'id'=>'edit-change-'.$user->tag_lcase().'-share',
));

$cs=Yii::app()->getClientScript();
$cs->registerScript('register-style-change-'.$user->tag_lcase().'-share', '$("#edit-change-'.$user->tag_lcase().'-share")'.$corner_method.';', CClientScript::POS_READY);


$cs->registerScript(
	'handle-send-wall-message',
	'
	function sendWallMessage()
	{
		var wall_message=$("#'.$user->tag_lcase().'_wall_message").val();
		if(wall_message=="")
		{
			alert("Please enter some message before sending");
		}
		else
		{
			$.post("index.php?r='.$user->tag_lcase().'/wallMessage&id='.$user->id.'", 
			{ message_body:$("#'.$user->tag_lcase().'_wall_message").val(), to_type:'.Messages::MSGGROUP_ALL.'},
			function(data) 
			{
				if(data.status=="failure")
				{
					alert(data.error);
				}
				else
				{
					$("#'.$user->tag_lcase().'_wall_message").val("");
				}
		   },
		   "json");
		}
	}
	',
	CClientScript::POS_END
);
?>
</td>
</tr>

</table>



</div>