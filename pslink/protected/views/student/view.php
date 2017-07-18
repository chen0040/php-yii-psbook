<?php Yii::app()->setLanguage(isset(Yii::app()->session['_lang']) ? Yii::app()->session['_lang'] : 'en_us'); ?>
<?php
class ViewPresenter
{
	const VIEW_IMAGEGALLERY=0;
	const VIEW_VIDEOGALLERY=1;
	const VIEW_DEFAULT=3;
	
	public $state;
	public $username;
	
	public function __construct()
	{
		if(isset($_GET['state']))
		{
			$this->state=$_GET['state'];
		}
		else
		{
			$this->state=ViewPresenter::VIEW_DEFAULT;
		}
		
	}
}

$presenter=new ViewPresenter;
$presenter->username=$model->first_name.' '.$model->last_name;

$profile_image = $model->getImagePathIfFileExists();
$username=$model->first_name.' '.$model->last_name;
$school=$model->getSchool()->getInstituteDesc();
$email=$model->getEmail();
$phone=$model->getContactFullNumber();
$ads=$model->getAds();
$profile_image=$model->getImagePathIfFileExists();
$articles=$model->getArticles();

$loginType='NA';
$user=null;
if(isset(Yii::app()->user))
{
	if(Yii::app()->user->hasState('cLoginType'))
	{
		$loginType=Yii::app()->user->cLoginType;
	}
}
 
if(strcmp($loginType, 'Professor')==0)
{
	$user=Professor::model()->find('id=?', Yii::app()->user->cId);
}
else if(strcmp($loginType, 'Student')==0)
{
	$user=Student::model()->find('id=?', Yii::app()->user->cId);
}
?>

<?php
 $style_header='color: #3366ff;';
 $style_list='color: #333300;';
 $style_detail='color: #333300;';
 $style_contact_detail='color:white; font-size: 14px;';
 $style_table_header='color: #3366ff; font-size: large;';
 $style_table_detail='color: #333300; font-size: large;';
 $style_ads='color:red;font-size:20px;font-weight:bold;'; 
?>

<img style="position: absolute; left: 20px; top: 90px; width: 250px; height: 250px; z-index: 3;" src="<?php echo $profile_image; ?>" alt="" /> 

<?php 
	$file='qrcode/'.$model->tag_lcase().'_view_'.$model->id.'.png';
	$url=Yii::app()->createAbsoluteUrl('mobile/view'.$model->tag_ucase(), array('id'=>$model->id));
	Yii::app()->QRGen->createQRCode($url, $file);
	
	$top=430;
	if(isset($user))
	{
		$top=460;
	}
	echo CHtml::image($file, '#', array('style'=>'position:absolute;left:860px;top:'.$top.'px;z-index:4;'));
?>


<?php
$cs=Yii::app()->getClientScript();
$cs->registerCss(
'css-scroll-menu-always-top',
'
#toolbox_menu {
	width:960px;
	z-index: 21;
}
.absolute_toolbox_menu {
	position:absolute;
	top:410px;
}
.fixed_toolbox_menu {
    position:fixed;
    top:0px;
}
'
);
$cs->registerScript(
'style-scroll-menu-orig-top',
'
$("#toolbox_menu").addClass("absolute_toolbox_menu");
',
CClientScript::POS_READY);

$cs->registerScript(
'style-scroll-menu-always-top',
'
var msie6 = $.browser == \'msie\' && $.browser.version < 7;
if (!msie6) {
    var top = $("#toolbox_menu").offset().top;
    $(window).scroll(function(event) {
        var y = $(this).scrollTop();
        if (y >= top) {
            $("#toolbox_menu").addClass("fixed_toolbox_menu").removeClass("absolute_toolbox_menu");
        } 
		 else {
           $("#toolbox_menu").addClass("absolute_toolbox_menu").removeClass("fixed_toolbox_menu");
        }
    });
}
',
CClientScript::POS_LOAD);
?>

<div id="toolbox_menu">
<?php
$menu_width=115;
$menu_height=20;

$menu_left=860;
//$menu_top=382;
$menu_top=410;
$menu_dir='bottom';
if(isset($user))
{
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'recommend-'.$user->tag_lcase().'-dialog',
		'options'=>array(
			'title'=>'Recommend '.$username,
			'autoOpen'=>false,
			'modal' => true,
			'resizable' => false,
			'width'=>'auto',
			'height'=>'auto',
		),
	));

	echo $this->renderPartial('_formRecommend', array('model'=>$model, 'user'=>$user)); 
	$this->endWidget('zii.widgets.jui.CJuiDialog');
	
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'linkData-'.$user->tag_lcase().'-dialog',
		'options'=>array(
			'title'=>'Link Data to '.$username,
			'autoOpen'=>false,
			'modal' => true,
			'resizable' => false,
			'width'=>'auto',
			'height'=>'auto',
		),
	));

	echo $this->renderPartial('_formLinkData', array('model'=>$model)); 
	$this->endWidget('zii.widgets.jui.CJuiDialog');

	// the link that may open the dialog
	echo CHtml::link(Yii::t('translation', 'Recommend Me'), '#', array(
	   'onclick'=>'$("#recommend-'.$user->tag_lcase().'-dialog").dialog("open"); return false;', 
	   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
	   'class'=>'black',
	   'id'=>'btn-menu-recommend-me',
	));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-recommend-me', '$("#btn-menu-recommend-me").corner("'.$menu_dir.'")', CClientScript::POS_READY);

	$menu_left-=$menu_width;
	echo CHtml::link(Yii::t('translation', 'Image Gallery'), 
		array('view', 'id'=>$model->id, 'state'=>ViewPresenter::VIEW_IMAGEGALLERY), array(
		   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		   'class'=> ($presenter->state==ViewPresenter::VIEW_IMAGEGALLERY ? 'orange' : 'black'),
		   'id'=>'btn-menu-image-gallery',
		));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-image-gallery', '$("#btn-menu-image-gallery").corner("'.$menu_dir.'")', CClientScript::POS_READY);
	
	$menu_left-=$menu_width;
	echo CHtml::link(Yii::t('translation', 'Video Gallery'), 
		array('view', 'id'=>$model->id, 'state'=>ViewPresenter::VIEW_VIDEOGALLERY), array(
		   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		   'class'=> ($presenter->state==ViewPresenter::VIEW_VIDEOGALLERY ? 'orange' : 'black'),
		   'id'=>'btn-menu-video-gallery',
		));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-video-gallery', '$("#btn-menu-video-gallery").corner("'.$menu_dir.'")', CClientScript::POS_READY);
	
	$menu_left-=$menu_width;
	echo CHtml::link(Yii::t('translation', 'Profile'), 
		array('view', 'id'=>$model->id, 'state'=>ViewPresenter::VIEW_DEFAULT), array(
		   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		   'class'=> ($presenter->state==ViewPresenter::VIEW_DEFAULT ? 'orange' : 'black'),
		   'id'=>'btn-menu-profile',
		));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-profile', '$("#btn-menu-profile").corner("'.$menu_dir.'")', CClientScript::POS_READY);
	
	$menu_left-=$menu_width;
	echo CHtml::link(Yii::t('translation', 'Resume'), 
		array('resume2', 'id'=>$model->id), array(
		   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		   'class'=>'black',
		   'id'=>'btn-menu-resume',
		));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-resume', '$("#btn-menu-resume").corner("'.$menu_dir.'")', CClientScript::POS_READY);
		
	// the link that may open the dialog
	$menu_left-=$menu_width;
	echo CHtml::link(Yii::t('translation', 'Link Data'), '#', array(
	   'onclick'=>'$("#linkData-'.$user->tag_lcase().'-dialog").dialog("open"); return false;', 
	   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
	   'class'=>'black',
	   'id'=>'btn-menu-link-data',
	));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-link-data', '$("#btn-menu-link-data").corner("'.$menu_dir.'")', CClientScript::POS_READY);
	
	if($user->id==$model->id && (($user->isStudent() && $model->isStudent()) || ($user->isProfessor() && $model->isProfessor())))
	{
		
	}
	else
	{
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'message-'.$user->tag_lcase().'-dialog',
			'options'=>array(
				'title'=>'Leave Message to '.$username,
				'autoOpen'=>false,
				'modal' => true,
				'resizable' => false,
				'width'=>'auto',
				'height'=>'auto',
			),
		));

		echo $this->renderPartial('_formMessage', array('model'=>$model, 'user'=>$user)); 
		$this->endWidget('zii.widgets.jui.CJuiDialog');

		// the link that may open the dialog
		$menu_left-=$menu_width;
		echo CHtml::link(Yii::t('translation', 'Message Board'), '#', array(
		   'onclick'=>'$("#message-'.$user->tag_lcase().'-dialog").dialog("open"); return false;', 
		   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		   'class'=>'black',
		   'id'=>'btn-menu-message-board',
		));
		Yii::app()->getClientScript()->registerScript('style-btn-menu-message-board', '$("#btn-menu-message-board").corner("'.$menu_dir.'")', CClientScript::POS_READY);
		
		if(isset($_GET['open_msg']))
		{
			$cs=Yii::app()->getClientScript();
			$cs->registerScript(
				'register-auto-open-'.$user->tag_lcase().'-messages-dialog',
				'
				$("#message-'.$user->tag_lcase().'-dialog").dialog("open");
				',
				
				CClientScript::POS_READY
			);
		}
		
		if(($model->isStudent() && $user->isFollowingStudent($model->id)==false) ||
		 ($model->isProfessor() && $user->isFollowingProfessor($model->id)==false))
		{
			$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
				'id'=>'follow-student-dialog',
				'options'=>array(
					'title'=>'Follow',
					'autoOpen'=>false,
					'modal' => true,
					'resizable' => false,
					'width'=>'auto',
					'height'=>'auto',
				),
			));

			echo $this->renderPartial('_formFollow', array('model'=>$model, 'user'=>$user)); 
			$this->endWidget('zii.widgets.jui.CJuiDialog');

			// the link that may open the dialog
			$menu_left-=$menu_width;
			echo CHtml::link(Yii::t('translation', 'Follow'), '#', array(
			   'onclick'=>'$("#follow-student-dialog").dialog("open"); return false;', 
			   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
			   'id'=>'btn-menu-follow',
			   'class'=>'black',
			));
			Yii::app()->getClientScript()->registerScript('style-btn-menu-follow', '$("#btn-menu-follow").corner("'.$menu_dir.'")', CClientScript::POS_READY);
		}
		else
		{
			$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
				'id'=>'unfollow-student-dialog',
				'options'=>array(
					'title'=>'Unfollow '.$username,
					'autoOpen'=>false,
					'modal' => true,
					'resizable' => false,
					'width'=>'auto',
					'height'=>'auto',
				),
			));

			echo $this->renderPartial('_formUnfollow', array('model'=>$model)); 
			$this->endWidget('zii.widgets.jui.CJuiDialog');

			// the link that may open the dialog
			$menu_left-=$menu_width;
			echo CHtml::link(Yii::t('translation', 'Unfollow'), '#', array(
			   'onclick'=>'$("#unfollow-student-dialog").dialog("open"); return false;', 
			   'style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
			   'class'=>'black',
			   'id'=>'btn-menu-unfollow'
			));
			Yii::app()->getClientScript()->registerScript('style-btn-menu-unfollow', '$("#btn-menu-unfollow").corner("'.$menu_dir.'")', CClientScript::POS_READY);
		}
	}
}
else
{
echo CHtml::link(Yii::t('translation', 'Resume'), 
	array('resume2', 'id'=>$model->id), array(
	   'style'=>'float:right;width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
	   'id'=>'btn-menu-resume',
	   'class'=>'black',
	));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-resume', '$("#btn-menu-resume").corner("'.$menu_dir.'")', CClientScript::POS_READY);
}
?>
</div>


<div style="position: absolute; left: 400px; top: 90px; width: 560px; height: 295px; z-index: 4;">

<?php if(isset($username)): ?>
<p style="<?php echo $style_contact_detail; ?>"><?php echo Yii::t('translation', $model->tag_ucase()); ?>: <?php echo $username; ?></p>
<?php echo ''; ?>
<br /><br />
<?php endif; ?>

<?php if(isset($school) && $school !== ''): ?>
<p style="<?php echo $style_contact_detail; ?>"><?php echo CHtml::link(Yii::t('translation', $school), array('educationSchool/view', 'institute_name'=>$model->getSchoolName()), array('style'=>'color:white')); ?></p>
<br /><br />
<?php endif; ?>

<?php if(isset($email) && $email !== ''): ?>
<p style="<?php echo $style_contact_detail; ?>"><?php echo Yii::t('translation', 'Email'); ?>: <a style="color:white" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
<br /><br />
<?php endif; ?>

<?php if(isset($phone) && $phone !== ''): ?>
<p style="<?php echo $style_contact_detail; ?>"><?php echo Yii::t('translation', 'Tel'); ?>: <?php echo $phone; ?></p>
<br /><br />
<?php endif; ?>

<?php if(isset($ads) && $ads !== ''): ?>
<p style="<?php echo $style_ads; ?>"><?php echo $ads; ?></p>
<br /><br />
<?php endif; ?>

</div>

<div style="position: absolute; left: 10px; top: 470px; width: 860px; z-index: 4;">

<?php if($presenter->state==ViewPresenter::VIEW_DEFAULT): ?>
<table>
<tr><td colspan="2"><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Education'); ?>: </span></p></td></tr>
<tr><td colspan="2"><br /><ul id="wsbtxt6ul1"><li><span style="<?php echo $style_detail; ?>"><?php echo $model->getDegree(); ?>, <?php echo Chtml::link($model->getSchool()->getInstituteDesc(), array('educationSchool/view', 'institute_name'=>$model->getSchoolName())); ?>, GPA (<?php echo $model->getGPA(); ?>)</span>&nbsp;</li></ul></td></tr>

<tr><td colspan="2"><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Research Interest'); ?>: </span></p></td></tr>
<tr><td colspan="2"><p><span style="<?php echo $style_detail; ?>">
<?php 
$ri = $model->getResearchInterest(); 
$ri_array=explode(",", $ri);
foreach($ri_array as $ri_val)
{
	$research_field_name=trim($ri_val);
	echo CHtml::link(Yii::t('translation', $research_field_name), array('researchField/view', 'research_field_name'=>$research_field_name));
	echo ', ';
}
echo 'etc.';
?>
</span></p></td></tr>


<?php $article_count=count($articles); ?>
<?php if($article_count > 0): ?>
<tr><td colspan="2"><br /><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'Research Experiences'); ?>: </span></p></td></tr>
<tr><td colspan="2">
<p>
<br />
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

<tr><td colspan="2"><br /><p class="heading1"><span style="<?php echo $style_header; ?>"><?php echo Yii::t('translation', 'English'); ?>: </span></p></td></tr>
<tr><td colspan="2"><p>
<br />

<span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/> <?php echo Yii::t('translation', 'TOEFL'); ?>: <?php echo $model->getTOEFL(); ?> </span><br />
<span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" style="vertical-align:middle"/> <?php echo Yii::t('translation', 'GRE'); ?>: <?php echo $model->getGRE(); ?> </span><br />

</p></td></tr>
</table>

<p class="heading1"><span style="<?php echo $style_header; ?>">Social Graph from <?php echo $username; ?> </span></p><br />

<?php $this->renderPartial('_viewGraph', array('model'=>$model)); ?>

<?php elseif($presenter->state==ViewPresenter::VIEW_IMAGEGALLERY): ?>
<?php echo $this->renderPartial('_viewImageGallery', array('user'=>$model, 'profile'=>$presenter)); ?>
<?php elseif($presenter->state==ViewPresenter::VIEW_VIDEOGALLERY): ?>
<?php echo $this->renderPartial('_viewVidGallery', array('user'=>$model, 'profile'=>$presenter)); ?>
<?php endif; ?>
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
		Yii::t('translation', 'Search') => array('site/search'),
        Yii::t('translation', 'Search').' '.Yii::t('translation', 'Student') => array('student/search'),
        $username,
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


