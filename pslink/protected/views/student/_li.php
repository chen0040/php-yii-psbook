<span>
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/>
	<?php 
	echo CHtml::link(CHtml::encode($data->first_name), array('student/view', 'id'=>$data->id)); 
	echo ' from '.Chtml::link($data->getSchool()->getInstituteDesc(), array('educationSchool/view', 'institute_name'=>$data->getSchoolName())); 
	?>

</span>
<br />
