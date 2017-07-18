<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<?php
$user=Yii::app()->accountMgr->getUser();
Yii::app()->getClientScript()->registerScript(
'script-style-titlebar-search-by',
'
$("#titlebar-search-by").corner("top");
',
CClientScript::POS_READY
);
?>

<div class="search-form" style="position: absolute; left: 10px; top: 75px; width: 680px; height: 285px; z-index: 4;">

<div style="position: absolute; left: 20px; top: 10px; z-index: 5; width: 670px">
<table width="100%">
<tr><td>
<div style="font-weight:bold;color:white;" class="black" id="titlebar-search-by"><?php echo Yii::t('translation', 'Search by Professors'); ?></div>
</td></tr>
<tr><td>
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</td></tr>
</table>
</div>


<div style="position: absolute; left: 720px; top: 10px; width:220px;  z-index: 5;">
<?php echo $this->renderPartial('../site/_formSearchMenubar', array('alink'=>'professor/search')); ?>
</div>

</div>


<div style="position: absolute; left: 10px; top: 460px; width: 960px; z-index: 4;">

<?php 

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'viewData'=>array('user'=>$user),
	'itemView'=>'_view',
	)
); 

/*
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'first_name',
		'last_name',
		'email1',
		'phone1',
		'requirements',
		'university',
		'research',
		'looking_for',
		array
		(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		)
	),
)); 
*/
?>

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
        Yii::t('translation', 'Search').' '.Yii::t('translation', 'Professor'),
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
