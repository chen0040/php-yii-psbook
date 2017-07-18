<?php

$cs=Yii::app()->getClientScript();
//http://nicolasgallagher.com/pure-css-speech-bubbles/demo/
if(!$cs->isCssRegistered('css-looking-for-style'))
{
$cs->registerCss(
'css-looking-for-style',
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

/* THE TRIANGLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-border:before {
	content:"";
	position:absolute;
	bottom:-20px; /* value = - border-top-width - border-bottom-width */
	left:40px; /* controls horizontal position */
    border-width:20px 20px 0;
	border-style:solid;
    border-color:#27659C transparent;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}

/* creates the smaller  triangle */
.triangle-border:after {
	content:"";
	position:absolute;
	bottom:-13px; /* value = - border-top-width - border-bottom-width */
	left:47px; /* value = (:before left) + (:before border-left) - (:after border-left) */
	border-width:13px 13px 0;
	border-style:solid;
	border-color:#fff transparent;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}

/* Variant : top
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.top:before {
	top:-20px; /* value = - border-top-width - border-bottom-width */
	bottom:auto;
	left:auto;
	right:40px; /* controls horizontal position */
    border-width:0 20px 20px;
}

/* creates the smaller  triangle */
.triangle-border.top:after {
	top:-13px; /* value = - border-top-width - border-bottom-width */
	bottom:auto;
	left:auto;
	right:47px; /* value = (:before right) + (:before border-right) - (:after border-right) */
    border-width:0 13px 13px;
}

/* Variant : left
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.left:before {
	top:10px; /* controls vertical position */
	bottom:auto;
	left:-30px; /* value = - border-left-width - border-right-width */
	border-width:15px 30px 15px 0;
	border-color:transparent #27659C;
}

/* creates the smaller  triangle */
.triangle-border.left:after {
	top:16px; /* value = (:before top) + (:before border-top) - (:after border-top) */
	bottom:auto;
	left:-21px; /* value = - border-left-width - border-right-width */
	border-width:9px 21px 9px 0;
	border-color:transparent #fff;
}

/* Variant : right
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.right:before {
	top:10px; /* controls vertical position */
	bottom:auto;
    left:auto;
	right:-30px; /* value = - border-left-width - border-right-width */
	border-width:15px 0 15px 30px;
	border-color:transparent #27659C;
}

/* creates the smaller  triangle */
.triangle-border.right:after {
	top:16px; /* value = (:before top) + (:before border-top) - (:after border-top) */
	bottom:auto;
    left:auto;
	right:-21px; /* value = - border-left-width - border-right-width */
	border-width:9px 0 9px 21px;
	border-color:transparent #fff;
}

');
}
?>


<?php 
	$rfield=null;
	$profile_image=null;
	
	if($data->isMyIdolStudent())
	{
		$rfield=Student::model()->findByPk($data->to_id); 
		
	}
	else
	{
		
		$rfield=Professor::model()->findByPk($data->to_id); 
	}
	
?>
	
<?php if(isset($rfield)): ?>
<?php $tag_ucase=$rfield->tag_ucase(); ?>
<?php
if(isset($user) && !$cs->isScriptRegistered('script-looking-for'))
{
$cs->registerScript(
'script-looking-for',
'
function handleFollow(idtype_val, id_val)
{
	if(idtype_val=='.Messages::RECTYPE_STUDENT.')
	{
		$.post("index.php?r='.$user->tag_lcase().'/follow&id='.$user->id.'", { sid:id_val },
		function(data) 
		{
			if(data=="success")
			{
				location.reload();
			}
			else
			{
				alert(data);
			}
	   });
	}
	else
	{
		$.post("index.php?r='.$user->tag_lcase().'/follow&id='.$user->id.'", { pid:id_val },
		function(data) 
		{
			if(data=="success")
			{
				location.reload();
			}
			else
			{
				alert(data);
			}
	   });
	}
}
function handleUnfollow(idtype_val, id_val)
{
	if(idtype_val=='.Messages::RECTYPE_STUDENT.')
	{
		$.post("index.php?r='.$user->tag_lcase().'/unfollow&id='.$user->id.'", { sid:id_val },
		function(data) 
		{
			if(data=="success")
			{
				location.reload();
			}
			else
			{
				alert(data);
			}
	   });
	}
	else
	{
		$.post("index.php?r='.$user->tag_lcase().'/unfollow&id='.$user->id.'", { pid:id_val },
		function(data) 
		{
			if(data=="success")
			{
				location.reload();
			}
			else
			{
				alert(data);
			}
	   });
	}
}
',
CClientScript::POS_END);
}
?>

<div class="triangle-border">
<?php
$profile_image=$rfield->getThumbnailImagePathIfFileExists();
?>
	<table>
	<tr>
	
	<td style="width:60px; vertical-align:top;">
	<?php
	echo CHtml::link(CHtml::image($profile_image, '', array('style'=>'width:60px;height:60px')), array($rfield->tag_lcase().'/view', 'id'=>$data->to_id), array('style'=>'text-decoration:none;font-weight:bold')); 
	?>
	</td>
	
	<td  style="vertical-align:top">
	
	<?php 
	$rfield_detail = CHtml::encode($rfield->first_name.' '.$rfield->last_name);
	echo CHtml::link($rfield_detail, array($rfield->tag_lcase().'/view', 'id'=>$data->to_id), array('style'=>'text-decoration:none;font-weight:bold')); 
	?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('email1')); ?>:</b>
	<?php echo CHtml::mailto($rfield->email1); ?>
	<br />

	<b><?php echo Yii::t('translation', $rfield->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($rfield->getSchool()->getInstituteDesc()); ?>
	<br />

	<b><?php echo Yii::t('translation', $rfield->getAttributeLabel('research_interest')); ?>:</b>
	<?php echo CHtml::encode($rfield->getResearchInterest()); ?>
	</td>
	
	
	</tr>
	
	</table>
</div>

<div style="margin-top:-20px;">
<b><?php echo Yii::t('translation', 'I am following').' '.Yii::t('translation', $rfield->tag_ucase()); ?>:</b>
	<?php 
	$rfield_detail = CHtml::encode($rfield->first_name.' '.$rfield->last_name);
	echo CHtml::link($rfield_detail, array($rfield->tag_lcase().'/view', 'id'=>$data->to_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); ?>
	
<span style="float:right;">
<?php

echo $rfield_detail.': ';
if(isset($user))
{
	
	echo CHtml::link('['.Yii::t('translation', 'Resume').']', 
		array($rfield->tag_lcase().'/resume2', 'id'=>$data->id), array(
		'style'=>'text-decoration:none;font-weight:bold;'
		));
			
	if($user->id==$rfield->id && $user->mtype()==$rfield->mtype())
	{
		
	}
	else
	{
		if(($rfield->isStudent() && $user->isFollowingStudent($rfield->id)==false) ||
		 ($rfield->isProfessor() && $user->isFollowingProfessor($rfield->id)==false))
		{
			echo CHtml::link('['.Yii::t('translation', 'Follow').']', '#', array(
			   'onclick'=>'handleFollow("'.$rfield->mtype().'", "'.$rfield->id.'"); return false;', 
			   'style'=>'text-decoration:none;font-weight:bold;'
			));
		}
		else
		{
			echo CHtml::link('['.Yii::t('translation', 'Unfollow').']', '#', array(
			  'onclick'=>'handleUnfollow("'.$rfield->mtype().'", "'.$rfield->id.'"); return false;', 
			  'style'=>'text-decoration:none;font-weight:bold;'
			));
		}
	}
}
else
{
echo CHtml::link(Yii::t('translation', '[Resume]'), 
	array($rfield->tag_lcase().'/resume2', 'id'=>$rfield->id), array(
	'style'=>'text-decoration:none;font-weight:bold;'
	));
}
?>
</span>

</div>
<?php else: ?>
    <?php echo $tag_ucase.' with id='.$data->to_id.' is not found'; ?>
<?php endif; ?>

