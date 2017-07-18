<?php
$cs=Yii::app()->getClientScript();
//$cs->registerScriptFile(Yii::app()->baseUrl.'scripts/yoxview/yoxview-init.js');
$cs->registerCss(
'vid-thumbs-style',
'
.yoxview a
{
	display: block;
	float: left;
	margin: 4px;
}
.yoxview a img{ border: solid 1px Black; }
.yoxview a:hover img{ border: solid 1px #aaa }
');

/*
$cs->registerScript(
'yoxview-init-handler',
'
var yoxviewDownloadButton = $("<a>", {
	title: "Download image",
	target: "yoxviewDownloadImage"
});

yoxviewDownloadButton.append($("<img>", {
	src: "'.Yii::app()->baseUrl.'/img/yoxview_download_icon.png",
	alt: "Download",
	css: { width: 18, height: 18 }
}));

            
$("#yoxview").yoxview({
infoButtons: {
    download: yoxviewDownloadButton
},
onSelect: function(i, image)
{
	$.yoxview.infoButtons.download.attr("href", image.media.src);
}
});
',
CClientScript::POS_READY);*/

$uploaddir = './vidgallery/videos/'.$user->mtype().'_'.$user->id; // Relative Upload Location of data file
$jwdir = Yii::app()->baseUrl.'/vidgallery/videos/'.$user->mtype().'_'.$user->id; // Relative Upload Location of data file

if(!file_exists($uploaddir))
{
	mkdir($uploaddir);
}

$myDirectory = opendir($uploaddir);
$dirArray=array();
// get each entry
while($entryName = readdir($myDirectory)) 
{
	if (substr($entryName, 0, 1) != ".")
	{ 
		$ext = pathinfo($entryName, PATHINFO_EXTENSION);
		if(strcmp($ext, 'f4v')==0 || strcmp($ext, 'flv')==0)
		{
			$dirArray[] = $entryName;
		}
	}
}

// close directory
closedir($myDirectory);

//	count elements in array
$indexCount	= count($dirArray);


// sort 'em
sort($dirArray);
?>



<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'gallery-upload-video-'.$user->tag_lcase().'-dialog',
	'options'=>array(
		'title'=>'Upload Video into Gallery for '.$profile->username,
		'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
		'height'=>'auto',
	),
));

echo $this->renderPartial('_formGalleryUploadVideo', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'gallery-view-video-'.$user->tag_lcase().'-dialog',
	'options'=>array(
		'title'=>'View Video by '.$profile->username,
		'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
		'height'=>'auto',
		'close' => 'js:function(event, ui) { $("#vplayer").attr("src", "'.Yii::app()->baseUrl.'/flowplayer/player.php"); }',
	),
));

echo $this->renderPartial('_formGalleryViewVideo', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

Yii::app()->getClientScript()->registerScript(
'register-view-video-handler',
'
function handleViewVideo(filename, desc)
{
	$("#currentVideo").html(filename);
	$("#vplayer").attr("src", "'.Yii::app()->baseUrl.'/flowplayer/player.php?rp='.urlencode(Yii::app()->getBaseUrl(true)).'&idtype='.$user->mtype().'&id='.$user->id.'&vid="+filename);
	$("#txt_desc").text(desc);
	$("#gallery-view-video-'.$user->tag_lcase().'-dialog").dialog("open");
}
',
CClientScript::POS_END);
?>

<table>
<tr><td>
<?php
// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Upload Videos'), '#', array(
   'onclick'=>'$("#gallery-upload-video-'.$user->tag_lcase().'-dialog").dialog("open"); return false;', 
   'class'=>'black',
   'style'=>'float:left;width:180px;z-index:22;',
   'id'=>'btn-gallery-upload-video',
));
Yii::app()->getClientScript()->registerScript('style-btn-gallery-upload-video', '$("#btn-gallery-upload-video").corner();', CClientScript::POS_READY);
?>
</td>
<td>
Supported: flv, f4v, f4p, f4a, f4b, aac
</td>
</tr>
</table>

<?php if($indexCount > 0): ?>

<div id="yoxview" class="yoxview">
<?php
for($index=0; $index < $indexCount; $index++) 
{
	$filename = $dirArray[$index];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	$fileurl=$uploaddir.'/'.$dirArray[$index];
	$fnnurl=$fileurl.'.dat';
	$fileurl2=$jwdir.'/'.$dirArray[$index];
	
	$data='';
	if(file_exists($fnnurl))
	{
		$data=file_get_contents($fnnurl);
	}

	echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/video.png', ''),
		'#',
		array(
		'onclick'=>'handleViewVideo("'.$filename.'", "'.$data.'"); return false;',
		)
	);
	
	//echo '<a href="'.$fileurl2.'?image='.Yii::app()->baseUrl.'/img/video.png"><img src="'.Yii::app()->baseUrl.'/img/video.png" alt="My Video Alt" title="My Video Title" /></a>'; //?width=640&height=480
}
?>

</div>

<?php else: ?>
<h2> You have not uploaded any videos (Supported: flv, f4v, f4p, f4a, f4b, aac)</h2>
<?php endif; ?>
