<?php

Yii::app()->getClientScript()->registerScript(
		'style-unread-message',
		'$("#unread_message_field").corner("cc:#0F4D92 top");',
		CClientScript::POS_READY
);

class UserProfile
{
	const USERPROFILE_GUEST=0;
	const USERPROFILE_PROFESSOR=1;
	const USERPROFILE_STUDENT=2;
	
	public $username='Guest';
	public $userId='Guest';
	public $school='NA';
	 
	public $profile_image=null;
	public $email='';
	public $userhone='';
	public $ads='';
	
	public $tag;
	
	public function __construct()
	{
		$this->tag=UserProfile::USERPROFILE_GUEST;
	}
	
	public function isUser()
	{
		return $this->tag != UserProfile::USERPROFILE_GUEST;
	}
}
 
class ViewController
{
	const VIEW_STUDENTS=0;
	const VIEW_PROFESSORS=1;
	const VIEW_FOLLOWING=2;
	const VIEW_RECOMMENDING=3;
	const VIEW_SYS_RECOMMENDING=10;
	const VIEW_WALL_MESSAGES=4;
	const VIEW_INBOX=5;
	const VIEW_RESUMES=6;
	const VIEW_PRIVATE=7;
	const VIEW_IMAGEGALLERY=8;
	const VIEW_VIDGALLERY=9;
	
	public $tag;
	
	public function __construct()
	{
		$this->tag=ViewController::VIEW_STUDENTS;
		
		if(isset($_GET['language']))
		{
			Yii::app()->session['_lang']=$_GET['language'];
		}
	}
}

$profile=new UserProfile;
$controller=new ViewController;
$user=Yii::app()->accountMgr->getUser();



if(isset($user))
{
	$profile->username=$user->first_name.' '.$user->last_name;
	$profile->school=$user->getSchool()->getInstituteDesc();
	$profile->email=$user->getEmail();
	$profile->phone=$user->getContactFullNumber();
	$profile->ads=$user->getAds();
	$profile->profile_image=$user->getImagePathIfFileExists();
	
	$localization=$user->getLocalization();
	if(isset($localization))
	{
		Yii::app()->setLanguage(isset($localization) ? $localization : 'en_us'); 
		Yii::app()->session['_lang']=$localization;
	}
	
	if($user->isStudent())
	{
		$profile->tag=UserProfile::USERPROFILE_STUDENT;
	}
	else
	{
		$profile->tag=UserProfile::USERPROFILE_PROFESSOR;
	}
}
else
{
	$profile->profile_image='images/default_profile_image.png';
	$localization='en_us';
	if(isset(Yii::app()->session['_lang']))
	{
		$localization=Yii::app()->session['_lang'];
	}
	else
	{
		if(isset($geoIp) && isset($geoIp->countryCode))
		{
			if($geoIp->countryCode === 'CN')
			{
				$localization='zh_cn';
			}
		}
		
		$profile->tag=UserProfile::USERPROFILE_GUEST;
	}
	
	Yii::app()->setLanguage(isset($localization) ? $localization : 'en_us'); 
}




Yii::import('ext.EGeoIP');
		 
$geoIp = new EGeoIP();

$ip= CHttpRequest::getUserHostAddress();
$geoIp->locate($ip); // use your IP

$countryName='';
if(isset($geoIp))
{
	$countryName=$geoIp->countryName;
}

if(isset($countryName) && $countryName !== '')
{
	$this->pageTitle=Yii::app()->name.' ('.Yii::t('translation', $countryName).')'; 
}
else
{
	$this->pageTitle=Yii::app()->name; 
}


if(isset($_GET['status']))
{
	$controller->tag=$_GET['status'];
}
else
{
	if(isset($user))
	{
		$controller->tag=ViewController::VIEW_WALL_MESSAGES;
	}
	else
	{
		$controller->tag=ViewController::VIEW_STUDENTS;
	}
}

?>

<?php
if($profile->isUser())
{	
	/*
	echo CHtml::link('&nbsp; '.Yii::t('translation', 'New Messages').': (0) &nbsp;', 'unread_message_field', array(
	   'onclick'=>'$("#show-'.$user->tag_lcase().'-unread-messages-dialog").dialog("open"); return false;', 
	   'style'=>'position: absolute; left: 10px; top: 46px; z-index: 3;cursor:hand;width:128px',
	   'id'=>'unread_message_field',
	   'class'=>'inbox_btn',
	));*/

	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'show-'.$user->tag_lcase().'-unread-messages-dialog',
		'options'=>array(
			'title'=>'Your New Arrived Messages',
			'autoOpen'=>false,
			'modal' => true,
			'resizable' => false,
			'width'=>'auto',
			'height'=>'auto',
		),
	));

	echo $this->renderPartial('_formShow'.$user->tag_ucase().'UnreadMessages', array('model'=>$user)); 
	$this->endWidget('zii.widgets.jui.CJuiDialog');

	$cs=Yii::app()->getClientScript();
	$cs->registerScript(
	'handle-message-monitor-'.$user->tag_lcase(),
	'
	function handleMessageMonitor'.$user->tag_ucase().'()
	{
		$.post("index.php?r='.$user->tag_lcase().'/getUnreadMessagesCount&id='.$user->id.'", { },
		function(data) 
		{
			if(data.status=="failure")
			{
				alert(data.error);
			}
			else
			{
				var msg_count=data.msg_count;
				if(msg_count>0)
				{
					$("#show-'.$user->tag_lcase().'-unread-messages-dialog").dialog("open");
				}
			}
	   },
	   "json");
	}
	function handleMessageMonitor'.$user->tag_ucase().'Hidden()
	{
		$.post("index.php?r='.$user->tag_lcase().'/getUnreadMessagesCount&id='.$user->id.'", { },
		function(data) 
		{
			if(data.status=="failure")
			{
				alert(data.error);
			}
			else
			{
				var msg_count=data.msg_count;
				if(msg_count>0)
				{
					$("#inbox_field").text("Inbox: ("+msg_count+")");
					
				}
			}
	   },
	   "json");
	}
	',
	CClientScript::POS_END
	);
	$cs->registerScript(
		'register-message-monitor-'.$user->tag_lcase(),
		'
		window.setInterval(handleMessageMonitor'.$user->tag_ucase().'Hidden, 10000);
		handleMessageMonitor'.$user->tag_ucase().'Hidden();
		',
		CClientScript::POS_READY
	);
?>


<?php
$cs=Yii::app()->getClientScript();
$cs->registerCss(
'css-scroll-menu-always-top',
'
#toolbox_menu {
	width:940px;
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
	$menu_height=20;
	$menu_left=10;
	$menu_width=940 / 8 - 4;
	$menu_margin=4;
	
	/*
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'linkData-'.$user->tag_lcase().'-dialog',
		'options'=>array(
			'title'=>'Link Data to '.$profile->username,
			'autoOpen'=>false,
			'modal' => true,
			'resizable' => false,
			'width'=>'auto',
			'height'=>'auto',
		),
	));

	echo $this->renderPartial('_form'.$user->tag_ucase().'LinkData', array('model'=>$user)); 
	$this->endWidget('zii.widgets.jui.CJuiDialog');
	*/
	
	echo CHtml::link(Yii::t('translation', 'News'), 
		array('index', 'status'=>ViewController::VIEW_WALL_MESSAGES),
		array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_WALL_MESSAGES ? 'orange' : 'black',
		'id'=>'btn-menu-shared')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-shared', '$("#btn-menu-shared").corner("bottom")', CClientScript::POS_READY);
	
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Inbox').' (0)', 
		array('index', 'status'=>ViewController::VIEW_INBOX),
		array(
		'id'=>'inbox_field',
		'style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_INBOX ? 'orange' : 'black',
		'id'=>'btn-menu-inbox')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-inbox', '$("#btn-menu-inbox").corner("bottom")', CClientScript::POS_READY);
	
	/*
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Resumes'),
		array('index', 'status'=>ViewController::VIEW_RESUMES),
		array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_RESUMES ? 'orange' : 'black',
		'id'=>'btn-menu-resumes')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-resumes', '$("#btn-menu-resumes").corner("bottom")', CClientScript::POS_READY);
	*/
	
	/*
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Link Data'),
		'#',
		array(
	   'onclick'=>'$("#linkData-'.$user->tag_lcase().'-dialog").dialog("open"); return false;', 
	   'style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>'black',
		'id'=>'btn-menu-link-data'
	));
	Yii::app()->getClientScript()->registerScript('style-btn-menu-link-data', '$("#btn-menu-link-data").corner("bottom")', CClientScript::POS_READY);
	*/
	
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'System').' '.Yii::t('translation', 'Recommendation'),
		array('index', 'status'=>ViewController::VIEW_SYS_RECOMMENDING),
		array('style'=>'float:left; width: '.($menu_width*2).'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_SYS_RECOMMENDING ? 'orange' : 'black',
		'id'=>'btn-menu-sys-recommended')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-sys-recommended', '$("#btn-menu-sys-recommended").corner("bottom")', CClientScript::POS_READY);
	
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Follower').' '.Yii::t('translation', 'Recommendation'),
		array('index', 'status'=>ViewController::VIEW_RECOMMENDING),
		array('style'=>'float:left; width: '.($menu_width*2).'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_RECOMMENDING ? 'orange' : 'black',
		'id'=>'btn-menu-recommended')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-recommended', '$("#btn-menu-recommended").corner("bottom")', CClientScript::POS_READY);

	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Following'), 
		array('index', 'status'=>ViewController::VIEW_FOLLOWING),
		array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_FOLLOWING ? 'orange' : 'black',
		'id'=>'btn-menu-following')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-following', '$("#btn-menu-following").corner("bottom")', CClientScript::POS_READY);

	
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Public View'), 
		array('index', 'status'=>ViewController::VIEW_PRIVATE),
		array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>$controller->tag==ViewController::VIEW_PRIVATE ? 'orange' : 'black',
		'id'=>'btn-menu-personal')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-personal', '$("#btn-menu-personal").corner("bottom")', CClientScript::POS_READY);

	/*
	$menu_left+=($menu_width+$menu_margin);
	echo CHtml::link(Yii::t('translation', 'Public'), 
		array('index', 'status'=>ViewController::VIEW_STUDENTS),
		array('style'=>'float:left; width: '.$menu_width.'px; height: '.$menu_height.'px; z-index: 22;',
		'class'=>($controller->tag==ViewController::VIEW_STUDENTS || $controller->tag==ViewController::VIEW_PROFESSORS) ? 'orange' : 'black',
		'id'=>'btn-menu-public')
	);
	Yii::app()->getClientScript()->registerScript('style-btn-menu-public', '$("#btn-menu-public").corner("bottom")', CClientScript::POS_READY);
	*/
}
?>
</div>

<?php 
if($controller->tag==ViewController::VIEW_STUDENTS || $controller->tag==ViewController::VIEW_PROFESSORS)
{
	echo $this->renderPartial('_viewPublicProfile', array('controller'=>$controller));
}
else if($controller->tag==ViewController::VIEW_PRIVATE)
{
	echo $this->renderPartial('_viewPrivateProfile', array('user'=>$user, 'profile'=>$profile));
}
else
{
	echo $this->renderPartial('_viewShareProfile', array('user'=>$user, 'profile'=>$profile));
}
?>

<div style="position:absolute;top:470px; z-index: 5; width:940px;">

<?php
if($controller->tag==ViewController::VIEW_PRIVATE)
{
	echo $this->renderPartial('_viewUser', array('user'=>$user, 'profile'=>$profile)); 
}
elseif($controller->tag==ViewController::VIEW_STUDENTS)
{
	echo $this->renderPartial('_viewStudents', array('user'=>$user, 'controller'=>$controller)); 
}
elseif($controller->tag==ViewController::VIEW_PROFESSORS)
{
	echo $this->renderPartial('_viewProfessors', array('user'=>$user, 'controller'=>$controller)); 
}
elseif($controller->tag==ViewController::VIEW_FOLLOWING)
{
	echo $this->renderPartial('_viewFollowing', array('user'=>$user, 'profile'=>$profile)); 
}
elseif($controller->tag==ViewController::VIEW_RECOMMENDING)
{
	echo $this->renderPartial('_viewRecommending', array('user'=>$user, 'profile'=>$profile)); 
}
elseif($controller->tag==ViewController::VIEW_SYS_RECOMMENDING)
{
	echo $this->renderPartial('_viewSysRecommended', array('user'=>$user, 'profile'=>$profile)); 
}
elseif($controller->tag==ViewController::VIEW_WALL_MESSAGES)
{
	echo $this->renderPartial('_viewWallMessages', array('user'=>$user, 'profile'=>$profile)); 
}
elseif($controller->tag==ViewController::VIEW_INBOX)
{
	echo $this->renderPartial('_viewInbox', array('user'=>$user, 'profile'=>$profile, 'controller'=>$controller)); 
}
elseif($controller->tag==ViewController::VIEW_RESUMES)
{
	echo $this->renderPartial('_viewResumes', array('user'=>$user, 'profile'=>$profile)); 
} 
elseif($controller->tag==ViewController::VIEW_IMAGEGALLERY)
{
	echo $this->renderPartial('_viewImageGallery', array('user'=>$user, 'profile'=>$profile)); 
} 
elseif($controller->tag==ViewController::VIEW_VIDGALLERY)
{
	echo $this->renderPartial('_viewVidGallery', array('user'=>$user, 'profile'=>$profile)); 
} 
?>

<div style="height:38px;">
</div>

</div>



<?php
$this->renderPartial('_viewFloatbar', array('user'=>$user, 'profile'=>$profile, 'controller'=>$controller, 'countryName'=>$countryName)); 
?>

