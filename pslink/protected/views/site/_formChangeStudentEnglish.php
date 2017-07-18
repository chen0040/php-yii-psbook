<div class="form">
	
	<table>
	
	<tr>
	<td><?php echo CHtml::label('tofle score', 'tofle score'); ?></td>
	<td><?php echo CHtml::textField('partial_tofle_score'); ?></td>
	</tr>
	
	<tr>
	<td><?php echo CHtml::label('gre score', 'gre score'); ?></td>
	<td><?php echo CHtml::textField('partial_gre_score'); ?></td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-student-english-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-english-complete',
				'
				function handleChangeStudentEnglishComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
					{ 
						partial_tofle_score:$("#partial_tofle_score").val(),
						partial_gre_score:$("#partial_gre_score").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							$("#change-student-english-dialog").dialog("close");
							$("#txt-student-gre-score").html(data.gre_score);
							$("#txt-student-tofle-score").html(data.tofle_score);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-english-complete',
				'
				$("#btn-change-student-english-complete").click(function() {
					handleChangeStudentEnglishComplete();
				});
				$("#partial_tofle_score").val("'.$model->tofle_score.'");
				$("#partial_gre_score").val("'.$model->gre_score.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->