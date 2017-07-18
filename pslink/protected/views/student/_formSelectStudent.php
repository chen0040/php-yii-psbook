<div class="form">
	
	<table>
	<tr>
	<td colspan="2" style="background-color:#333000;color:white;"><b><?php echo Yii::t('translation', 'Student Recipient Entry'); ?></b></td>
	</tr>
	<tr>
	<td colspan="2">
	<div id="select_student_recipient_fields" style="width:600px;max-width:600px;height:600px;display:block;overflow: auto;">
	<table>
	<?php							
	$rf_all=Messages::model()->findAll('from_id=? AND text_type=3 AND from_type=? AND to_type=0', array($user->id, $user->mtype()));
	echo '<tr><td width="20px"></td><td><b>Name</b></td><td><b>School</b></td><td><b>Email</b></td><td></td></tr>';
	foreach($rf_all as $rf)
	{
		$student=Student::model()->findByPk($rf->to_id);
		if(isset($student))
		{
			echo '<tr>';
			echo '<td width="20px"><img src="'.Yii::app()->theme->baseUrl.'/images/arrow.png" /></td>';
			echo '<td>';
			echo $student->first_name.' '.$student->last_name;
			echo '</td>';
			echo '<td>'.$student->getSchool()->getInstituteDesc().'</td>';
			echo '<td>'.$student->getEmail().'</td>';
			echo '<td>';
			echo '<a href="#" onclick="handleSelectStudentRecipientEntryUpdate(&quot;'.$student->id.'&quot;, &quot;'.$student->first_name.' '.$student->last_name.'&quot;, &quot;'.$student->getSchool()->getInstituteDesc().'&quot;, &quot;'.$student->getEmail().'&quot;); return false;">Select Student</a>';
			echo '</td>';
			echo '</tr>';
		}
	}
	?>
	</table>
	</div>
	</td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		
        <?php 
			
			$cs=Yii::app()->getClientScript();
			
			$cs->registerScript(
				'handle-select-student-recipient-entry-complete',
				'
				function handleSelectStudentRecipientEntryUpdate(recommend_to_id, recommend_to_name, recommend_to_school, recommend_to_email)
				{
					$("#recommend_to_id").val(recommend_to_id);
					$("#recommend_to_name").val(recommend_to_name);
					$("#recommend_to_type").val("0");
					$("#recommend_to_type_text").html("Student");
					$("#recommend_to_email").val(recommend_to_email);
					$("#recommend_to_school").val(recommend_to_school);
					$("#select-student-recepient-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-select-student-recipient-entry-complete',
				'
				
				',
				CClientScript::POS_READY
			);
			
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->