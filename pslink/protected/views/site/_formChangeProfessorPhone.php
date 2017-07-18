<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('phone', 'phone'); ?></td>
	<td><?php echo CHtml::textField('partial_phone1'); ?></td>
	</tr>	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-professor-phone1-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-phone1-complete',
				'
				function handleChangeProfessorPhone1Complete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_phone1:$("#partial_phone1").val(),
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-phone1-dialog").dialog("close");
							$("#txt-professor-phone1").html(data.phone1);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-phone1-complete',
				'
				$("#btn-change-professor-phone1-complete").click(function() {
					handleChangeProfessorPhone1Complete();
				});
				$("#partial_phone1").val("'.$model->phone1.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->