<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('email', 'email'); ?></td>
	<td><?php echo CHtml::textField('partial_email1'); ?></td>
	</tr>	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-professor-email1-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-email1-complete',
				'
				function handleChangeProfessorEmail1Complete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_email1:$("#partial_email1").val(),
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-email1-dialog").dialog("close");
							$("#txt-professor-email1").html(data.email1);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-email1-complete',
				'
				$("#btn-change-professor-email1-complete").click(function() {
					handleChangeProfessorEmail1Complete();
				});
				$("#partial_email1").val("'.$model->email1.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->