<div class="form">
	
	<table>
	<tr>
	<td colspan="2" style="color:white;" class="black"><b><?php echo Yii::t('translation', 'Research'); ?></b></td>
	</tr>
	<tr>
	<td colspan="2">
	<div id="school_fields" style="width:600px;">
	<?php
	$rfs=array();
	$rf_all=ResearchField::model()->findAll('research_field_name !=""');
	foreach($rf_all as $rf_model)
	{
		$rfs[]=($rf_model->research_field_name);
	}
	foreach($rfs as $research)
	{
		echo '<a href="#" onclick="handleSelectResearchUpdate(&quot;'.$research.'&quot;); return false;">'.Yii::t('translation', $research).'</a>&nbsp;| ';
	}
	?>
	</div>
	</td>
	</tr>
	
	 <tr>
	 <td colspan="2">
		
        <?php 
			
			$cs=Yii::app()->getClientScript();
			
			$cs->registerScript(
				'handle-select-research-complete',
				'
				function handleSelectResearchUpdate(research_val)
				{
					var new_text=research_val;
					$("#research_autocomplete").val(new_text);
					$("#Professor_research").val(new_text);
					$("#select-professor-research-dialog").dialog("close");
				}
				',
				CClientScript::POS_END
			);
			$cs->registerScript(
				'register-select-research-complete',
				'
				
				',
				CClientScript::POS_READY
			);
			
		?>
	</td>
    </tr>
	</table>

</div><!-- form -->