<div class="form">	

<?php
$username=$model->first_name.' '.$model->last_name;

$dlg_width=600;
$msg_width=330;

$chat_bubble='width:'.$msg_width.'px;';
$chat_bubble.='margin-left:'.($dlg_width - $msg_width).'px;';
$chat_bubble.='font-size:14px;';
$chat_bubble.='font-weight: 800;';
$chat_bubble.='line-height:1.3em;';
$chat_bubble.='padding:6px;';
$chat_bubble.='position:relative;';
$chat_bubble.='text-align:left;';
$chat_bubble.='background:-webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(90,150,40)), color-stop(0.28, rgb(160,215,60)), color-stop(1, rgb(165,255,69)));';
$chat_bubble.='background:-moz-linear-gradient(center top, rgb(90,150,40) 0%, rgb(160,215,60) 28%, rgb(165,255,69) 100%);';
$chat_bubble.='background-image: -o-linear-gradient(rgb(0,150,40),rgb(165,255,69));';
$chat_bubble.='filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#5A9628\', endColorstr=\'#A5FF45\');';
$chat_bubble.='border:1px solid #38691a;';
$chat_bubble.='-moz-border-radius:10px;';
$chat_bubble.='-webkit-border-radius:10px;';
$chat_bubble.='-o-border-radius:10px;';
$chat_bubble.='border-radius: 10px;';
$chat_bubble.='-webkit-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px';
$chat_bubble.='-o-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px';
$chat_bubble.='-moz-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px; /* FF 3.5+ */';
$chat_bubble.='box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px;';

$chat_bubble_glare='position: absolute;';
$chat_bubble_glare.='top: 0px;';
$chat_bubble_glare.='left: 4px;';
$chat_bubble_glare.='height: 6px;';
$chat_bubble_glare.='width: '.($msg_width+4).'px;';
$chat_bubble_glare.='padding: 6px 0;';
$chat_bubble_glare.='-webkit-border-radius: 10px;';
$chat_bubble_glare.='-moz-border-radius: 10px;';
$chat_bubble_glare.='-o-border-radius: 10px;';
$chat_bubble_glare.='border-radius: 10px;';
$chat_bubble_glare.='background: -moz-linear-gradient(top, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));';
$chat_bubble_glare.='background: -webkit-gradient(linear, 0% 0%, 0% 95%, from(rgba(255, 255, 255, 0.9)), to(rgba(255, 255, 255, 0)));';
$chat_bubble_glare.='filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#E0FFFFFF\', endColorstr=\'#00FFFFFF\');';

$chat_bubble_arrow='border-color: transparent #a5ff45 transparent transparent;';
$chat_bubble_arrow.='border-style: solid;';
$chat_bubble_arrow.='border-width: 6px;';
$chat_bubble_arrow.='height:0;';
$chat_bubble_arrow.='width:0;';
$chat_bubble_arrow.='position:absolute;';
$chat_bubble_arrow.='bottom:-1px;';
$chat_bubble_arrow.='left:-3px;';
$chat_bubble_arrow.='-webkit-transform: rotate(70deg);';
$chat_bubble_arrow.='-moz-transform: rotate(70deg);';
$chat_bubble_arrow.='transform: rotate(70deg);';
$chat_bubble_arrow.='filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);';

$chat_bubble_arrow_border='border-color: transparent #38691a transparent transparent;';
$chat_bubble_arrow_border.='border-style: solid;';
$chat_bubble_arrow_border.='border-width: 6px;';
$chat_bubble_arrow_border.='height:0;';
$chat_bubble_arrow_border.='width:0;';
$chat_bubble_arrow_border.='position:absolute;';
$chat_bubble_arrow_border.='bottom:-3px;';
$chat_bubble_arrow_border.='left:-5px;';
$chat_bubble_arrow_border.='-webkit-transform: rotate(70deg);';
$chat_bubble_arrow_border.='-moz-transform: rotate(70deg);';
$chat_bubble_arrow_border.='filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);';

$chat_bubble2='width:'.$msg_width.'px;';
$chat_bubble2.='margin-left:0px;';
$chat_bubble2.='font-size:14px;';
$chat_bubble2.='font-weight: 800;';
$chat_bubble2.='line-height:1.3em;';
$chat_bubble2.='padding:6px;';
$chat_bubble2.='position:relative;';
$chat_bubble2.='text-align:left;';
$chat_bubble2.='background:-webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(180,180,180)), color-stop(0.28, rgb(190,190,190)), color-stop(1, rgb(240,240,240)));';
$chat_bubble2.='background:-moz-linear-gradient(center top, rgb(180,180,180) 0%, rgb(190,190,190) 28%, rgb(240,240,240) 100%);';
$chat_bubble2.='background-image: -o-linear-gradient(rgb(180,180,180),rgb(240,240,240));';
$chat_bubble2.='filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#999999\', endColorstr=\'#dddddd\');';
$chat_bubble2.='border:1px solid #CCCCCC;';
$chat_bubble2.='-moz-border-radius:10px;';
$chat_bubble2.='-webkit-border-radius:10px;';
$chat_bubble2.='border-radius: 10px;';
$chat_bubble2.='-webkit-box-shadow: rgba(160, 160, 160, 0.7) 2px 4px 5px';
$chat_bubble2.='-moz-box-shadow: rgba(160, 160, 160, 0.7) 2px 4px 5px; /* FF 3.5+ */';
$chat_bubble2.='box-shadow: rgba(160, 160, 160, 0.7) 2px 4px 5px;';

$chat_bubble_glare2='position: absolute;';
$chat_bubble_glare2.='top: 0px;';
$chat_bubble_glare2.='left: 4px;';
$chat_bubble_glare2.='height: 6px;';
$chat_bubble_glare2.='width: '.($msg_width+4).'px;';
$chat_bubble_glare2.='padding: 6px 0;';
$chat_bubble_glare2.='-webkit-border-radius: 10px;';
$chat_bubble_glare2.='-moz-border-radius: 10px;';
$chat_bubble_glare2.='border-radius: 10px;';
$chat_bubble_glare2.='background: -moz-linear-gradient(top, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));';
$chat_bubble_glare2.='background: -webkit-gradient(linear, 0% 0%, 0% 95%, from(rgba(255, 255, 255, 0.9)), to(rgba(255, 255, 255, 0)));';
$chat_bubble_glare2.='filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#E0FFFFFF\', endColorstr=\'#00FFFFFF\');';

$chat_bubble_arrow2='border-color: transparent #dddddd transparent transparent;';
$chat_bubble_arrow2.='border-style: solid;';
$chat_bubble_arrow2.='border-width: 6px;';
$chat_bubble_arrow2.='height:0;';
$chat_bubble_arrow2.='width:0;';
$chat_bubble_arrow2.='position:absolute;';
$chat_bubble_arrow2.='bottom:-1px;';
$chat_bubble_arrow2.='left:-3px;';
$chat_bubble_arrow2.='-webkit-transform: rotate(70deg);';
$chat_bubble_arrow2.='-moz-transform: rotate(70deg);';
$chat_bubble_arrow2.='-o-transform: rotate(70deg);';
$chat_bubble_arrow2.='transform: rotate(70deg);';
$chat_bubble_arrow2.='filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);';

$chat_bubble_arrow_border2='border-color: transparent #999999 transparent transparent;';
$chat_bubble_arrow_border2.='border-style: solid;';
$chat_bubble_arrow_border2.='border-width: 6px;';
$chat_bubble_arrow_border2.='height:0;';
$chat_bubble_arrow_border2.='width:0;';
$chat_bubble_arrow_border2.='position:absolute;';
$chat_bubble_arrow_border2.='bottom:-3px;';
$chat_bubble_arrow_border2.='left:-5px;';
$chat_bubble_arrow_border2.='-webkit-transform: rotate(70deg);';
$chat_bubble_arrow_border2.='-moz-transform: rotate(70deg);';
$chat_bubble_arrow_border2.='filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);';

$user_style=$chat_bubble;
$other_style=$chat_bubble2;
?>

	<input type="hidden" name="message_id" id="message_id" value="0000" />

	<table>
	<tr>
	<td colspan="2"><div class="black"><b><?php echo Yii::t('translation', 'History'); ?>:</b></div></td>
	</tr>
	<tr>
	<td colspan="2">
	<div id="<?php echo $user->tag_lcase().'_conversation'; ?>"></div>
	<?php 
		$cs=Yii::app()->getClientScript();
		$cs->registerCss(
		'css-message-'.$user->tag_lcase().'-conversation',
		'
		div#'.$user->tag_lcase().'_conversation{
		  height: 300px;
		  display:block;
		  overflow: auto;
		}
		/* gray */
		.gray {
			color: #e9e9e9;
			border: solid 1px #555;
			padding: 5px 5px;
			cursor:pointer;
			text-align:center;
			background: #6e6e6e;
			background: -webkit-gradient(linear, left top, left bottom, from(#888), to(#575757));
			background: -moz-linear-gradient(top,  #888,  #575757);
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#888888\', endColorstr=\'#575757\');
		}
		.gray:hover {
			background: #616161;
			background: -webkit-gradient(linear, left top, left bottom, from(#757575), to(#4b4b4b));
			background: -moz-linear-gradient(top,  #757575,  #4b4b4b);
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#757575\', endColorstr=\'#4b4b4b\');
		}
		.gray:active {
			color: #afafaf;
			background: -webkit-gradient(linear, left top, left bottom, from(#575757), to(#888));
			background: -moz-linear-gradient(top,  #575757,  #888);
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#575757\', endColorstr=\'#888888\');
		}
		
		/* black */
		.black {
			color: #d7d7d7;
			border: solid 1px #333;
			padding: 5px 5px;
			background: #333;
			background: -webkit-gradient(linear, left top, left bottom, from(#666), to(#000));
			background: -moz-linear-gradient(top,  #666,  #000);
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#666666\', endColorstr=\'#000000\');
		}
		.black:hover {
			background: #000;
			background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
			background: -moz-linear-gradient(top,  #444,  #000);
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#444444\', endColorstr=\'#000000\');
		}
		.black:active {
			color: #666;
			background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
			background: -moz-linear-gradient(top,  #000,  #444);
			filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#000000\', endColorstr=\'#666666\');
		}
		');
		//echo CHtml::textArea($user->tag_lcase().'_conversation', '', array('rows'=>12, 'cols'=>100)); 
	?>
	</td>
	</tr>
	
	<tr>
	<td colspan="2"><div class="black"><b><?php echo Yii::t('translation', 'Text'); ?>:</b></div></td>
	</tr>
	
	<tr>
	<td colspan="2">
	<?php echo CHtml::textArea($user->tag_lcase().'_message_body', '', array('rows'=>2, 'cols'=>88)); ?>
	</td>
	</tr>
	
	 <tr>
	 <td width="300px">
		<div id="btn-message-<?php echo $user->tag_lcase(); ?>-clear-history-complete" class="gray">
		  Clear Recent History
		</div>
		
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-message-'.$user->tag_lcase().'-clear-history-complete',
				'
				function handleMessage'.$user->tag_ucase().'ClearHistoryComplete()
				{
					$.post("index.php?r='.$user->tag_lcase().'/clearMessages&id='.$user->id.'", { stype:"student", tid:'.$model->id.'},
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
								if(data.messages[i].from=="'.$user->id.'" && data.messages[i].from_type=="'.$user->mtype().'")
								{
									result += ("<div style=\"'.$user_style.'\">");
									result += ("<div style=\"'.$chat_bubble_glare.'\"></div>");
									result += ("me("+data.messages[i].dat+")<br />\n");
									result += ("<div style=\"'.$chat_bubble_arrow_border.'\"></div>");
									result += ("<div style=\"'.$chat_bubble_arrow.'\"></div>");
								}
								else
								{
									result += ("<div style=\"'.$other_style.'\">");
									result += ("<div style=\"'.$chat_bubble_glare2.'\"></div>");
									result += ("'.$username.'("+data.messages[i].dat+")<br />\n");
									result += ("<div style=\"'.$chat_bubble_arrow_border2.'\"></div>");
									result += ("<div style=\"'.$chat_bubble_arrow2.'\"></div>");
								}
								result += (data.messages[i].body+"<br />\n");
								result += ("</div>");
								result += ("<br />\n");
								if(i==0)
								{
									$("#message_id").val(data.messages[i].id);
								}
							}
							$("#'.$user->tag_lcase().'_conversation").html(result);
							$("div.roundbox").corner();
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-message-'.$user->tag_lcase().'-clear-history-complete',
				'
				$("#btn-message-'.$user->tag_lcase().'-clear-history-complete").click(function() {
					handleMessage'.$user->tag_ucase().'ClearHistoryComplete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	 <td width="300px">
		<div id="btn-message-<?php echo $user->tag_lcase(); ?>-complete" class="gray">
		  Send
		</div>
		
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-message-'.$user->tag_lcase().'-complete',
				'
				function handleMessage'.$user->tag_ucase().'Complete()
				{
					$.post("index.php?r='.$user->tag_lcase().'/message&id='.$user->id.'", { stype:"'.$model->tag_lcase().'", tid:'.$model->id.', message_body:$("#'.$user->tag_lcase().'_message_body").val()},
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
								
								if(data.messages[i].from=="'.$user->id.'" && data.messages[i].from_type=="'.$user->mtype().'")
								{
									result += ("<div style=\"'.$user_style.'\">");
									result += ("<div style=\"'.$chat_bubble_glare.'\"></div>");
									result += ("me("+data.messages[i].dat+")<br />\n");
									result += ("<div style=\"'.$chat_bubble_arrow_border.'\"></div>");
									result += ("<div style=\"'.$chat_bubble_arrow.'\"></div>");
								}
								else
								{
									result += ("<div style=\"'.$other_style.'\">");
									result += ("<div style=\"'.$chat_bubble_glare2.'\"></div>");
									result += ("'.$username.'("+data.messages[i].dat+")<br />\n");
									result += ("<div style=\"'.$chat_bubble_arrow_border2.'\"></div>");
									result += ("<div style=\"'.$chat_bubble_arrow2.'\"></div>");
								}
								result += (data.messages[i].body+"<br />\n");
								result += ("</div>");
								result += ("<br />\n");
								
								if(i==0)
								{
									$("#message_id").val(data.messages[i].id);
								}
							}
							$("#'.$user->tag_lcase().'_conversation").html(result);
							$("div.roundbox").corner();
							$("#'.$user->tag_lcase().'_message_body").val("");
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-message-'.$user->tag_lcase().'-complete',
				'
				$("#btn-message-'.$user->tag_lcase().'-complete").click(function() {
					handleMessage'.$user->tag_ucase().'Complete();
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
		//style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px"
		?>
		<div id="btn-message-<?php echo $user->tag_lcase(); ?>-refresh-history-complete" class="gray">
		  Refresh History
		</div>
		<?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-message-'.$user->tag_lcase().'-refresh-history-complete',
				'
				function handleMessage'.$user->tag_ucase().'RefreshHistoryComplete()
				{
					$.post("index.php?r='.$user->tag_lcase().'/showMessages&id='.$user->id.'", { stype:"student", tid:'.$model->id.'},
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
								if(data.messages[i].from=="'.$user->id.'" && data.messages[i].from_type=="'.$user->mtype().'")
								{
									result += ("<div style=\"'.$user_style.'\">");
									result += ("<div style=\"'.$chat_bubble_glare.'\"></div>");
									result += ("me("+data.messages[i].dat+")<br />\n");
									result += ("<div style=\"'.$chat_bubble_arrow_border.'\"></div>");
									result += ("<div style=\"'.$chat_bubble_arrow.'\"></div>");
								}
								else
								{
									result += ("<div style=\"'.$other_style.'\">");
									result += ("<div style=\"'.$chat_bubble_glare2.'\"></div>");
									result += ("'.$username.'("+data.messages[i].dat+")<br />\n");
									result += ("<div style=\"'.$chat_bubble_arrow_border2.'\"></div>");
									result += ("<div style=\"'.$chat_bubble_arrow2.'\"></div>");
								}
								result += (data.messages[i].body+"<br />\n");
								result += ("</div>");
								result += ("<br />\n");
								if(i==0)
								{
									$("#message_id").val(data.messages[i].id);
								}
							}
							$("#'.$user->tag_lcase().'_conversation").html(result);
							$("div.roundbox").corner();
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-message-'.$user->tag_lcase().'-refresh-history-complete',
				'
				$("#btn-message-'.$user->tag_lcase().'-refresh-history-complete").click(function() {
					handleMessage'.$user->tag_ucase().'RefreshHistoryComplete();
				});
				',
				CClientScript::POS_READY
			);
		?>
		</td>
	<td>
		<div id="btn-message-<?php echo $user->tag_lcase(); ?>-cancel" class="gray">
		  Close
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jquery.corner.js');
			$cs->registerScript(
				'handle-message-'.$user->tag_lcase().'-cancel',
				'
				function handleMessage'.$user->tag_ucase().'Cancel()
				{
					$("#message-'.$user->tag_lcase().'-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$messages=$user->getMessagesToStudent($model->id);
			$chtml='';
			$msg_id='';
			foreach($messages as $msg)
			{
				if($msg_id==='')
				{
					$msg_id=$msg->id;
				}
				if($msg->from_id==$user->id && $msg->from_type==$user->mtype())
				{
					$chtml.='<div style=\"'.$user_style.'\">';

					$chtml.='<div style=\"'.$chat_bubble_glare.'\"></div>';
					$chtml.='<p>me('.$msg->text_date.')<br />\n'.$msg->text_message.'<br />\n</p>';
					$chtml.='<div style=\"'.$chat_bubble_arrow_border.'\"></div>';
					$chtml.='<div style=\"'.$chat_bubble_arrow.'\"></div>';
				}
				else
				{
					$chtml.='<div style=\"'.$other_style.'\">';
					if($msg->text_type==0)
					{
						$chtml.='<div style=\"'.$chat_bubble_glare2.'\"></div>';
						$chtml.=$username.'('.$msg->text_date.')<br />\n'.$msg->text_message.'<br />\n';
						$chtml.='<div style=\"'.$chat_bubble_arrow_border2.'\"></div>';
						$chtml.='<div style=\"'.$chat_bubble_arrow2.'\"></div>';
					}
					else
					{
						$chtml.='<div style=\"'.$chat_bubble_glare2.'\"></div>';
						$chtml.=$username.'('.$msg->text_date.')<br />\n'.$msg->text_message.'<br />\n';
						$chtml.='<div style=\"'.$chat_bubble_arrow_border2.'\"></div>';
						$chtml.='<div style=\"'.$chat_bubble_arrow2.'\"></div>';
					}
				}
				$chtml.='</div>';
				$chtml.='<br />\n';
			}
			$chtml.='';
			$cs->registerScript(
				'register-message-'.$user->tag_lcase().'-cancel',
				'
				$("#btn-message-'.$user->tag_lcase().'-cancel").click(function() {
					handleMessage'.$user->tag_ucase().'Cancel();
				});
				$("#'.$user->tag_lcase().'_conversation").html("'.$chtml.'");
				$("div.roundbox").corner();
				$("div.gray").corner();
				$("div.black").corner();
				$("#message_id").val("'.$msg_id.'");
				window.setInterval(handleMessage'.$user->tag_ucase().'RefreshHistoryComplete, 10000);
				',
				
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->