<?php

$style_list='color: #333300;';
$style_header='color: #3366ff;';
$style_detail='color: #333300;';
$style_table_header='color: #3366ff; font-size: large;';
?>

<?php if($user->isStudent()): ?>



<table style="width:100%;">

<tr>
<td valign="top"><br /><span style="<?php echo $style_table_header; ?>"><?php echo Yii::t('translation', 'Professors with Similar Research Background') ?>: </span><br /><br /><span></td>
<td valign="top"><br /><span style="<?php echo $style_table_header; ?>"><?php echo Yii::t('translation', 'Another Professors You May Interested'); ?>: </span><br /><br /></td>
</tr>

<tr>
<td>
<?php
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$user->getProfessorsWithSimilarResearchBackground(), 
		'itemView'=>'/professor/_li',
	)
); 
?>
</td>
<td>
<?php
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$user->getProfessorsOfInterest(), 
		'itemView'=>'/professor/_li',
	)
); 
?>
</td>
</tr>

<tr>
<td valign="top"><br /><span style="<?php echo $style_table_header; ?>"><?php echo Yii::t('translation', 'Students with Similar Research Background'); ?>: </span><br /><br /></td>
<td valign="top"><br /><span style="<?php echo $style_table_header; ?>"><?php echo Yii::t('translation', 'Students in Your University'); ?>: </span><br /><br /></td>
</tr>

<tr>
<td>
<?php
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$user->getStudentsWithSimilarResearchBackground(), 
		'itemView'=>'/student/_li',
	)
); 
?>
</td>
<td>
<?php
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$user->getStudentsFromSameUniversity(), 
		'itemView'=>'/student/_li',
	)
); 
?>
</td>
</tr>

</table>

<?php else: ?>
<table width="860px">
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

<tr><td colspan="2"><br /><br /></td></tr>

<tr>
<td valign="top"><br /><span style="<?php echo $style_table_header; ?>"><?php echo Yii::t('translation', 'Students with Similar Research Background'); ?>: </span><br /><br /></td>
<td valign="top"><br /><span style="<?php echo $style_table_header; ?>"><?php echo Yii::t('translation', 'Students Applying Your University'); ?>: </span><br /><br /></td>
</tr>

<tr>
<td>
<?php
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$user->getStudentsWithSimilarResearchBackground(), 
		'itemView'=>'/student/_li',
	)
); 
?>
</td>
<td>
<?php
$this->widget('zii.widgets.CListView', 
	array( 
		'dataProvider'=>$user->getStudentsApplyingSameUniversity(), 
		'itemView'=>'/student/_li',
	)
); 
?>
</td>
</tr>


</table>

<?php endif; ?>

