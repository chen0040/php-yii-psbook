<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('looking for', 'looking for'); ?></td>
	<td><?php echo CHtml::textField('partial_looking_for'); ?></td>
	</tr>	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-student-looking-for-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-looking-for-complete',
				'
				function handleChangeStudentLookingForComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
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
							
							$("#change-student-looking-for-dialog").dialog("close");
							$("#txt-student-looking-for").html(data.looking_for);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-looking-for-complete',
				'
				$("#btn-change-student-looking-for-complete").click(function() {
					handleChangeStudentLookingForComplete();
				});
				$("#partial_looking_for").val("'.$model->looking_for.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->