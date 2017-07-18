Last Updated: <span id='time-recommendation'></span> (Update Interval: 60 seconds)<br />

<?php 
if($user->isStudent())
{
	$student_friends=new CActiveDataProvider('Messages', 
					array(
						'criteria'=>array( 
							'condition'=>'to_id=:studentId AND text_type='.Messages::MSGTYPE_RECOMMEND.' AND to_type='.Messages::RECTYPE_STUDENT, 
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
		'id'=>'recommendation-grid',
		'dataProvider'=>$student_friends,
		'viewData'=>array('user'=>$user),
		'itemView'=>'/messages/_myRecommended',
	)); 
}
else
{
	$professor_friends=new CActiveDataProvider('Messages', 
					array(
						'criteria'=>array( 
							'condition'=>'to_id=:professorId AND text_type='.Messages::MSGTYPE_RECOMMEND.' AND to_type='.Messages::RECTYPE_PROFESSOR, 
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
		'id'=>'recommendation-grid',
		'dataProvider'=>$professor_friends,
		'viewData'=>array('user'=>$user),
		'itemView'=>'/messages/_myRecommended',
	)); 
}

$cs=Yii::app()->getClientScript();
$cs->registerScript(
'handle-recommendation-monitor-'.$user->tag_lcase().'-hidden',
'
function handleRecommendationMonitor'.$user->tag_ucase().'Hidden()
{
	updateRecommendationTime();
	$.fn.yiiListView.update("recommendation-grid");
}
function updateRecommendationTime()
{
	var currentTime = new Date();
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();
	$("#time-recommendation").html(hours+":"+minutes+":"+seconds);
}
',
CClientScript::POS_END
);

$cs->registerScript(
	'register-recommendation-monitor-'.$user->tag_lcase(),
	'
	window.setInterval(handleRecommendationMonitor'.$user->tag_ucase().'Hidden, 60000);
	updateRecommendationTime();
	',
	CClientScript::POS_READY
);
?>