<div class="form">
	
	<table>
	
	<tr>
		<td><?php echo CHtml::label('title','title'); ?></td>
		<td><?php echo CHtml::textField('add_student_article_title'); ?></td>
	</tr>

	<tr>
		<td><?php echo CHtml::label('journal','journal'); ?></td>
		<td><?php echo CHtml::textField('add_student_article_journal'); ?></td>
	</tr>

	<tr>
		<td><?php echo CHtml::label('pages','pages'); ?></td>
		<td><?php echo CHtml::textField('add_student_article_pages'); ?></td>
	</tr>

	<tr>
		<td><?php echo CHtml::label('publish year (integer)','publish year'); ?></td>
		<td><?php echo CHtml::textField('add_student_article_publish_year'); ?></td>
	</tr>

	<tr>
		<td colspan="2"><?php echo CHtml::label('note','note'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo CHtml::textArea('add_student_article_note', '', array('rows'=>6, 'cols'=>50)); ?></td>
	</tr>

	<tr>
		<td colspan="2"><?php echo CHtml::label('author','author'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo CHtml::textArea('add_student_article_author', '', array('rows'=>6, 'cols'=>50)); ?></td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		<div id="btn-add-student-research-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-add-student-research-complete',
				'
				function handleAddStudentResearchComplete()
				{
					$.post("index.php?r=student/addArticle&id='.$model->id.'", 
					{ 
						add_student_article_title:$("#add_student_article_title").val(),
						add_student_article_journal:$("#add_student_article_journal").val(),
						add_student_article_pages:$("#add_student_article_pages").val(),
						add_student_article_publish_year:$("#add_student_article_publish_year").val(),
						add_student_article_note:$("#add_student_article_note").val(),
						add_student_article_author:$("#add_student_article_author").val(),
					},
					function(data) 
					{
						if(data.status=="failure")
						{
							alert(data.error);
						}
						else
						{
							$("#add-student-research-dialog").dialog("close");
							location.reload();
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-add-student-research-complete',
				'
				$("#btn-add-student-research-complete").click(function() {
					handleAddStudentResearchComplete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->