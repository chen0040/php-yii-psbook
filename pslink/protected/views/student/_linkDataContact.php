
<?php
$profile_image = $data->getImagePathIfFileExists();
$p=$data;
$username=$p->first_name.' '.$p->last_name;
$school=$p->getSchool()->getInstituteDesc();
$email=$p->getEmail();
$phone=$p->getContactFullNumber();
$ads=$p->getAds();
$profile_image=$p->getImagePathIfFileExists();
?>

<?php
 $style_contact_detail='color:#333300; font-size: 14px;';
 $style_ads='color:red;font-size:20px;font-weight:bold;'; 
?>

<table>
<tr style="vertical-align:top">
<td><img style="width: 150px; height: 150px;" src="<?php echo $profile_image; ?>" alt="" width="450" height="300" /></td>
<td>
<div>

<?php if(isset($username)): ?>
<p style="<?php echo $style_contact_detail; ?>"><?php echo $p->tag_ucase(); ?>: <?php echo $username; ?></p>
<?php echo ''; ?>
<?php endif; ?>

<?php if(isset($school) && $school !== ''): ?>
<p style="<?php echo $style_contact_detail; ?>"><?php echo $school; ?></p>
<?php endif; ?>

<?php if(isset($email) && $email !== ''): ?>
<p style="<?php echo $style_contact_detail; ?>">Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
<?php endif; ?>

<?php if(isset($phone) && $phone !== ''): ?>
<p style="<?php echo $style_contact_detail; ?>">Tel: <?php echo $phone; ?></p>
<?php endif; ?>

<p style="<?php echo $style_contact_detail; ?>">Research Interest: <?php echo $p->getResearchInterest(); ?></p>

<?php if(isset($ads) && $ads !== ''): ?>
<p style="<?php echo $style_ads; ?>"><?php echo $ads; ?></p>
<?php endif; ?>

</div>
</td>
</tr>
</table>



