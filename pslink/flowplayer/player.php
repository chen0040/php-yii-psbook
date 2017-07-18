<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="flowplayer-3.2.11.min.js"></script>
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
	$item_path=$root_path.'/vidgallery/videos/'.$_GET['idtype'].'_'.$_GET['id'].'/'.$_GET['vid'];
	?>
	<!-- END OF THE PLAYER EMBEDDING -->
	<a href="<?php echo $item_path; ?>"
    style="display:block;width:425px;height:300px;"
    id="fplayer">
	</a>
	
	<script language="JavaScript">
	flowplayer("fplayer", "flowplayer-3.2.12.swf");
	</script>

	
	<?php endif; ?>
</body>
</html>