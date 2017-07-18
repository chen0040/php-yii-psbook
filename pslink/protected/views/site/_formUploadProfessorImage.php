<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
<?php
$cssCoreUrl=Yii::app()->baseUrl.'/css';
$jsCoreUrl=Yii::app()->baseUrl.'/scripts';
$cs=Yii::app()->getClientScript();
$cs->registerCssFile($cssCoreUrl . '/dropbox.css'); 
$cs->registerScriptFile($jsCoreUrl . '/jquery.filedrop.js'); 

$cs->registerScript(
	'handle-upload-image-complete',
	'
	var dropbox = $("#dropbox"),
	message = $(".message", dropbox);
	
	dropbox.filedrop({
		// The name of the $_FILES entry:
		paramname:"pic",
		
		maxfiles: 5,
    	maxfilesize: 2,
		url: "upload_image.php?id='.$model->username.'&idtype=p",
		
		uploadFinished:function(i,file,response){
			$.data(file).addClass("done");
			$("#profile_img").attr("src", $("#profile_img").attr("src")+"?"+Math.random());
		},
		
    	error: function(err, file) {
			switch(err) {
				case "BrowserNotSupported":
					showMessage("Your browser does not support HTML5 file uploads!");
					break;
				case "TooManyFiles":
					alert("Too many files! Please select 5 at most! (configurable)");
					break;
				case "FileTooLarge":
					alert(file.name+" is too large! Please upload files up to 2mb (configurable).");
					break;
				default:
					break;
			}
		},
		
		// Called before each upload is started
		beforeEach: function(file){
			if(!file.type.match(/^image\//)){
				alert("Only images are allowed!");

				return false;
			}
		},
		
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		
		progressUpdated: function(i, file, progress) {
			$.data(file).find(".progress").width(progress);
		}
    	 
	});
	
	var template = "<div class=\"preview\">"+
						"<span class=\"imageHolder\">"+
							"<img />"+
							"<span class=\"uploaded\"></span>"+
						"</span>"+
						"<div class=\"progressHolder\">"+
							"<div class=\"progress\"></div>"+
						"</div>"+
					"</div>"; 
	
	
	function createImage(file)
	{
		var preview = $(template), 
			image = $("img", preview);
			
		var reader = new FileReader();
		
		image.width = 100;
		image.height = 100;
		
		reader.onload = function(e)
		{
			image.attr("src",e.target.result);
		};
		
		
		reader.readAsDataURL(file);
		
		message.hide();
		preview.appendTo(dropbox);
		
		$.data(file,preview);
	}

	function showMessage(msg){
		message.html(msg);
	}
	',
	CClientScript::POS_READY);
?>

<div id="dropbox">
	<span class="message"><span style="color:white"><?php echo Yii::t('translation', 'Drop your profile image here to upload'); ?></span></span>
</div>
