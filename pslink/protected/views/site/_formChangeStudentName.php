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
		<div id="btn-change-student-name-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-name-complete',
				'
				function handleChangeStudentNameComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
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
							
							$("#change-student-name-dialog").dialog("close");
							$("#txt-student-name").html(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-name-complete',
				'
				$("#btn-change-student-name-complete").click(function() {
					handleChangeStudentNameComplete();
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