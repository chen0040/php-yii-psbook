<?php 
if($user->isStudent())
{
	$student_friends=new CActiveDataProvider('Messages', 
					array(
						'criteria'=>array( 
							'condition'=>'from_id=:studentId AND text_type='.Messages::MSGTYPE_FOLLOW.' AND from_type='.Messages::RECTYPE_STUDENT, 
							'params'=>array(':studentId'=>$user->id),
						),
					),
					array( 
						'pagination'=>array( 
							'pageSize'=>20,
						), 
					)
				);
				
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$student_friends,
		'viewData'=>array('user'=>$user),
		'itemView'=>'/messages/_myIdolView',
	)); 
}
else
{
	$userrofessor_friends=new CActiveDataProvider('Messages', 
					array(
						'criteria'=>array( 
							'condition'=>'from_id=:professorId AND text_type='.Messages::MSGTYPE_FOLLOW.' AND from_type='.Messages::RECTYPE_PROFESSOR, 
							'params'=>array(':professorId'=>$user->id),
						),
					),
					array( 
						'pagination'=>array( 
							'pageSize'=>20,
						), 
					)
				);
				
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$userrofessor_friends,
		'viewData'=>array('user'=>$user),
		'itemView'=>'/messages/_myIdolView',
	)); 
}
?>