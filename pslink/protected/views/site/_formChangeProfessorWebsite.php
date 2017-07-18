<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('website', 'website'); ?></td>
	<td><?php echo CHtml::textField('partial_email2'); ?></td>
	</tr>	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-professor-email2-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-email2-complete',
				'
				function handleChangeProfessorEmail2Complete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_email2:$("#partial_email2").val(),
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-email2-dialog").dialog("close");
							$("#txt-professor-email2").html(data.email2);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-email2-complete',
				'
				$("#btn-change-professor-email2-complete").click(function() {
					handleChangeProfessorEmail2Complete();
				});
				$("#partial_email2").val("'.$model->email2.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->