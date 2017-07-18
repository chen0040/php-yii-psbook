<div class="form">
	<table>
	
	<tr>
	<td><?php echo CHtml::label('requirements', 'requirements'); ?></td>
	</tr>
	<tr>
	<td>
	<?php echo CHtml::textArea('partial_requirements', '', array('rows'=>6, 'cols'=>50)); ?>
	</td>
	</tr>
	
	
	
	 <tr>
	 <td>
		<div id="btn-change-professor-requirements-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-requirements-complete',
				'
				function handleChangeProfessorRequirementsComplete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_requirements:$("#partial_requirements").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							$("#change-professor-requirements-dialog").dialog("close");
							$("#txt-professor-requirements").html(data.requirements);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$req=str_replace("\r","",$model->requirements);
			$req=str_replace("\n", "\\n", $req);
			
			$cs->registerScript(
				'register-change-professor-requirements-complete',
				'
				$("#btn-change-professor-requirements-complete").click(function() {
					handleChangeProfessorRequirementsComplete();
				});
				$("#partial_requirements").val("'.$req.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->