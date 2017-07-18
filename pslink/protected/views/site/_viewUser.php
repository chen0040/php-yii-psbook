<?php

$style_list='color: #333300;';
$style_header='color: #3366ff;';
$style_detail='color: #333300;';
$style_table_header='color: #3366ff; font-size: large;';
?>

<?php if($user->isStudent()): ?>



<table style="width:100%;">
<tr><td><p class="heading1">
<span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Education')?>: 
</span>
</p></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-student-education-dialog',
    'options'=>array(
        'title'=>'Change Education',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeStudentEducation', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');



// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-student-education-dialog").dialog("open"); return false;', 
	'style'=>'width:50px;float:right;',
	'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-education',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-education', '$("#edit-change-'.$user->tag_lcase().'-education").corner();', CClientScript::POS_READY);




?>
</td>
</tr>
<tr><td colspan="2"><br />
<ul id="wsbtxt6ul1">
<li>
<span style="<?php echo $style_detail; ?>">
<span id="txt-student-degree"><?php echo $user->getDegree(); ?></span>, <span id="txt-student-degree-school-name"><?php echo $user->getSchoolName(); ?></span> (GPA: <span id="txt-student-gpa-score"><?php echo $user->getGPA(); ?></span>)
</span>
</li>
</ul></td></tr>

<tr><td><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Research Interest'); ?>: </span></p></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-student-research-dialog',
    'options'=>array(
        'title'=>'Change Research Interest',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeStudentResearch', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-student-research-dialog").dialog("open"); return false;', 
	'style'=>'width:50px;',
	'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-research',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-research', '$("#edit-change-'.$user->tag_lcase().'-research").corner();', CClientScript::POS_READY);
?>
</td>
</tr>
<tr><td colspan="2"><p><span id="txt-student-research" style="<?php echo $style_detail; ?>"><?php echo $user->getResearchInterest(); ?></span></p></td></tr>

<?php 
$articles=$user->getArticles();
$article_count=count($articles); 
?>
<tr><td><span class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Research Experiences'); ?>: </span></span></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'add-student-research-dialog',
    'options'=>array(
        'title'=>'Add Research Experience',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formAddStudentResearch', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Add'), '#', array(
   'onclick'=>'$("#add-student-research-dialog").dialog("open"); return false;', 
	'style'=>'width:50px;',
	'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-research-exp',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-research-exp', '$("#edit-change-'.$user->tag_lcase().'-research-exp").corner();', CClientScript::POS_READY);
?>
</td>
</tr>
<tr><td colspan="2">
<p>
<br />
<span id="txt-student-articles">
<table>
<?php foreach($articles as $article_key => $article): ?>
<tr id="txt-student-article-<?php echo $article_key; ?>">
<td width="10px">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'delete-student-article-dialog-'.$article_key,
    'options'=>array(
        'title'=>'Delete Article',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formDeleteStudentArticle', array('title'=>$article->title, 'model_rkey'=>$article_key)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Del'), '#', array(
   'onclick'=>'$("#delete-student-article-dialog-'.$article_key.'").dialog("open"); return false;', 
	'style'=>'width:50px',
	'class'=>'black',
   'id'=>'delete-'.$user->tag_lcase().'-article',
));
Yii::app()->getClientScript()->registerScript('register-style-delete-'.$user->tag_lcase().'-article', '$("#delete-'.$user->tag_lcase().'-article").corner();', CClientScript::POS_READY);
?>
</td>
<td><?php echo $article->toString(); ?></td>
<tr>
<tr>
<td></td>
<td><?php echo $article->note; ?></td>
</tr>
<?php endforeach; ?>
</table>
</span>
</p>
</td></tr>

<tr><td><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'English'); ?>: </span></p></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-student-english-dialog',
    'options'=>array(
        'title'=>'Change English Achievement',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeStudentEnglish', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-student-english-dialog").dialog("open"); return false;', 
	'style'=>'width:50px',
	'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-english',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-english', '$("#edit-change-'.$user->tag_lcase().'-english").corner();', CClientScript::POS_READY);
?>
</td>
</tr>
<tr><td colspan="2"><p>
<br />

<span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/> <?php echo Yii::t('translation', 'TOEFL'); ?>: <span id="txt-student-tofle-score"><?php echo $user->getTOEFL(); ?> </span></span><br />
<span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/> <?php echo Yii::t('translation', 'GRE'); ?>: <span id="txt-student-gre-score"><?php echo $user->getGRE(); ?> </span></span><br />

</p></td></tr>

<tr><td><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Universities You Applied'); ?>: </span></p></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-student-applied-universities-dialog',
    'options'=>array(
        'title'=>'Change Universities Applied',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeStudentAppliedUniversities', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-student-applied-universities-dialog").dialog("open"); return false;', 
   'style'=>'width:50px;',
   'class'=>'black',
   'id'=>'edit-change-'.$user->tag_lcase().'-applied-universities',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-applied-universities', '$("#edit-change-'.$user->tag_lcase().'-applied-universities").corner();', CClientScript::POS_READY);
?>
</td>
</tr>
<tr><td colspan="2"><p>
<span id="txt-student-universities_applied" style="<?php echo $style_detail; ?>">
<?php echo $user->universities_applied; ?>
</span>
</p></td></tr>

<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2">
<p class="heading1"><span style="<?php echo $style_header; ?>">Social Graph </span></p><br />


</td></tr>

</table>

<?php $this->renderPartial('../'.$user->tag_lcase().'/_viewGraph', array('model'=>$user)); ?>

<?php else: ?>
<table width="860px">
<tr>
<td><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Requirements')?>: </span></p></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-professor-requirements-dialog',
    'options'=>array(
        'title'=>'Change Requirements',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeProfessorRequirements', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-professor-requirements-dialog").dialog("open"); return false;', 
	'class'=>'black',
	'style'=>'width:50px',
   'id'=>'edit-change-'.$user->tag_lcase().'-requirements',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-requirements', '$("#edit-change-'.$user->tag_lcase().'-requirements").corner();', CClientScript::POS_READY);
?>
</td></tr>
<tr><td colspan="2">
<ul style="<?php echo $style_list; ?>">
<span id="txt-professor-requirements">
<?php 
$requirements=$user->requirements;
$requirements_list=explode("\n", $requirements);
foreach($requirements_list as $requirement_val)
{
	echo '<li>'.$requirement_val.'</li>';
}
?>
</span>
</ul>
</td></tr>
<tr><td><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Research Interest'); ?>: </span></p></td>
<td style="float: right;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'change-professor-research-dialog',
    'options'=>array(
        'title'=>'Change Research Interest',
        'autoOpen'=>false,
		'modal' => true,
		'resizable' => false,
		'width'=>'auto',
        'height'=>'auto',
    ),
));

echo $this->renderPartial('_formChangeProfessorResearch', array('model'=>$user)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link(Yii::t('translation', 'Edit'), '#', array(
   'onclick'=>'$("#change-professor-research-dialog").dialog("open"); return false;', 
   'class'=>'black',
   'style'=>'width:50px',
   'id'=>'btn-change-'.$user->tag_lcase().'-research',
));
Yii::app()->getClientScript()->registerScript('register-style-change-'.$user->tag_lcase().'-research', '$("#btn-change-'.$user->tag_lcase().'-research").corner();', CClientScript::POS_READY);
?>
</td>
</tr>
<tr><td colspan="2"><p><span id="txt-professor-research"><?php echo $user->getResearchInterest(); ?></span>, etc.</p></td></tr>

<?php 
$articles=$user->getArticles();
$article_count=count($articles); 
?>
<?php if($article_count > 0): ?>
<tr><td colspan="2"><br /><p class="heading1"><span style="<?php echo $style_header; ?>">Selected Publications: </span></p></td></tr>
<tr><td colspan="2">
<p><span style="color: #333300; font-size: large;">&nbsp;
<ul style="color: #333300; font-size: large;">
<?php foreach($articles as $article_key => $article): ?>
<li><?php echo $article->toString(); ?><br />
<?php echo $article->note; ?>
</li>
<?php endforeach; ?>
</ul>
</span></p>
</td></tr>
<?php endif; ?>

<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2">
<p class="heading1"><span style="<?php echo $style_header; ?>">Social Graph </span></p><br />
</td></tr>


</table>

<?php $this->renderPartial('../'.$user->tag_lcase().'/_viewGraph', array('model'=>$user)); ?>

<?php endif; ?>

