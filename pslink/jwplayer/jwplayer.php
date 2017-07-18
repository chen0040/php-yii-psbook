<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
	<?php if(isset($_GET['idtype'])): ?>

	<!-- START OF THE PLAYER EMBEDDING TO COPY-PASTE -->
	<div id="mediaplayer">Currently playing <?php echo $_GET['vid']; ?></div>
	
	<?php
	$root_path='..';
	if(isset($_GET['rp']))
	{
		$root_path=$_GET['rp'];
	}
	?>
	<script type="text/javascript" src="jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			flashplayer: "player.swf",
			file: '<?php echo $root_path; ?>/vidgallery/videos/<?php echo $_GET['idtype'].'_'.$_GET['id'].'/'.$_GET['vid']; ?>',
			image: "preview.jpg"
		});
	</script>
	<!-- END OF THE PLAYER EMBEDDING -->
	
	
	<?php endif; ?>
</body>
</html>