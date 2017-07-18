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
	$from_user=null;
	$to_user=null;
	$subject_user=null;
	
	$profile_image=null;
	if($data->from_type==Messages::RECTYPE_STUDENT)
	{
		$from_user=Student::model()->findByPk($data->from_id); 
		
	}
	else
	{
		$from_user=Professor::model()->findByPk($data->from_id); 
	}
	
	if($data->to_type==Messages::RECTYPE_STUDENT)
	{
		$to_user=Student::model()->findByPk($data->to_id); 
		
	}
	else
	{
		$to_user=Professor::model()->findByPk($data->to_id); 
	}
	
	$subject_id=$data->field1;
	$subject_type=(int)$data->field2;
	
	if($subject_type==Messages::RECTYPE_STUDENT)
	{
		$subject_user=Student::model()->findByPk($subject_id); 
		
	}
	else
	{
		$subject_user=Professor::model()->findByPk($subject_id); 
	}
?>
	
<?php if(isset($from_user) && isset($subject_user) && isset($to_user)): ?>

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

<?php
$profile_image=$subject_user->getThumbnailImagePathIfFileExists();
$subject_username = CHtml::encode($subject_user->first_name.' '.$subject_user->last_name);
?>

<div class="triangle-border">
	<table>
	<tr>
	
	<td style="vertical-align:top">	
	<?php 
	echo CHtml::link($subject_username, array($subject_user->tag_lcase().'/view', 'id'=>$subject_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<b>
	<?php echo ' '.Yii::t('translation', 'is a').' '.Yii::t('translation', $subject_user->tag_ucase()).' '.Yii::t('translation', 'from').' '; ?>
	</b>
	<?php echo $subject_user->getSchool()->getInstituteDesc(); ?>
	<br />

	<?php 
	echo CHtml::link($subject_username, array($subject_user->tag_lcase().'/view', 'id'=>$subject_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<b>
	<?php echo '\'s '.Yii::t('translation', 'email').' '.Yii::t('translation', 'is').' '; ?>
	</b>
	<?php echo CHtml::mailto($subject_user->email1, $subject_user->email1); ?>
	<br />

	<?php 
	echo CHtml::link($subject_username, array($subject_user->tag_lcase().'/view', 'id'=>$subject_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<b>
	<?php echo '\'s '.Yii::t('translation', 'research interest').' '.Yii::t('translation', 'is').' '; ?>
	</b>
	<?php echo CHtml::encode($subject_user->getResearchInterest()); ?>
	<br />
	
	<?php
	echo CHtml::link($subject_username, array($subject_user->tag_lcase().'/view', 'id'=>$subject_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<b>
	<?php echo '\'s '.Yii::t('translation', 'photo').' '.Yii::t('translation', 'is at the right side').' '; ?>
	</b>
	<br />
	<br />
	
	<b><?php echo Yii::t('translation', 'Below is').' '; ?></b>
	<?php 
	$from_username = CHtml::encode($from_user->first_name.' '.$from_user->last_name);
	echo CHtml::link($from_username, array($from_user->tag_lcase().'/view', 'id'=>$data->from_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<b>
	<?php echo '\'s '.Yii::t('translation', 'message').' '; ?>
	</b>
	<b>
	<?php echo ' '.Yii::t('translation', 'to').' '; ?>
	</b>
	<?php 
	$to_username = Yii::t('translation', 'me');
	echo CHtml::link($to_username, array($to_user->tag_lcase().'/view', 'id'=>$data->to_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<br />
	
	<?php
	echo $data->note;
	?>
	
	</td>
	
	<td style="width:60px; vertical-align:top;">
	<img style="width: 100px; height: 100px; z-index: 3;" src="<?php echo $profile_image; ?>" alt="" width="450" height="300" /> 
	</td>
	</tr>
	
	</table>
</div>

<div style="margin-top:-20px">
<?php
$from_username = CHtml::encode($from_user->first_name.' '.$from_user->last_name);
echo CHtml::link($from_username, array($from_user->tag_lcase().'/view', 'id'=>$data->from_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
?>
<b>
<?php echo ' '.Yii::t('translation', 'has recommended').' '; ?>
</b>
<?php 
echo CHtml::link($subject_username, array($subject_user->tag_lcase().'/view', 'id'=>$subject_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
?>
<b>
<?php echo ' '.Yii::t('translation', 'to').' '; ?>
</b>
<?php 
$to_username = Yii::t('translation', 'me');
echo CHtml::link($to_username, array($to_user->tag_lcase().'/view', 'id'=>$data->to_id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;')); 
?>
<b><?php echo ' '.Yii::t('translation', 'on').' '; ?></b><?php echo $data->text_date; ?>

<span style="float:right;">
<?php

echo $subject_username.': ';
if(isset($user))
{	
	
	echo CHtml::link('['.Yii::t('translation', 'Resume').']', 
		array($subject_user->tag_lcase().'/resume2', 'id'=>$data->id), array(
		'style'=>'text-decoration:none;font-weight:bold;'
		));
			
	if($user->id==$subject_user->id && $user->mtype()==$subject_user->mtype())
	{
		
	}
	else
	{
		if(($subject_user->isStudent() && $user->isFollowingStudent($subject_user->id)==false) ||
		 ($subject_user->isProfessor() && $user->isFollowingProfessor($subject_user->id)==false))
		{
			echo CHtml::link('['.Yii::t('translation', 'Follow').']', '#', array(
			   'onclick'=>'handleFollow("'.$subject_user->mtype().'", "'.$subject_user->id.'"); return false;', 
			   'style'=>'text-decoration:none;font-weight:bold;'
			));
		}
		else
		{
			echo CHtml::link('['.Yii::t('translation', 'Unfollow').']', '#', array(
			  'onclick'=>'handleUnfollow("'.$subject_user->mtype().'", "'.$subject_user->id.'"); return false;', 
			  'style'=>'text-decoration:none;font-weight:bold;'
			));
		}
	}
}
else
{
echo CHtml::link(Yii::t('translation', '[Resume]'), 
	array($subject_user->tag_lcase().'/resume2', 'id'=>$subject_user->id), array(
	'style'=>'text-decoration:none;font-weight:bold;'
	));
}
?>
</span>
<br />
<br />
</div>

<?php else: ?>
    <?php echo $tag_ucase.' with id='.$data->to_id.' is not found'; ?>
<?php endif; ?>

