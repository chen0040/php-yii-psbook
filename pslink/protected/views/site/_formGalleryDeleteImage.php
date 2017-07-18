<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<table>
<tr>
<td>
<?php echo CHtml::image('', '#', array('id'=>'cimg', 'style'=>'width:500px; height:300px')); ?>
</td>
</tr>
<tr>
<td>
<div id="btn-delete-image" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px" class="black">
  OK
</div>
<?php 
	$cs=Yii::app()->getClientScript();
	$cs->registerScript(
		'handle-delete-image',
		'
		function handleDeleteImage()
		{
			$.post("index.php?r='.$model->tag_lcase().'/deleteGalleryImage&id='.$model->id.'", 
			{ 
				title:gallery.currentImage.title,
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
		'register-delete-image',
		'
		$("#btn-delete-image").click(function() {
			handleDeleteImage();
		});
		$("#btn-delete-image").corner();
		$("#cimg").attr("src", "'.Yii::app()->baseUrl.'/imggallery/images/'.$model->mtype().'_'.$model->id.'/'.'"+gallery.currentImage.title);
		',
		CClientScript::POS_READY
	);
?>
</td>
</tr>
</table>

