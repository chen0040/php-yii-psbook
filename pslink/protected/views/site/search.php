<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>

<?php
$user=Yii::app()->accountMgr->getUser();
?>

<div class="search-form" style="position: absolute; left: 10px; top: 75px; width: 680px; height: 285px; z-index: 4;">

<div style="position: absolute; left: 20px; top: 10px; z-index: 5; width: 670px">



<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'user'=>$user,
)); ?>

</div>


<div style="position: absolute; left: 720px; top: 10px; width:220px;  z-index: 5;">
<?php echo $this->renderPartial('_formSearchMenubar', array('alink'=>'site/search')); ?>
</div>

</div>

<div style="position: absolute; left: 10px; top: 460px; width: 960px; z-index: 4;">

<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->searchByKeywords(),
	'viewData'=>array('user'=>$user),
	'itemView'=>'../'.$model->tag_lcase().'/_view',
	)
); 
?>

<div style="height:38px;">
</div>

</div>



<div id="floatbar">
<?php
$this->widget('application.extensions.exbreadcrumbs.EXBreadcrumbs', array(
	'htmlOptions'=>array('style'=>'border-top:1px solid #000000', 'class'=>'xbreadcrumbs xbreadcrumbs_style'),
    'links'=>array(
		Yii::t('translation', 'Search'),
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
$cs->registerScript(
'style-titlebar-search',
'
$("#titlebar-search").corner("top");
',
CClientScript::POS_READY
);
?>
</div>
