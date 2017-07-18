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
		<div id="btn-follow-professor-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-follow-professor-complete',
				'
				function handleFollow'.$p->tag_ucase().'Complete()
				{
					$.post("index.php?r='.$p->tag_lcase().'/follow&id='.$p->id.'", { pid:'.$model->id.'},
					function(data) 
					{
						if(data=="success")
						{
							$("#follow-professor-dialog").dialog("close");
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
				'register-follow-professor-complete',
				'
				$("#btn-follow-professor-complete").click(function() {
					handleFollow'.$p->tag_ucase().'Complete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	<td>
		<div id="btn-follow-professor-cancel" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  Cancel
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-follow-professor-cancel',
				'
				function handleFollow'.$p->tag_ucase().'Cancel()
				{
					$("#follow-professor-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-follow-professor-cancel',
				'
				$("#btn-follow-professor-cancel").click(function() {
					handleFollow'.$p->tag_ucase().'Cancel();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->