Last Updated: <span id='time-wall-message'></span> (Update Interval: 60 seconds)<br />
<?php 
if($user->isStudent())
{
	$student_friends=new CActiveDataProvider('Messages', 
					array(
						'criteria'=>array( 
							'condition'=>'((to_type='.Messages::MSGGROUP_ALL.') OR (from_id=:studentId AND from_type='.Messages::RECTYPE_STUDENT.')) AND text_type='.Messages::MSGTYPE_WALL_MESSAGE, 
							'params'=>array(':studentId'=>$user->id),
							'order'=>'text_date DESC',
						),
					),
					array( 
						'pagination'=>array( 
							'pageSize'=>20,
						), 
					)
				);
				
	$this->widget('zii.widgets.CListView', array(
		'id'=>'wall-message-grid',
		'dataProvider'=>$student_friends,
		'itemView'=>'/messages/_myWallMessage',
	)); 
}
else
{
	$professor_friends=new CActiveDataProvider('Messages', 
					array(
						'criteria'=>array( 
							'condition'=>'((to_type='.Messages::MSGGROUP_ALL.') OR (from_id=:professorId AND from_type='.Messages::RECTYPE_PROFESSOR.')) AND text_type='.Messages::MSGTYPE_WALL_MESSAGE, 
							'params'=>array(':professorId'=>$user->id),
							'order'=>'text_date DESC',
						),
					),
					array( 
						'pagination'=>array( 
							'pageSize'=>20,
						), 
					)
				);
				
	$this->widget('zii.widgets.CListView', array(
		'id'=>'wall-message-grid',
		'dataProvider'=>$professor_friends,
		'itemView'=>'/messages/_myWallMessage',
	)); 
}
$cs=Yii::app()->getClientScript();
$cs->registerScript(
'handle-wall-message-monitor-'.$user->tag_lcase().'-hidden',
'
function handleWallMessageMonitor'.$user->tag_ucase().'Hidden()
{
	updateWallMessageTime();
	$.fn.yiiListView.update("wall-message-grid");
}
function updateWallMessageTime()
{
	var currentTime = new Date();
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();
	$("#time-wall-message").html(hours+":"+minutes+":"+seconds);
}
',
CClientScript::POS_END
);

$cs->registerScript(
	'register-wall-monitor-'.$user->tag_lcase(),
	'
	window.setInterval(handleWallMessageMonitor'.$user->tag_ucase().'Hidden, 60000);
	updateWallMessageTime();
	',
	CClientScript::POS_READY
);

?>

