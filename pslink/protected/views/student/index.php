<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<?php
$user=null;
$loginType=null;
$userId=null;
$username=null;
if(isset(Yii::app()->user))
{
	$username=Yii::app()->user->id; 
	$userId=$username;
	if(Yii::app()->user->hasState('cLoginType'))
	{
		$loginType=Yii::app()->user->cLoginType;
	}
}
 
if(strcmp($loginType, Professor::CLASS_NAME)==0)
{
	$user=Professor::model()->find('id=?', array(Yii::app()->user->cId));
}
else if(strcmp($loginType, Student::CLASS_NAME)==0)
{
	$user=Student::model()->find('id=?', array(Yii::app()->user->cId));
}
?>

<div class="search-form" style="position: absolute; left: 10px; top: 75px; width: 680px; height: 285px; z-index: 4;">

<div style="position: absolute; left: 10px; top: 10px; z-index: 5;">
<?php echo $this->renderPartial('../site/_formSearchMap'); ?>
</div>

<div style="position: absolute; left: 720px; top: 10px; width:220px;  z-index: 5;">
<?php echo $this->renderPartial('../site/_formSearchMenubar', array('alink'=>'student/index')); ?>
</div>
</div>


<div style="position: absolute; left: 10px; top: 460px; width: 960px; z-index: 4;">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'viewData'=>array('user'=>$user),
	'itemView'=>'_view',
	)
); ?>

<div style="height:38px;">
</div>


</div>



<div id="floatbar">
<?php
$pparent='student';
if(isset($user))
{
	$pparent=$user->tag_lcase();
}
$this->widget('application.extensions.exbreadcrumbs.EXBreadcrumbs', array(
	'htmlOptions'=>array('style'=>'border-top:1px solid #000000', 'class'=>'xbreadcrumbs xbreadcrumbs_style'),
    'links'=>array(
		Yii::t('translation', 'Search') => array($pparent.'/search'),
        Yii::t('translation', 'Student')
    ),
));
?>

<?php
$cs = Yii::app()->getClientScript();
$cs->registerCss(
'css-floating-bar',
'
#floatbar {
 width:100%;
 position: fixed;
 bottom: 0px;
 left:0px;
 z-index: 9999;
 filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=\'#88000000\', endColorstr=\'#88000000\');
 color: #FFFFFF;
 font-size: 12px;
 padding:0px;
}		
');
?>
</div>


