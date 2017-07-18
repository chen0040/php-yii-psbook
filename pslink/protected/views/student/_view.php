
<?php 
$cs=Yii::app()->getClientScript();

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

	
	$profile_image=$data->getThumbnailImagePathIfFileExists();
	?>
	
	<div class="triangle-border">
	<table>
	<tr>
	
	<td style="width:60px; vertical-align:top;">
	<?php echo CHtml::link(CHtml::image($profile_image, $data->first_name.' '.$data->last_name, array('style'=>'width: 60px;height:60px')), array($data->tag_lcase().'/view', 'id'=>$data->id)); ?>
	</td>
	
	<td style="vertical-align:top;">
	
	<b><?php echo Yii::t('translation', $data->tag_ucase()); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->first_name.' '.$data->last_name), array($data->tag_lcase().'/view', 'id'=>$data->id)); ?>
	<br />

	
	<b><?php echo Yii::t('translation', $data->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->getSchool()->getInstituteDesc()), array('educationSchool/view', 'institute_name'=>$data->getSchoolName())); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('proposed_research_topic')); ?>:</b>
	<?php echo CHtml::encode($data->proposed_research_topic); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('email1')); ?>:</b>
	<?php echo CHtml::encode($data->email1); ?>
	<br />
	
	</td>
	
	<td style="width:60px;vertical-align:top;">
	<?php 
	$file='qrcode/'.$data->tag_lcase().'_view_'.$data->id.'.png';
	$url=Yii::app()->createAbsoluteUrl('mobile/view'.$data->tag_ucase(), array('id'=>$data->id));
	Yii::app()->QRGen->createQRCode($url, $file);
	echo CHtml::image($file, '#', array('style'=>'width:60px;height:60px;'));
	?>
	</td>
	<td style="width:80px;vertical-align:top;">
	<?php
	if(isset($user))
	{	
		echo CHtml::link('['.Yii::t('translation', 'Resume').']', 
			array($data->tag_lcase().'/resume2', 'id'=>$data->id), array(
			'style'=>'text-decoration:none;font-weight:bold;'
			));
			
			echo '<br />';
				
		if($user->id==$data->id && $user->mtype()==$data->mtype())
		{
			
		}
		else
		{		
			if(($data->isStudent() && $user->isFollowingStudent($data->id)==false) ||
			 ($data->isProfessor() && $user->isFollowingProfessor($data->id)==false))
			{
				echo CHtml::link('['.Yii::t('translation', 'Follow').']', '#', array(
				   'onclick'=>'handleFollow("'.$data->mtype().'", "'.$data->id.'"); return false;', 
				   'style'=>'text-decoration:none;font-weight:bold;'
				));
			}
			else
			{
				echo CHtml::link('['.Yii::t('translation', 'Unfollow').']', '#', array(
				   'onclick'=>'handleUnfollow("'.$data->mtype().'", "'.$data->id.'"); return false;', 
				   'style'=>'text-decoration:none;font-weight:bold;'
				));
			}
		}
	}
	else
	{
	echo CHtml::link('['.Yii::t('translation', 'Resume').']', 
		array($data->tag_lcase().'/resume2', 'id'=>$data->id), array(
		'style'=>'text-decoration:none;font-weight:bold;'
		));
	}
	?>
	</td>
	</tr>
	</table>
	</div>


