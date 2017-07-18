<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('email', 'email'); ?></td>
	<td><?php echo CHtml::textField('partial_email1'); ?></td>
	</tr>	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-student-email1-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-email1-complete',
				'
				function handleChangeStudentEmail1Complete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
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
							
							$("#change-student-email1-dialog").dialog("close");
							$("#txt-student-email1").html(data.email1);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-email1-complete',
				'
				$("#btn-change-student-email1-complete").click(function() {
					handleChangeStudentEmail1Complete();
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