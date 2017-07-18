
<?php
$p=$data;
$profile_image=$p->getImagePathIfFileExists();
$articles=$p->getArticles();
?>

<?php
 $style_header='color: #3366ff;font-weight:bold';
 $style_list='color: #333300;';
 $style_detail='color: #333300;';
 $style_contact_detail='color:white; font-size: 14px;';
 $style_table_header='color: #3366ff; font-weight: bold;';
 $style_table_detail='color: #333300;';
 $style_ads='color:red;font-size:20px;font-weight:bold;'; 
?>

<table>
<tr><td colspan="2"><br /><p class="heading1"><span style="<?php echo $style_header; ?>">Requirements: </span></p></td></tr>
<tr><td>
<ul style="<?php echo $style_list; ?>">
<?php 
$requirements=$p->requirements;
$requirements_list=explode("\n", $requirements);
foreach($requirements_list as $requirement_val)
{
	echo '<li>'.$requirement_val.'</li>';
}
?>
</ul></td></tr>
</table>


