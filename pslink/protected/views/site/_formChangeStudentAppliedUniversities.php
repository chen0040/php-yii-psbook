<div class="form">
	
	<table>
	
	<tr>
	<td><?php echo CHtml::label('universities applied', 'universities applied'); ?></td>
	</tr>
	<tr>
	<td>
	<?php echo CHtml::textArea('partial_universities_applied', '', array('rows'=>6, 'cols'=>50)); ?>
	</td>
	</tr>
	
	 <tr>
	 <td>
		<div id="btn-change-student-applied-universities-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-applied-universities-complete',
				'
				function handleChangeStudentAppliedUniversitiesComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
					{ 
						partial_universities_applied:$("#partial_universities_applied").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							$("#change-student-applied-universities-dialog").dialog("close");
							$("#txt-student-universities_applied").html(data.universities_applied);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-applied-universities-complete',
				'
				$("#btn-change-student-applied-universities-complete").click(function() {
					handleChangeStudentAppliedUniversitiesComplete();
				});
				$("#partial_universities_applied").val("'.$model->universities_applied.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->