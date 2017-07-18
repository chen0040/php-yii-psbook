
<?php
$p=$data;
$profile_image=$p->getImagePathIfFileExists();
$articles=$p->getArticles();
?>

<?php
 $style_header='color: #3366ff;font-weight:bold';
 $style_list='color: #333300;';
 $style_detail='color: #333300;';
 $style_contact_detail='color:white; font-size: 14px;';
 $style_table_header='color: #3366ff; font-weight: bold;';
 $style_table_detail='color: #333300;';
 $style_ads='color:red;font-size:20px;font-weight:bold;'; 
?>

<table>
<tr><td colspan="2"><p class="heading1"><span style="<?php echo $style_header; ?>">Education: </span></p></td></tr>
<tr><td colspan="2"><?php echo $p->getDegree(); ?>, <?php echo $p->getSchoolName(); ?>, GPA (<?php echo $p->getGPA(); ?>)</td></tr>

<?php $article_count=count($articles); ?>
<?php if($article_count > 0): ?>
<tr><td colspan="2"><p class="heading1"><span style="<?php echo $style_header; ?>">Research Experiences: </span></p></td></tr>
<tr><td colspan="2">
<p>
<ul style="<?php echo $style_list; ?>">
<?php foreach($articles as $article_key => $article): ?>
<?php if(isset($article)): ?>
<li><?php echo $article->toString(); ?><br />
<?php echo $article->note; ?>
</li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
</p>
</td></tr>
<?php endif; ?>

<tr><td colspan="2"><p class="heading1"><span style="<?php echo $style_header; ?>">English: </span></p></td></tr>
<tr><td colspan="2"><p>
<br />

<span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/> TOEFL: <?php echo $p->getTOEFL(); ?> </span><br />
<span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/> GRE: <?php echo $p->getGRE(); ?> </span><br />

</p></td></tr>
</table>


