<div class="form">	

<?php
$loginType='NA';
$p=null;
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
?>
	<table>
	
	 <tr>
	 <td>
		<div id="btn-monitor-professor-unread-messages-dismiss" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  Dismiss
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-monitor-professor-unread-messages-dismiss',
				'
				function handleMonitorProfessorUnreadMessagesDismiss()
				{
					$.post("index.php?r=professor/dismissUnreadMessages&id='.$p->id.'", { },
					function(data) 
					{
						if(data=="success")
						{
							$("#show-professor-unread-messages-dialog").dialog("close");
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
				'register-monitor-professor-unread-messages-dismiss',
				'
				$("#btn-monitor-professor-unread-messages-dismiss").click(function() {
					handleMonitorProfessorUnreadMessagesDismiss();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	<td>
	<div id="btn-monitor-professor-unread-messages-cancel" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  Close
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-monitor-professor-unread-messages-cancel',
				'
				function handleMonitorProfessorUnreadMessagesCancel()
				{
					$("#show-professor-unread-messages-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-monitor-professor-unread-messages-cancel',
				'
				$("#btn-monitor-professor-unread-messages-cancel").click(function() {
					handleMonitorProfessorUnreadMessagesCancel();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	</tr>
	<tr>
	<td>
		<?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-monitor-professor-unread-messages-complete',
				'
				function handleMonitorProfessorUnreadMessagesComplete()
				{
					$.post("index.php?r=professor/showUnreadMessages&id='.$p->id.'", { },
					function(data) 
					{
						if(data.status=="failure")
						{
							alert(data.error);
						}
						else
						{
							var msg_count=data.messages.length;
							var result="";
							for(var i=0; i < msg_count; ++i)
							{
								var following="";
								if(data.messages[i].from_type==0)
								{
									if(data.messages[i].following=="1")
									{
										following="(following)";
									}
									result += ("<a href=\"index.php?r=student/view&id="+data.messages[i].from+"&open_msg=1\">From Student: "+data.messages[i].sendby+"</a><br />");
								}
								else
								{
									result += ("<a href=\"index.php?r=professor/view&id="+data.messages[i].from+"&open_msg=1\">From Professor "+data.messages[i].sendby+"</a><br />");
								}
								result += "("+data.messages[i].dat+")"+following+"<br />";
								result += (data.messages[i].body+"<br />");
								result += ("<br />");
							}
							$("#professor_unread_conversation").html(result);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-monitor-professor-unread-messages-complete',
				'
				window.setInterval(handleMonitorProfessorUnreadMessagesComplete, 10000);
				handleMonitorProfessorUnreadMessagesComplete();
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
		<tr>
	<td colspan="2">
	<span id="professor_unread_conversation" style="width:800px"></span>
	</td>
	</tr>
	
	</table>

</div><!-- form -->