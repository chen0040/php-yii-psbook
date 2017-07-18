<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('first name', 'first name'); ?></td>
	<td><?php echo CHtml::textField('partial_first_name'); ?></td>
	</tr>
	
	<tr>
	<td><?php echo CHtml::label('last name', 'last name'); ?></td>
	<td><?php echo CHtml::textField('partial_last_name'); ?></td>
	</tr>
	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-professor-name-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-name-complete',
				'
				function handleChangeProfessorNameComplete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_first_name:$("#partial_first_name").val(),
						partial_last_name:$("#partial_last_name").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-name-dialog").dialog("close");
							$("#txt-professor-name").html(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-name-complete',
				'
				$("#btn-change-professor-name-complete").click(function() {
					handleChangeProfessorNameComplete();
				});
				$("#partial_first_name").val("'.$model->first_name.'");
				$("#partial_last_name").val("'.$model->last_name.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->