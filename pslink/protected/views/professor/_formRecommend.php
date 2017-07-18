<div class="form">	

<?php
$dlg_width=600;
$msg_width=330;

$username=$model->first_name.' '.$model->last_name;

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
$chat_bubble.='border:1px solid #38691a;';
$chat_bubble.='-moz-border-radius:10px;';
$chat_bubble.='-webkit-border-radius:10px;';
$chat_bubble.='border-radius: 10px;';
$chat_bubble.='-webkit-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px';
$chat_bubble.='-moz-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px; /* FF 3.5+ */';
$chat_bubble.='box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px;';

$chat_bubble_glare='position: absolute;	top: 0px;	left: 4px;	height: 6px;	width: '.($msg_width+4).'px;	padding: 6px 0;        -webkit-border-radius: 10px;	-moz-border-radius: 10px;        border-radius: 10px;	background: -moz-linear-gradient(top, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));	background: -webkit-gradient(linear, 0% 0%, 0% 95%, from(rgba(255, 255, 255, 0.9)), to(rgba(255, 255, 255, 0)));';
$chat_bubble_arrow='border-color: transparent #a5ff45 transparent transparent;	border-style: solid;	border-width: 6px;        height:0;	width:0;	position:absolute;	bottom:-1px;	left:-3px;	-webkit-transform: rotate(70deg);	-moz-transform: rotate(70deg);        transform: rotate(70deg);';
$chat_bubble_arrow_border='border-color: transparent #38691a transparent transparent;	border-style: solid;	border-width: 6px;	height:0;	width:0;	position:absolute;	bottom:-3px;	left:-5px;	-webkit-transform: rotate(70deg);	-moz-transform: rotate(70deg);';

$chat_bubble2='width:'.$msg_width.'px;';
$chat_bubble2.='margin-left:'.($dlg_width - $msg_width).'px;';
$chat_bubble2.='font-size:14px;';
$chat_bubble2.='font-weight: 800;';
$chat_bubble2.='line-height:1.3em;';
$chat_bubble2.='padding:6px;';
$chat_bubble2.='position:relative;';
$chat_bubble2.='text-align:left;';
$chat_bubble2.='background:-webkit-gradient(linear, left top, left bottom, color-stop(0, rgb(90,150,40)), color-stop(0.28, rgb(160,215,60)), color-stop(1, rgb(165,255,69)));';
$chat_bubble2.='background:-moz-linear-gradient(center top, rgb(90,150,40) 0%, rgb(160,215,60) 28%, rgb(165,255,69) 100%);';
$chat_bubble2.='border:1px solid #38691a;';
$chat_bubble2.='-moz-border-radius:10px;';
$chat_bubble2.='-webkit-border-radius:10px;';
$chat_bubble2.='border-radius: 10px;';
$chat_bubble2.='-webkit-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px';
$chat_bubble2.='-moz-box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px; /* FF 3.5+ */';
$chat_bubble2.='box-shadow: rgba(160, 215, 60, 0.7) 2px 4px 5px;';

$chat_bubble_glare2='position: absolute;	top: 0px;	left: 4px;	height: 6px;	width: '.($msg_width+4).'px;	padding: 6px 0;        -webkit-border-radius: 10px;	-moz-border-radius: 10px;        border-radius: 10px;	background: -moz-linear-gradient(top, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));	background: -webkit-gradient(linear, 0% 0%, 0% 95%, from(rgba(255, 255, 255, 0.9)), to(rgba(255, 255, 255, 0)));';
$chat_bubble_arrow2='border-color: transparent #a5ff45 transparent transparent;	border-style: solid;	border-width: 6px;        height:0;	width:0;	position:absolute;	bottom:-1px;	left:-3px;	-webkit-transform: rotate(70deg);	-moz-transform: rotate(70deg);        transform: rotate(70deg);';
$chat_bubble_arrow_border2='border-color: transparent #38691a transparent transparent;	border-style: solid;	border-width: 6px;	height:0;	width:0;	position:absolute;	bottom:-3px;	left:-5px;	-webkit-transform: rotate(70deg);	-moz-transform: rotate(70deg);';


$me_style=$chat_bubble;
$other_style=$chat_bubble2;

$cs=Yii::app()->getClientScript();
$cs->registerCss(
'css-recommend-'.$user->tag_lcase().'-conversation',
'
div#'.$user->tag_lcase().'_conversation{
  width: '.($dlg_width+40).'px;
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
?>

	<table>
	<tr>
	<td colspan="2"><div class="black"><b><?php echo Yii::t('translation', 'Recommended to'); ?>:</b></div></td>
	</tr>
	<tr>
	<td colspan="2">
	<input type="hidden" name="recommend_to_id" id="recommend_to_id" value="" />
	<span id="recommend_to_type_text">Name</span>: <input type="text" name="recommend_to_name" id="recommend_to_name" value="" />
	<input type="text" name="recommend_to_school" id="recommend_to_school" value="" />
	<input type="text" name="recommend_to_email" id="recommend_to_email" value="" />
	<input type="hidden" name="recommend_to_type" id="recommend_to_type" value="" />
	</td>
	</tr>
	<tr>
	<td>
	<div id="btn-select-student-recepient" class="gray">
		Select Student
	</div>
	<?php
	if(isset($user))
	{
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-student-recepient-dialog',
			'options'=>array(
				'title'=>'Select Student',
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formSelectStudent', array('model'=>$model, 'user'=>$user)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');

		$cs=Yii::app()->getClientScript();
		$cs->registerScript(
			'register-select-student-recepient',
			'
			$("#btn-select-student-recepient").click(function() {
				$("#select-student-recepient-dialog").dialog("open");
			});
			',
			
			CClientScript::POS_READY
		);
	}
	?>
	</td>
	<td>
	<div id="btn-select-professor-recepient" class="gray">
		Select Professor
	</div>
	<?php
	if(isset($user))
	{
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-professor-recepient-dialog',
			'options'=>array(
				'title'=>'Select Professor',
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formSelectProfessor', array('model'=>$model, 'user'=>$user)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');

		$cs=Yii::app()->getClientScript();
		$cs->registerScript(
			'register-select-professor-recepient',
			'
			$("#btn-select-professor-recepient").click(function() {
				$("#select-professor-recepient-dialog").dialog("open");
			});
			',
			
			CClientScript::POS_READY
		);
	}
	?>
	</td>
	</tr>
	
	<tr>
	<td colspan="2"><div class="black"><b><?php echo Yii::t('translation', 'Text'); ?>:</b></div></td>
	</tr>
	
	<tr>
	<td colspan="2">
	<?php echo CHtml::textArea($user->tag_lcase().'_recommend_body', '', array('rows'=>4, 'cols'=>88)); ?>
	</td>
	</tr>
	
	 <tr>
	 <td width="300px">
		<div id="btn-recommend-<?php echo $user->tag_lcase(); ?>-complete" class="gray">
		  Start to Recommend
		</div>
		
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-recommend-'.$user->tag_lcase().'-complete',
				'
				function handleRecommend'.$user->tag_ucase().'Complete()
				{
					var recommend_body_val=$("#'.$user->tag_lcase().'_recommend_body").val();
					var to_type_val=$("#recommend_to_type").val();
					var to_id_val=$("#recommend_to_id").val();
					
					if(to_id_val=="")
					{
						alert("Please select a person to whom you will recommend '.$username.'");
					}
					else if(recommend_body_val=="")
					{
						alert("Please write a note with which you will recommend '.$username.'");
					}
					else
					{
						$.post("index.php?r='.$user->tag_lcase().'/recommend&id='.$user->id.'", 
						{ subject_type:'.$model->mtype().', subject_id:'.$model->id.', to_type:to_type_val, to_id:to_id_val, recommend_body:recommend_body_val},
						function(data) 
						{
							if(data.status=="failure")
							{
								alert(data.error);
							}
							else
							{
								//alert("subject_id:"+data.subject_id);
								//alert("subject_type:"+data.subject_type);
								//alert("to_id:"+data.to_id);
								//alert("to_type:"+data.to_type);
								//alert("recommend_body:"+data.recommend_body);
								
								$("#recommend-'.$user->tag_lcase().'-dialog").dialog("close");
							}
					   },
					   "json");
					}
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-recommend-'.$user->tag_lcase().'-complete',
				'
				$("#btn-recommend-'.$user->tag_lcase().'-complete").click(function() {
					handleRecommend'.$user->tag_ucase().'Complete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	<td>
		<div id="btn-recommend-<?php echo $user->tag_lcase(); ?>-cancel" class="gray">
		  Close
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScriptFile(Yii::app()->baseUrl.'/scripts/jquery.corner.js');
			$cs->registerScript(
				'handle-recommend-'.$user->tag_lcase().'-cancel',
				'
				function handleRecommend'.$user->tag_ucase().'Cancel()
				{
					$("#recommend-'.$user->tag_lcase().'-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			
			
			$cs->registerScript(
				'register-recommend-'.$user->tag_lcase().'-cancel',
				'
				$("#btn-recommend-'.$user->tag_lcase().'-cancel").click(function() {
					handleRecommend'.$user->tag_ucase().'Cancel();
				});
				$("div.roundbox").corner();
				$("div.gray").corner();
				$("div.black").corner();
				',
				
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->