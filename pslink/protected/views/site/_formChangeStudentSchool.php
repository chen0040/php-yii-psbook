<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('school', 'school'); ?></td>
	<td>
	<?php
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'School',
		'value'=>$model->highest_education_school,
		'source'=>Yii::app()->schoolService->getSchools(),
		'options'=>array(
			'minLength'=>'1', // min chars to start search
			'select'=>'js:function(event, ui) { console.log(ui.item.id +":"+ui.item.value); }'
		),
		'htmlOptions'=>array(
			'id'=>'partial_highest_education_school',
			'rel'=>'val',
			'size'=>'64',
		),
	));
	?>
	</td>
	<td>
	<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-student-school-dialog',
			'options'=>array(
				'title'=>'Select Student School',
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formSelectStudentSchool', array('model'=>$model)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');
		echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'edit.png', "Edit", array('style'=>'vertical-align:middle;')), '#', array(
		   'onclick'=>'$("#select-student-school-dialog").dialog("open"); return false;', 
		));
	?>
	</td>
	</tr>
	
	 <tr>
	 <td colspan="3">
		<div id="btn-change-student-school-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			
			$cs->registerScript(
				'handle-change-student-school-complete',
				'
				function handleChangeStudentSchoolComplete()
				{
					$.post("index.php?r=student/updatePartial&id='.$model->id.'", 
					{ 
						partial_highest_education_school:$("#partial_highest_education_school").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-student-school-dialog").dialog("close");
							$("#txt-student-school").html(data);
							$("#txt-student-school2").html(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-student-school-complete',
				'
				$("#btn-change-student-school-complete").click(function() {
					handleChangeStudentSchoolComplete();
				});
				$("#partial_highest_education_school").val("'.$model->highest_education_school.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->