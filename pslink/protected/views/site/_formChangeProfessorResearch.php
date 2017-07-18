<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('research interest', 'research interest'); ?></td>
	</tr>
	<tr>
	<td>
	<?php echo CHtml::textArea('partial_research', '', array('rows'=>6, 'cols'=>50)); ?>
	</td>
	</tr>
	
	
	 <tr>
	 <td>
		<div id="btn-change-professor-research-interest-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-research-interest-complete',
				'
				function handleChangeProfessorResearchInterestComplete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_research:$("#partial_research").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-research-dialog").dialog("close");
							$("#txt-professor-research").html(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-research-interest-complete',
				'
				$("#btn-change-professor-research-interest-complete").click(function() {
					handleChangeProfessorResearchInterestComplete();
				});
				$("#partial_research").val("'.$model->research.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->