<?php
$cs=Yii::app()->getClientScript();
if(!$cs->isCssRegistered('css-my-message-style'))
{
$cs->registerCss(
'css-my-message-style',
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
<?php 
	$from_user=null;
	
	$profile_image=null;
	if($data->from_type==Messages::RECTYPE_STUDENT)
	{
		$from_user=Student::model()->findByPk($data->from_id); 
		
	}
	else
	{
		$from_user=Professor::model()->findByPk($data->from_id); 
	}
?>
	
<?php if(isset($from_user)): ?>

<?php
$profile_image=$from_user->getThumbnailImagePathIfFileExists();
?>
	<table>
	<tr>
	<td style="width:50px;vertical-align:top;">
	<img style="width: 50px; height: 50px; z-index: 3;" src="<?php echo $profile_image; ?>" alt="" /> 
	</td>
	<td style="vertical-align:top;">
	<?php
	echo $data->text_message;
	?>
	</td>
	</tr>
	</table>
<?php else: ?>
    <?php echo $tag_ucase.' with id='.$data->to_id.' is not found'; ?>
<?php endif; ?>
</div>

<div style="margin-top:-20px">
<?php 
echo CHtml::link($from_user->first_name.' '.$from_user->last_name, array($from_user->tag_lcase().'/view', 'id'=>$from_user->id), array('target'=>'_blank', 'style'=>'text-decoration:none;font-weight:bold;'));
?>
<b><?php echo ' '.Yii::t('translation', 'SAYS'); ?></b>
<span style="float:right">
<b><?php echo ' '.Yii::t('translation', 'On'); ?></b> <?php echo $data->text_date; ?>
</span>
</div>