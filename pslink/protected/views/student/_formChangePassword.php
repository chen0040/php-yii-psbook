<div class="form">	
	<table>
	<tr>
	<td><?php echo CHtml::label('password', 'password'); ?></td>
	<td><?php echo CHtml::passwordField('partial_password'); ?></td>
	</tr>
	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-<?php echo $model->tag_lcase(); ?>-password-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px">
		  OK
		</div>
        <?php 
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'handle-change-'.$model->tag_lcase().'-password-complete',
				'
				function handleChange'.$model->tag_ucase().'PasswordComplete()
				{
					$.post("index.php?r='.$model->tag_lcase().'/updatePartial&id='.$model->id.'", { partial_password:$("#partial_password").val()},
					function(data) 
					{
						if(data=="success")
						{
							$("#change-'.$model->tag_lcase().'-password-dialog").dialog("close");
						}
						else
						{
							alert(data);
						}
				   });
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-change-'.$model->tag_lcase().'-password-complete',
				'
				$("#btn-change-'.$model->tag_lcase().'-password-complete").click(function() {
					handleChange'.$model->tag_ucase().'PasswordComplete();
				});
				',
				CClientScript::POS_READY
			);
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->