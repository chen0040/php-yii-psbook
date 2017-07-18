<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('gpa score', 'gpa score'); ?></td>
	<td><?php echo CHtml::textField('partial_gpa_score'); ?></td>
	</tr>
	
	<tr>
	<td><?php echo CHtml::label('degree', 'degree'); ?></td>
	<td><?php echo CHtml::dropDownList('partial_degree', 0, CHtml::listData(EducationLevel::model()->findAll(), 'id', 'education_level_name')); ?></td>
	</tr>
	
	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-student-education-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-student-education-complete',
				'
				function handleChangeStudentEducationComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
					{ 
						partial_gpa_score:$("#partial_gpa_score").val(),
						partial_degree:$("#partial_degree").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-student-education-dialog").dialog("close");
							$("#txt-student-degree").html(data.degree);
							$("#txt-student-degree-school-name").html(data.schoolname);
							$("#txt-student-gpa-score").html(data.gpa_score);
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-education-complete',
				'
				$("#btn-change-student-education-complete").click(function() {
					handleChangeStudentEducationComplete();
				});
				$("#partial_gpa_score").val("'.$model->gpa_score.'");
				$("#partial_degree").val("'.$model->education_level_id.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->