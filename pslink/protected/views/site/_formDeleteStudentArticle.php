<div class="form">
	
	<table>
	<tr>
		<td colspan="2">Proceed to delete Article titled "<?php echo $title; ?>"?</td>
	</tr>
	 <tr>
	 <td>
		<div id="btn-delete-student-article-<?php echo $model_rkey; ?>-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-delete-student-article-'.$model_rkey.'-complete',
				'
				function handleDeleteStudentArticle'.$model_rkey.'Complete()
				{
					$.post("index.php?r=student/deleteArticle&id='.$model_rkey.'", 
					{ 
						
					},
					function(data) 
					{
						if(data.status=="failure")
						{
							alert(data.error);
						}
						else
						{
							
							$("#delete-student-article-dialog-'.$model_rkey.'").dialog("close");
							location.reload();
						}
				   },
				   "json");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-delete-student-article-'.$model_rkey.'-complete',
				'
				$("#btn-delete-student-article-'.$model_rkey.'-complete").click(function() {
					handleDeleteStudentArticle'.$model_rkey.'Complete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
	<td>
		<div id="btn-delete-student-article-<?php echo $model_rkey; ?>-cancel" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  Cancel
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-delete-student-article-'.$model_rkey.'-cancel',
				'
				function handleDeleteStudentArticle'.$model_rkey.'Cancel()
				{
					$("#delete-student-article-dialog-'.$model_rkey.'").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-delete-student-article-'.$model_rkey.'-cancel',
				'
				$("#btn-delete-student-article-'.$model_rkey.'-cancel").click(function() {
					handleDeleteStudentArticle'.$model_rkey.'Cancel();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->