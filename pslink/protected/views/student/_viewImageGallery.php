<?php
$cs=Yii::app()->getClientScript();
$cs->registerCssFile('css/images/galleriffic-3.css');
$cs->registerScriptFile('scripts/images/jush.js');
$cs->registerScriptFile('scripts/images/jquery.history.js');
$cs->registerScriptFile('scripts/images/jquery.galleriffic.js');
$cs->registerScriptFile('scripts/images/jquery.opacityrollover.js');


$uploaddir = './imggallery/images/'.$user->mtype().'_'.$user->id; // Relative Upload Location of data file

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
		if(strcmp($ext, 'jpg')==0)
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

<?php if($indexCount > 0): ?>
<div style="width:940px;">
			<div id="container" style="width:940px">
				
<!-- Start Advanced Gallery Html Containers -->
<div id="gallery" class="content">
	<div id="controls" class="controls"></div>
	<div class="slideshow-container">
		<div id="loading" class="loader"></div>
		<div id="slideshow" class="slideshow"></div>
	</div>
	<div id="caption" class="caption-container"></div>
</div>

<div id="thumbs" class="navigation">
	<ul class="thumbs noscript">
					
<?php
// loop through the array of files and print them all
$pageIndex=1;
for($index=0; $index < $indexCount; $index++) 
{
	$filename = $dirArray[$index];
	$fileurl=$uploaddir.'/'.$dirArray[$index];
	$fnnurl=$fileurl.'.dat';
	
	$data=$filename;
	if(file_exists($fnnurl))
	{
		$data=file_get_contents($fnnurl);
	}
	print("<li>");
	print('<a class="thumb" name="leaf" href="create_photo_thumbnail.php?id='.$user->id.'&idtype='.$user->mtype().'&img='.$filename.'&mw=600&mh=480" title="'.$filename.'">');
	print('<img src="create_photo_thumbnail.php?id='.$user->id.'&idtype='.$user->mtype().'&img='.$filename.'&mw=80&mh=60" alt="'.$data.'" />');
	print('</a>');
	print('<div class="caption">');
	print('<div class="download">');
	print('<a href="'.$fileurl.'">Download Original</a>');
	print('</div>');
	print('<div class="image-title">'.$filename.'</div>');
	print('<div class="image-desc">'.$data.'</div>');
	print('</div>');
	print('</li>');
	$pageIndex++;
}
?>
						
			</ul>
		</div>
		<!-- End Advanced Gallery Html Containers -->
		<div style="clear: both;"></div>
	</div>
</div>

<script type="text/javascript">
	var gallery;
	jQuery(document).ready(function($) {
		// We only want these styles applied when javascript is enabled
		$('div.navigation').css({'width' : '300px', 'float' : 'left'});
		$('div.content').css('display', 'block');

		// Initially set opacity on thumbs and add
		// additional styling for hover effect on thumbs
		var onMouseOutOpacity = 0.67;
		$('#thumbs ul.thumbs li').opacityrollover({
			mouseOutOpacity:   onMouseOutOpacity,
			mouseOverOpacity:  1.0,
			fadeSpeed:         'fast',
			exemptionSelector: '.selected'
		});
		
		// Initialize Advanced Galleriffic Gallery
		gallery = $('#thumbs').galleriffic({
			delay:                     2500,
			numThumbs:                 15,
			preloadAhead:              10,
			enableTopPager:            true,
			enableBottomPager:         true,
			maxPagesToShow:            7,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          true,
			renderNavControls:         true,
			playLinkText:              'Play Slideshow',
			pauseLinkText:             'Pause Slideshow',
			prevLinkText:              '&lsaquo; Previous',
			nextLinkText:              'Next &rsaquo;',
			nextPageLinkText:          'Next &rsaquo;',
			prevPageLinkText:          '&lsaquo; Prev',
			enableHistory:             true,
			autoStart:                 false,
			syncTransitions:           true,
			defaultTransitionDuration: 900,
			onSlideChange:             function(prevIndex, nextIndex) {
				// 'this' refers to the gallery, which is an extension of $('#thumbs')
				this.find('ul.thumbs').children()
					.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
					.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onPageTransitionOut:       function(callback) {
				this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
				this.fadeTo('fast', 1.0);
			}
		});

		
		/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

		// PageLoad function
		// This function is called when:
		// 1. after calling $.historyInit();
		// 2. after calling $.historyLoad();
		// 3. after pushing "Go Back" button of a browser
		function pageload(hash) {
			// alert("pageload: " + hash);
			// hash doesn't contain the first # character.
			if(hash) {
				$.galleriffic.gotoImage(hash);
			} else {
				gallery.gotoIndex(0);
			}
		}

		// Initialize history plugin.
		// The callback is called at once by present location.hash. 
		$.historyInit(pageload, "advanced.html");

		// set onlick event for buttons using the jQuery 1.3 live method
		$("a[rel='history']").live('click', function(e) {
			if (e.button != 0) return true;
			
			var hash = this.href;
			hash = hash.replace(/^.*#/, '');

			// moves to a new page. 
			// pageload is called at once. 
			// hash don't contain "#", "?"
			$.historyLoad(hash);

			return false;
		});

		/****************************************************************************************/
	});
</script>
<?php else: ?>
<h2> You have not uploaded any photos</h2>
<?php endif; ?>
