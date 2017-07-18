<?php
$profile_image=$data->getThumbnailImagePathIfFileExists();

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

<div class="triangle-border">
<table>
<tr>
<td style="width:51px;vertical-align:top;">
<?php
echo CHtml::link(CHtml::image($profile_image, '', array('style'=>'width: 50px; height: 50px;')), array($data->tag_lcase().'/view', 'id'=>$data->id)); 
?>
</td>
<td style="vertical-align:top">
<?php
if(isset($data->looking_for) && $data->looking_for !== '')
{
	echo CHtml::link(CHtml::encode($data->looking_for), array($data->tag_lcase().'/view', 'id'=>$data->id), array('style'=>'text-decoration:none;font-weight:bold'));  
	echo '<br />';
}
echo Yii::t('translation', 'Research').': '.$data->getResearchInterest();  
if($data->isProfessor())
{
	
	$req_list=explode("\n", $data->requirements);
	if(count($req_list) > 0)
	{
		echo '<br />';
		echo Yii::t('translation', 'Requirements').': <br />';
		echo '<ul>';
		foreach($req_list as $req_val)
		{
			echo '<li>'.Yii::t('translation', $req_val).'</li>';
		}
		echo '</ul>';
	}
}
else 
{
	if(isset($data->email1) && $data->email1 !== '')
	{
		echo '<br />';
		echo 'Email: '.CHtml::mailto($data->email1);
	}
}
?>
</td>
<td style="width:60px;vertical-align:top;">
<?php 
$file='qrcode/'.$data->tag_lcase().'_view_'.$data->id.'.png';
$url=Yii::app()->createAbsoluteUrl('mobile/view'.$data->tag_ucase(), array('id'=>$data->id));
Yii::app()->QRGen->createQRCode($url, $file);
echo CHtml::image($file, '#', array('style'=>'width:60px;height:60px;'));
?>
</td>
</tr>
</table>
</div>

<div style="margin-top:-20px;">
<span style="width:300px">
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/>

	<?php 
	echo CHtml::link(CHtml::encode($data->first_name.' '.$data->last_name), array($data->tag_lcase().'/view', 'id'=>$data->id), array('style'=>'text-decoration:none;font-weight:bold;')); 
	?>
	<?php if(isset($data->looking_for) && $data->looking_for!==''): ?>
	<b><?php echo Yii::t('translation', 'SAYS'); ?>: </b>
	<?php endif; ?>
	
</span>

<span style="color: #3366ff;float:right;">
	<?php
	echo Yii::t('translation', $data->tag_ucase());
	echo ' '.Yii::t('translation', 'from').' '.Chtml::link($data->getSchool()->getInstituteDesc(), array('educationSchool/view', 'institute_name'=>$data->getSchoolName())); 
	?>
	
	<?php
	if(isset($user))
	{	
		echo CHtml::link('['.Yii::t('translation', 'Resume').']', 
			array($data->tag_lcase().'/resume2', 'id'=>$data->id), array(
			'style'=>'text-decoration:none;font-weight:bold;'
			));
				
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
</span>
</div>
