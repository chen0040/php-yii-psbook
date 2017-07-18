<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
<div class="search-form" style="position: absolute; left: 10px; top: 75px; width: 680px; height: 285px; z-index: 4;">

<div style="position: absolute; left: 10px; top: 10px; z-index: 5;">
<?php echo $this->renderPartial('../site/_formSearchMap'); ?>
</div>

<div style="position: absolute; left: 720px; top: 10px; width:220px;  z-index: 5;">
<?php echo $this->renderPartial('../site/_formSearchMenubar', array('alink'=>'researchField/index')); ?>
</div>

<div style="position: absolute; left: 720px; width: 220px; top: 280px; z-index: 5;">
<?php
echo CHtml::link('&nbsp; Create Research &nbsp;<span></span>', array('create'), array(
'style'=>'color:white;',
'class'=>'black',
'id'=>'shiny-blue',
));
Yii::app()->getClientScript()->registerScript('style-create-school-btn', '$("#shiny-blue").corner("cc:#27659C round");', CClientScript::POS_READY); 
?>
</div>

</div>



<div style="position: absolute; left: 10px; top: 460px; width: 960px; height: 695px; z-index: 4;">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

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
        Yii::t('translation', 'Research'),
    ),
));
?>
</div>

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