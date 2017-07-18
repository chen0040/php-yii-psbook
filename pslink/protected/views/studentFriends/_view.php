<div class="view">
	<?php 
	$rfield=Student::model()->find('id=?', $data->friend_id); 
	$profile_image=$rfield->getImagePathIfFileExists();
	?>
	
	<table>
	<tr>
	
	<td>
	<b><?php echo CHtml::encode($rfield->getAttributeLabel('i_follow')); ?>:</b>
	<?php 
	$rfield_detail = CHtml::encode($rfield->first_name.' '.$rfield->last_name);
	echo CHtml::link($rfield_detail, array('student/view', 'id'=>$data->friend_id)); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($rfield->getCountryName()); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('email1')); ?>:</b>
	<?php echo CHtml::encode($rfield->email1); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($rfield->getSchoolName()); ?>
	<br />

	<b><?php echo CHtml::encode($rfield->getAttributeLabel('research_interest')); ?>:</b>
	<?php echo CHtml::encode($rfield->getResearchInterest()); ?>
	</td>
	
	<td style="width:60px">
	<img style="width: 100px; height: 100px; z-index: 3;" src="<?php echo $profile_image; ?>" alt="" width="450" height="300" /> 
	</td>
	</tr>
	
	</table>

</div>