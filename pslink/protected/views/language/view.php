<div style="position: absolute; left: 20px; top: 90px; width: 250px; height: 250px; z-index: 4;color:white">

<?php
//shortcut
$translate=Yii::app()->translate;
//in your layout add
echo $translate->dropdown();
//adn this
if($translate->hasMessages()){
  //generates a to the page where you translate the missing translations found in this page
  echo $translate->translateLink('Translate');
  //or a dialog
  echo $translate->translateDialogLink('Translate','Translate page title');
}
//link to the page where you edit the translations
echo $translate->editLink('Edit translations page');
//link to the page where you check for all unstranslated messages of the system
echo $translate->missingLink('Missing translations page');
?>

</div>