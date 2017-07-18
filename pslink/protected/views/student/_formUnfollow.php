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
	Do you want to unfollow <span><?php echo $username; ?></span>?
	</td>
	</tr>
	
	<tr><td>&nbsp;</td></tr>
	
	 <tr>
	 <td>
		<div id="btn-unfollow-student-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-unfollow-student-complete',
				'
				function handleUnunfollowStudentComplete()
				{
					$.post("index.php?r='.$p->tag_lcase().'/unfollow&id='.$p->id.'", { sid:'.$model->id.'},
					function(data) 
					{
						if(data=="success")
						{
							$("#unfollow-student-dialog").dialog("close");
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
				'register-unfollow-student-complete',
				'
				$("#btn-unfollow-student-complete").click(function() {
					handleUnunfollowStudentComplete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	<td>
		<div id="btn-unfollow-student-cancel" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  Cancel
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-unfollow-student-cancel',
				'
				function handleUnunfollowStudentCancel()
				{
					$("#unfollow-student-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-unfollow-student-cancel',
				'
				$("#btn-unfollow-student-cancel").click(function() {
					handleUnunfollowStudentCancel();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->