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
<td><span id="txt-<?php echo $user->tag_lcase(); ?>-name" style="<?php echo $style_contact_detail; ?>">
<?php echo $profile->username; ?>
</span>
</td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$user->tag_lcase().'-name-dialog',
    'options'=>array(
        'title'=>'Change Name',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));
echo $this->renderPartial('_formChange'.$user->tag_ucase().'Name', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-'.$user->tag_lcase().'-name-dialog").dialog("open"); return false;', 
   'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-name',
   'style'=>'width:50px',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-name', '$("#edit-change-'.$user->tag_lcase().'-name")'.$corner_method.';', CClientScript::POS_READY);
?>
</td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
<td><span style="color:white;"><?php echo Yii::t('translation', 'School'); ?>: </span><span id="txt-<?php echo $user->tag_lcase(); ?>-school" style="<?php echo $style_contact_detail; ?>"><?php echo CHtml::link($profile->school, array('educationSchool/view', "institute_name" => $user->getSchoolName()), array('style'=>'text-decoration:none;cursor:hand;color:white;')); ?></span></td>
<td style="float:right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$user->tag_lcase().'-school-dialog',
    'options'=>array(
        'title'=>'Change School',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));
echo $this->renderPartial('_formChange'.$user->tag_ucase().'School', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-'.$user->tag_lcase().'-school-dialog").dialog("open"); return false;', 
   'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-school',
   'style'=>'width:50px',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-school', '$("#edit-change-'.$user->tag_lcase().'-school")'.$corner_method.';', CClientScript::POS_READY);
?>
</td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
<td><span style="<?php echo $style_contact_detail; ?>"><?php echo Yii::t('translation', 'Email'); ?>: <span id="txt-<?php echo $user->tag_lcase(); ?>-email1"><?php echo $profile->email; ?></span></span></td>
<td style="float:right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$user->tag_lcase().'-email1-dialog',
    'options'=>array(
        'title'=>'Change Email',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChange'.$user->tag_ucase().'Email', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-'.$user->tag_lcase().'-email1-dialog").dialog("open"); return false;', 
	'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-email',
   'style'=>'width:50px',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-email', '$("#edit-change-'.$user->tag_lcase().'-email")'.$corner_method.';', CClientScript::POS_READY);
?>
</td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
<td><span style="<?php echo $style_contact_detail; ?>"><?php echo Yii::t('translation', 'Tel'); ?>: <span id="txt-<?php echo $user->tag_lcase(); ?>-phone1"><?php echo $profile->phone; ?></span></span></td>
<td style="float:right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$user->tag_lcase().'-phone1-dialog',
    'options'=>array(
        'title'=>'Change Email',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));
echo $this->renderPartial('_formChange'.$user->tag_ucase().'Phone', array('model'=>$user)); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-'.$user->tag_lcase().'-phone1-dialog").dialog("open"); return false;', 
	'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-phone',
   'style'=>'width:50px',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-phone', '$("#edit-change-'.$user->tag_lcase().'-phone")'.$corner_method.';', CClientScript::POS_READY);
?>
<td>
</tr>

<tr><td>&nbsp;</td></tr>

<?php if($user->isProfessor()): ?>
<tr>
<td><span style="<?php echo $style_contact_detail; ?>"><?php echo Yii::t('translation', 'Website'); ?>: <span id="txt-<?php echo $user->tag_lcase(); ?>-email2"><?php echo $user->email2; ?></span></span></td>
<td style="float:right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$user->tag_lcase().'-email2-dialog',
    'options'=>array(
        'title'=>'Change Website',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));
echo $this->renderPartial('_formChange'.$user->tag_ucase().'Website', array('model'=>$user)); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-'.$user->tag_lcase().'-email2-dialog").dialog("open"); return false;', 
'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-website',
   'style'=>'width:50px',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-website', '$("#edit-change-'.$user->tag_lcase().'-website")'.$corner_method.';', CClientScript::POS_READY);
?>
<td>
</tr>

<tr><td>&nbsp;</td></tr>
<?php endif; ?>

<tr>
<td><span style="color:white"><?php echo Yii::t('translation', 'Ads'); ?>: </span><span id="txt-<?php echo $user->tag_lcase(); ?>-looking-for" style="<?php echo $style_ads; ?>"><?php echo $profile->ads; ?></span></td>
<td style="float:right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-'.$user->tag_lcase().'-looking-for-dialog',
    'options'=>array(
        'title'=>'Change Message',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChange'.$user->tag_ucase().'LookingFor', array('model'=>$user)); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-'.$user->tag_lcase().'-looking-for-dialog").dialog("open"); return false;', 
'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-looking-for',
   'style'=>'width:50px',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-looking-for', '$("#edit-change-'.$user->tag_lcase().'-looking-for")'.$corner_method.';', CClientScript::POS_READY);
?>
</td>
</tr>

</table>



</div>