<div class="form">	
	<?php
	$lang=Yii::app()->session['_lang'];
	?>
	<table>
	
	<tr>
	<td colspan="2">
	<b><?php echo Yii::t('translation', 'Available Language Options'); ?>:</b>
	</td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-<?php echo $model->tag_lcase(); ?>-chinese-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px"  class="<?php echo ($lang==='zh_cn' ? 'orange' : 'black'); ?>">
		  <?php echo Yii::t('translation', 'Chinese'); ?>
		</div>
	</td>
    </tr>
	
	
	 <tr>
	 <td colspan="2">
		<div id="btn-change-<?php echo $model->tag_lcase(); ?>-english-complete" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px" class="<?php echo ($lang==='en_us' ? 'orange' : 'black'); ?>">
		  <?php echo Yii::t('translation', 'English'); ?>
		</div>
	</td>
    </tr>
	
	</table>

	 <?php 
		$corner_method='.corner()';
		$cs=Yii::app()->getClientScript();
		$cs->registerScript(
			'handle-change-'.$model->tag_lcase().'-language-complete',
			'
			function handleChangeStudentLocalizationComplete(localization_val)
			{
				$.post("index.php?r='.$model->tag_lcase().'/updatePartial&id='.$model->id.'", { partial_localization:localization_val},
				function(data) 
				{
					if(data.status=="success")
					{
						$("#change-'.$model->tag_lcase().'-localization-dialog").dialog("close");
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
			'register-change-'.$model->tag_lcase().'-chinese-complete',
			'
			$("#btn-change-'.$model->tag_lcase().'-chinese-complete").click(function() {
				handleChangeStudentLocalizationComplete("zh_cn");
			});
			$("#btn-change-'.$model->tag_lcase().'-english-complete").click(function() {
				handleChangeStudentLocalizationComplete("en_us");
			});
			$("#btn-change-'.$model->tag_lcase().'-chinese-complete")'.$corner_method.';
			$("#btn-change-'.$model->tag_lcase().'-english-complete")'.$corner_method.';
			',
			CClientScript::POS_READY
		);
		?>
</div><!-- form -->