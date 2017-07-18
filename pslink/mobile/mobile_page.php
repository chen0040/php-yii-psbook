<!DOCTYPE html>
<html>
    <head>
    <title>jQuery Mobile Tutorial on Codeforest.net</title>
	
<?php
include_once('mobile_header.php');

?>
</head>
<body> 

<div data-role="page" data-theme="b" id="page1">

  <!-- ====== main content starts here ===== -->
  <div data-role="header" id="hdrMain" name="hdrMain" data-nobackbtn="true">...</div>
  <div data-role="content" id="contentMain" name="contentMain">
    ...
  </div>
  <div data-role="footer" id="ftrMain" name="ftrMain"></div>
  <!-- ====== main content ends here ===== -->

  <!-- ====== dialog content starts here ===== -->
  <div align="CENTER" data-role="content" id="contentDialog" name="contentDialog">
    ...
  </div>
  <!-- ====== dialog content ends here ===== -->  

  <!-- ====== transition content page starts here ===== -->
  <div data-role="content" id="contentTransition" name="contentTransition">
    ...
  </div>
  <!-- ====== transition content ends here ===== --> 

  <!-- ====== confirmation content starts here ===== -->
  <div data-role="header"  id="hdrConfirmation" name="hdrConfirmation" data-nobackbtn="true">...</div>
  <div data-role="content" id="contentConfirmation" name="contentConfirmation" align="center">
    ...
  </div>
  <div data-role="footer" id="ftrConfirmation" name="ftrConfirmation"></div>
  <!-- ====== confirmation content ends here ===== -->
    ...
</div><!-- page1 -->

</body>
</html>