<?php

// If you want to ignore the uploaded files, 
// set $demo_mode to true;

$demo_mode = false;
$upload_dir = 'images/';
$allowed_ext = array('jpg','jpeg','png','gif');


if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit_status('Error! Wrong HTTP method!');
}


if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
	
	$pic = $_FILES['pic'];

	if(!in_array(get_extension($pic['name']),$allowed_ext)){
		exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
	}	

	if($demo_mode){
		
		// File uploads are ignored. We only log them.
		
		$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
		file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
		
		exit_status('Uploads are ignored in demo mode.');
	}
	
	
	// Move the uploaded file from the temporary 
	// directory to the uploads folder:
	
	if(move_uploaded_file($pic['tmp_name'], $upload_dir.$pic['name']))
	{
		$rfile=$upload_dir.$pic['name'];
		
		if(file_exists($rfile))
		{
			$id=$_GET['id'];
			$id_type=$_GET['idtype'];
			
			$ext=pathinfo($rfile, PATHINFO_EXTENSION);
			
			if($ext==='png')
			{
				$image=imagecreatefrompng($rfile);
			}
			else if($ext==='jpg')
			{
				$image=imagecreatefromjpeg($rfile);
			}
			else if($ext==='gif')
			{
				$image=imagecreatefromgif($rfile);
			}
			
			$rfile_png=$upload_dir.'r'.$id_type.'_'.$id.'.png';
			$rfile_std=$upload_dir.$id_type.'_'.$id.'.png';
			$rfile_thumb=$upload_dir.'t'.$id_type.'_'.$id.'.png';
			
			imagepng($image, $rfile_png);
			
			
			if(file_exists($rfile_png))
			{
				resize($rfile_png, $rfile_std, 250);
				resize($rfile_png, $rfile_thumb, 60);
				unlink($rfile_png);
			}
			
			unlink($rfile);
		}
		exit_status('File was uploaded successfuly!');
	}
	
}

exit_status('Something went wrong with your upload!');


// Helper functions

function exit_status($str){
	echo json_encode(array('status'=>$str));
	exit;
}

function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}

function resize($orig_file,$thumb_file,$prop)
{
	$img = $orig_file;
	$constrain = true;
	$w = $prop;
	$h = $prop;
	
	// get image size of img
	$x = @getimagesize($img);
	// image width
	$sw = $x[0];
	// image height
	$sh = $x[1];
	
	/*
	if ($percent > 0) {
		// calculate resized height and width if percent is defined
		$percent = $percent * 0.01;
		$w = $sw * $percent;
		$h = $sh * $percent;
	} else {
		if (isset ($w) AND !isset ($h)) {
			// autocompute height if only width is set
			$h = (100 / ($sw / $w)) * .01;
			$h = @round ($sh * $h);
		} elseif (isset ($h) AND !isset ($w)) {
			// autocompute width if only height is set
			$w = (100 / ($sh / $h)) * .01;
			$w = @round ($sw * $w);
		} elseif (isset ($h) AND isset ($w) AND isset ($constrain)) {
			// get the smaller resulting image dimension if both height
			// and width are set and $constrain is also set
			$hx = (100 / ($sw / $w)) * .01;
			$hx = @round ($sh * $hx);
	
			$wx = (100 / ($sh / $h)) * .01;
			$wx = @round ($sw * $wx);
	
			if ($hx < $h) {
				$h = (100 / ($sw / $w)) * .01;
				$h = @round ($sh * $h);
			} else {
				$w = (100 / ($sh / $h)) * .01;
				$w = @round ($sw * $w);
			}
		}
	}*/
	
	$im = @ImageCreateFromJPEG ($img) or // Read JPEG Image
	$im = @ImageCreateFromPNG ($img) or // or PNG Image
	$im = @ImageCreateFromGIF ($img) or // or GIF Image
	$im = false; // If image is not JPEG, PNG, or GIF
	
	if (!$im) {
		// We get errors from PHP's ImageCreate functions...
		// So let's echo back the contents of the actual image.
		readfile ($img);
	} else {
		// Create the resized image destination
		$thumb = @ImageCreateTrueColor ($w, $h);
		// Copy from image source, resize it, and paste to image destination
		@ImageCopyResampled ($thumb, $im, 0, 0, 0, 0, $w, $h, $sw, $sh);
		// Output resized image
		@ImagePNG ($thumb,$thumb_file);
	}
}
?>