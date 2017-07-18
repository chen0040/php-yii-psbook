<?php
	$rfile='resumes/p_'.$model->username.'.docx';
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
	header("Expires: 0"); 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	header("content-disposition: attachment;filename=resume.docx");

	ob_clean();
    flush();
	readfile($rfile);
	
	exit;
?>
