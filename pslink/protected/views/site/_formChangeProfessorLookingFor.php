<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('looking for', 'looking for'); ?></td>
	<td><?php echo CHtml::textField('partial_looking_for'); ?></td>
	</tr>	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-professor-looking-for-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-looking-for-complete',
				'
				function handleChangeProfessorLookingForComplete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_looking_for:$("#partial_looking_for").val(),
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-looking-for-dialog").dialog("close");
							$("#txt-professor-looking-for").html(data.looking_for);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-looking-for-complete',
				'
				$("#btn-change-professor-looking-for-complete").click(function() {
					handleChangeProfessorLookingForComplete();
				});
				$("#partial_looking_for").val("'.$model->looking_for.'");
				$("#partial_looking_for").keyup(function(e) {
					if (e.keyCode == 13) {
						//Close dialog and/or submit here...
						handleChangeProfessorLookingForComplete();
					}
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->