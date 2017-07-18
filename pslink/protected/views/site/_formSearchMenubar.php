<?php
$normal_link_style='black'; //'text-decoration:none;border-style:solid;border-color:black;border-width:1px;cursor:hand;background-color:#333000;color:white;width:100%;display:block;text-align:center';
$highlighted_link_style='orange'; //'text-decoration:none;border-style:solid;border-color:red;border-width:1px;cursor:hand;color:red;background-color:white;width:100%;display:block;text-align:center';
?>

<?php
$title=Yii::t('translation', 'Search').' '.Yii::t('translation', 'Home');
echo CHtml::link($title, array('site/search'), array(
'class'=>($alink==='site/search' ? $highlighted_link_style : $normal_link_style),
'id'=>'btn-link-site-search',
));
Yii::app()->getClientScript()->registerScript('style-btn-link-site-search', '$("#btn-link-site-search").corner("cc:#27659C top")', CClientScript::POS_READY);
?>

<?php

/*
$title=Yii::t('translation', 'List by Students');
echo CHtml::link($title, array('student/index'), array(
'class'=>($alink==='student/index' ? $highlighted_link_style : $normal_link_style),
'id'=>'btn-list-by-students',
));

$title=Yii::t('translation', 'List by Professors');
echo CHtml::link($title, array('professor/index'), array(
'class'=>($alink==='professor/index' ? $highlighted_link_style : $normal_link_style),
));
*/
?>




<?php
$title=Yii::t('translation', 'List by Schools');
echo CHtml::link($title, array('educationSchool/index'), array(
'class'=>($alink==='educationSchool/index' ? $highlighted_link_style : $normal_link_style),
));
?>




<?php
$title=Yii::t('translation', 'Search by Students');
echo CHtml::link($title, array('student/search'), array(
'class'=>($alink==='student/search' ? $highlighted_link_style : $normal_link_style),
));
?>




<?php
$title=Yii::t('translation', 'Search by Professors');
echo CHtml::link($title, array('professor/search'), array(
'class'=>($alink==='professor/search' ? $highlighted_link_style : $normal_link_style),
));
?>

<?php
$title=Yii::t('translation', 'List by Researches');
echo CHtml::link($title, array('researchField/index'), array(
'class'=>($alink==='researchField/index' ? $highlighted_link_style : $normal_link_style),
'id'=>'btn-list-by-researches',
));

?>


<?php
$title=Yii::t('translation', 'Charts');
echo CHtml::link($title, array('chart/index'), array(
'class'=>($alink==='chart/index' ? $highlighted_link_style : $normal_link_style),
'id'=>'btn-chart-index',
));
Yii::app()->getClientScript()->registerScript('style-btn-chart-index', '$("#btn-chart-index").corner("cc:#27659C bottom")', CClientScript::POS_READY);
?>

