<div class="form">	

<?php
$loginType='NA';
if(isset(Yii::app()->user))
{
	if(Yii::app()->user->hasState('cLoginType'))
	{
		$loginType=Yii::app()->user->cLoginType;
	}
}
 
if(strcmp($loginType, 'Professor')==0)
{
	$p=Professor::model()->find('id=?', Yii::app()->user->cId);
}
else if(strcmp($loginType, 'Student')==0)
{
	$p=Student::model()->find('id=?', Yii::app()->user->cId);
}
$username=$model->first_name.' '.$model->last_name;
?>
	<table>
	<tr>
	<td colspan="2">
	Do you want to follow <span><?php echo $username; ?></span>?
	</td>
	</tr>
	
	<tr><td>&nbsp;</td></tr>
	
	 <tr>
	 <td>
		<div id="btn-follow-student-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-follow-student-complete',
				'
				function handleFollowStudentComplete()
				{
					$.post("index.php?r='.$p->tag_lcase().'/follow&id='.$p->id.'", { sid:'.$model->id.'},
					function(data) 
					{
						if(data=="success")
						{
							$("#follow-student-dialog").dialog("close");
							location.reload();
						}
						else
						{
							alert(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-follow-student-complete',
				'
				$("#btn-follow-student-complete").click(function() {
					handleFollowStudentComplete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	<td>
		<div id="btn-follow-student-cancel" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  Cancel
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-follow-student-cancel',
				'
				function handleFollowStudentCancel()
				{
					$("#follow-student-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-follow-student-cancel',
				'
				$("#btn-follow-student-cancel").click(function() {
					handleFollowStudentCancel();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->