<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('research interest', 'research interest'); ?></td>
	</tr>
	<tr>
	<td>
	<?php echo CHtml::textArea('partial_proposed_research_topic', '', array('rows'=>6, 'cols'=>50)); ?>
	</td>
	</tr>
	
	
	 <tr>
	 <td>
		<div id="btn-change-student-research-interest-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-research-interest-complete',
				'
				function handleChangeStudentResearchInterestComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
					{ 
						partial_proposed_research_topic:$("#partial_proposed_research_topic").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-student-research-dialog").dialog("close");
							$("#txt-student-research").html(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-research-interest-complete',
				'
				$("#btn-change-student-research-interest-complete").click(function() {
					handleChangeStudentResearchInterestComplete();
				});
				$("#partial_proposed_research_topic").val("'.$model->proposed_research_topic.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->