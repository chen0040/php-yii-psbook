<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<table>
<tr>
<td>
<?php echo CHtml::image('', '#', array('id'=>'cimg', 'style'=>'width:500px; height:300px')); ?>
</td>
</tr>
<tr>
<td>
Enter Image Description below:
</td>
</tr>
<tr>
<td>
<textarea id="txt_desc" rows="3" cols="100">
</textarea>
</td>
</tr>
<tr>
<td>
<div id="btn-change-image-desc" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px" class="black">
  OK
</div>
<?php 
	$cs=Yii::app()->getClientScript();
	$cs->registerScript(
		'handle-change-image-desc',
		'
		function handleChangeImageDesc()
		{
			$.post("index.php?r='.$model->tag_lcase().'/updateGalleryImageDesc&id='.$model->id.'", 
			{ 
				title:gallery.currentImage.title,
				desc:$("#txt_desc").val()
			},
			function(data) 
			{
				if(data=="failure")
				{
					alert(data);
				}
				else
				{
					location.reload();
				}
		   });
		   
		}
		',
		CClientScript::POS_END
	);
	$cs->registerScript(
		'register-change-image-desc',
		'
		$("#btn-change-image-desc").click(function() {
			handleChangeImageDesc();
		});
		$("#btn-change-image-desc").corner();
		$("#cimg").attr("src", "'.Yii::app()->baseUrl.'/imggallery/images/'.$model->mtype().'_'.$model->id.'/'.'"+gallery.currentImage.title);
		',
		CClientScript::POS_READY
	);
?>
</td>
</tr>
</table>

