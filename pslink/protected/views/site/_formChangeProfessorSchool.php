<div class="form">
	
	<table>
	<tr>
	<td><?php echo CHtml::label('school', 'school'); ?></td>
	<td>
	<?php 
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'School',
		'value'=>$model->university,
		'source'=>Yii::app()->schoolService->getSchools(),
		'options'=>array(
			'minLength'=>'1', // min chars to start search
			'select'=>'js:function(event, ui) { console.log(ui.item.id +":"+ui.item.value); }'
		),
		'htmlOptions'=>array(
			'id'=>'partial_university',
			'rel'=>'val',
			'size'=>'64',
		),
	));
	?>
	</td>
	<td>
	<?php
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'select-professor-school-dialog',
			'options'=>array(
				'title'=>'Select Professor School',
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formSelectProfessorSchool', array('model'=>$model)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');
		echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'edit.png', "Edit", array('style'=>'vertical-align:middle;')), '#', array(
		   'onclick'=>'$("#select-professor-school-dialog").dialog("open"); return false;', 
		));
	?>
	</td>
	</tr>
	
	
	 <tr>
	 <td colspan="3">
		<div id="btn-change-professor-school-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-professor-school-complete',
				'
				function handleChangeProfessorSchoolComplete()
				{
					$.post("index.php?r=professor/updatePartial&id='.$model->id.'", 
					{ 
						partial_university:$("#partial_university").val()
					},
					function(data) 
					{
						if(data=="failure")
						{
							alert(data);
						}
						else
						{
							
							$("#change-professor-school-dialog").dialog("close");
							$("#txt-professor-school").html(data);
							$("#txt-professor-school2").html(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-professor-school-complete',
				'
				$("#btn-change-professor-school-complete").click(function() {
					handleChangeProfessorSchoolComplete();
				});
				$("#partial_university").val("'.$model->university.'");
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->