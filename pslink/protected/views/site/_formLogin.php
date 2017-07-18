<?php
$cs=Yii::app()->getClientScript();
$cs->registerCss(
'style-login-form',
'

');
?>
<div class="form">
	<table>
	
	<tr>
	<td style="width:50%"><?php echo Yii::t('translation', 'Username'); ?></td>
	<td style="width:50%"><?php echo CHtml::textField('partial_username'); ?></td>
	</tr>
	
	<tr>
	<td><?php echo Yii::t('translation', 'Password'); ?></td>
	<td><?php echo CHtml::passwordField('partial_password'); ?></td>
	</tr>
	
	<tr>
	<td><?php echo Yii::t('translation', 'Remember me next time'); ?></td>
	<td><?php echo CHtml::checkbox('partial_rememberMe'); ?></td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		<button id="btn-login-cancel" class="black" style="cursor:pointer;width:120px;float:right;">
		  <?php echo Yii::t('translation', 'Cancel'); ?>
		</button>
		<button id="btn-login-complete" class="black" style="cursor:pointer;width:120px;float:right;">
		  <?php echo Yii::t('translation', 'Login'); ?>
		</button>
	</td>
    </tr>
	</table>

</div><!-- form -->

<?php 
	$cs=Yii::app()->getClientScript();
	$cs->registerScript(
		'handle-login-complete',
		'
		function handleLoginComplete()
		{
			$.post("'.Yii::app()->createUrl('site/submitLogin').'", 
			{ password:$("#partial_password").val(), username:$("#partial_username").val(), rememberMe:$("#partial_rememberMe").val()},
			function(data) 
			{
				if(data.status=="success")
				{
					$("#login-dialog").dialog("close");
					location.reload();
				}
				else
				{
					alert(data.error);
				}
		   },
		   "json");
		}
		',
		CClientScript::POS_END
	);
	$cs->registerScript(
		'register-login-complete',
		'
		$("#btn-login-complete").click(function() {
			handleLoginComplete();
		});
		$("#btn-login-cancel").click(function(){
			$("#login-dialog").dialog("close");
		});
		$("#btn-login-complete").corner();
		$("#btn-login-cancel").corner();
		$("#partial_username").keyup(function(e) {
			if (e.keyCode == 13) {
				//Close dialog and/or submit here...
				handleLoginComplete();
			}
		});
		$("#partial_password").keyup(function(e) {
			if (e.keyCode == 13) {
				//Close dialog and/or submit here...
				handleLoginComplete();
			}
		});
		',
		CClientScript::POS_READY
	);
?>