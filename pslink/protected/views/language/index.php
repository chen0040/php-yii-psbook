<div style="position: absolute; left: 20px; top: 90px; width: 450px; height: 250px;  z-index: 4;">
<table>

<tr><td>
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
?>
</td></tr>

<tr><td>
<?php
//link to the page where you check for all unstranslated messages of the system
echo $translate->missingLink('Missing translations page');
?>
</td></tr>

<tr><td>
<?php
//link to the page where you edit the translations
echo $translate->editLink('Edit translations page');
?>
</td></tr>

</table>
</div>