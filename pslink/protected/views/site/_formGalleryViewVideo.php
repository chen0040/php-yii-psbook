 <?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<table>
<tr>
<td colspan="2">
<iframe src="" width="500" height="400" id="vplayer" frameborder="0" ></iframe>
</td>
</tr>
<tr>
<td colspan="2">
<div id="currentVideo"></div>
</td>
</tr>
<tr>
<td colspan="2">
Enter Video Description below:
</td>
</tr>
<tr>
<td colspan="2">
<textarea id="txt_desc" rows="3" cols="60">
</textarea>
</td>
</tr>
<tr>
<td>
<div id="btn-change-video-desc" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px" class="black">
  Update
</div>
</td>
<td>
<div id="btn-delete-video" style="border-style:solid;border-width:1px;text-align:center; cursor:pointer;margin:5px;min-height:20px" class="black">
  Delete
</div>
</td>
</tr>
</table>


<?php 
	$cs=Yii::app()->getClientScript();
	$cs->registerScript(
		'handle-change-video-desc',
		'
		function handleChangeVideoDesc()
		{
			$.post("index.php?r='.$model->tag_lcase().'/updateGalleryVideoDesc&id='.$model->id.'", 
			{ 
				title:$("#currentVideo").html(),
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
		
		function handleDeleteVideo()
		{
			$.post("index.php?r='.$model->tag_lcase().'/deleteGalleryVideo&id='.$model->id.'", 
			{ 
				title:$("#currentVideo").html()
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
		'register-change-video-desc',
		'
		$("#btn-change-video-desc").click(function() {
			handleChangeVideoDesc();
		});
		$("#btn-change-video-desc").corner();
		$("#btn-delete-video").click(function() {
			handleDeleteVideo();
		});
		$("#btn-delete-video").corner();
		',
		CClientScript::POS_READY
	);
?>