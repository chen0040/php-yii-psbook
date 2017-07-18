<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function actionFeedAtom()
	{
		Yii::import('ext.feed.*');
		
		$professors=Professor::model()->findAll(array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
				));
				
		$students=Student::model()->findAll(array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
				));
 
		$feed = new EFeed(EFeed::ATOM);
		 
		// IMPORTANT : No need to add id for feed or channel. It will be automatically created from link.
		$feed->title = 'PS-Book Advertisements for Professors and Students';
		$feed->link = 'http://www.ps-book.com';
		 
		$feed->addChannelTag('updated', date(DATE_ATOM, time()));
		$feed->addChannelTag('author', array('name'=>'PS-Book Team'));
		 
		foreach($professors as $model)
		{
			$item = $feed->createNewItem();
			 
			$item->title = $model->tag_ucase().' '.$model->first_name.' '.$model->last_name.': '.$model->getAds();
			$item->link  = 'http://www.ps-book.com';
			// we can also insert well formatted date strings
			$item->date =$model->update_time;
			$item->description = 'I am a '.$model->tag_ucase().' from '.$model->getSchool()->getInstituteDesc().'. My research interest include '.$model->getResearchInterest().'. You can know more about me by visiting '.Yii::app()->createAbsoluteUrl($model->tag_lcase().'/view', array('id'=>$model->id)).'. Please contact me at '.CHtml::mailto($model->email1).' if you are interested.';
			 
			$feed->addItem($item);
		}
		
		foreach($students as $model)
		{
			$item = $feed->createNewItem();
			 
			$item->title = $model->tag_ucase().' '.$model->first_name.' '.$model->last_name.': '.$model->getAds();
			$item->link  = 'http://www.ps-book.com';
			// we can also insert well formatted date strings
			$item->date =$model->update_time;
			$item->description = 'I am a '.$model->tag_ucase().' from '.$model->getSchool()->getInstituteDesc().'. My research interest include '.$model->getResearchInterest().'. You can know more about me by visiting '.Yii::app()->createAbsoluteUrl($model->tag_lcase().'/view', array('id'=>$model->id)).'. Could you contact me at '.CHtml::mailto($model->email1).' if you have a PhD in the related area to offer?';
			 
			$feed->addItem($item);
		}
		 
		$feed->generateFeed();
	}
	
	public function actionFeedRSS1()
	{
		Yii::import('ext.feed.*');
		
		$professors=Professor::model()->findAll(array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
				));
				
		$students=Student::model()->findAll(array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
				));
		 
		// specify feed type
		$feed = new EFeed(EFeed::RSS1);
		$feed->title = 'PS-Book Advertisements for Professors and Students';
		$feed->link = 'http://www.ps-book.com';
		$feed->description = 'Welcome Professors and Students All over the World!';
		$feed->RSS1ChannelAbout = 'http://www.ps-book.com/about';
		
		foreach($professors as $model)
		{
			$item = $feed->createNewItem();
			$item->title =  $model->tag_ucase().' '.$model->first_name.' '.$model->last_name.': '.$model->getAds();
			$item->link = 'http://www.ps-book.com';
			$item->date = time();
			$item->description = 'I am a '.$model->tag_ucase().' from '.$model->getSchool()->getInstituteDesc().'. My research interest include '.$model->getResearchInterest().'. You can know more about me by visiting '.Yii::app()->createAbsoluteUrl($model->tag_lcase().'/view', array('id'=>$model->id)).'. Please contact me at '.CHtml::mailto($model->email1).' if you are interested.';
			$item->addTag('dc:subject', 'Advertisement');
			$feed->addItem($item);
		}
		
		foreach($students as $model)
		{
			$item = $feed->createNewItem();
			$item->title =  $model->tag_ucase().' '.$model->first_name.' '.$model->last_name.': '.$model->getAds();
			$item->link = 'http://www.ps-book.com';
			$item->date = time();
			$item->description = 'I am a '.$model->tag_ucase().' from '.$model->getSchool()->getInstituteDesc().'. My research interest include '.$model->getResearchInterest().'. You can know more about me by visiting '.Yii::app()->createAbsoluteUrl($model->tag_lcase().'/view', array('id'=>$model->id)).'. Could you contact me at '.CHtml::mailto($model->email1).' if you have a PhD in the related area to offer?';
			$item->addTag('dc:subject', 'Advertisement');
			$feed->addItem($item);
		}
		 
		$feed->generateFeed();
	}
	
	public function actionFeedRSS2()
	{
		Yii::import('ext.feed.*');
		
		
		$professors=Professor::model()->findAll(array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
				));
				
		$students=Student::model()->findAll(array( 
					'condition'=>'looking_for!=""', 
					'order'=>'update_time DESC',
				));
		
		// RSS 2.0 is the default type
		$feed = new EFeed();
		
		$feed->title= 'PS-Book Advertisements for Professors and Students';
		$feed->description = 'Welcome Professors and Students All over the World!';
		 
		//$feed->setImage('PS-Book','http://www.ps-book.com/', 'http://www.yiiframework.com/forum/uploads/profile/photo-7106.jpg');
		 
		$feed->addChannelTag('language', 'en-us');
		$feed->addChannelTag('pubDate', date(DATE_RSS, time()));
		$feed->addChannelTag('link', 'http://www.ps-book.com/rss' );
		 
		// * self reference
		//$feed->addChannelTag('atom:link','http://www.ps-book.com/rss');
		 
		foreach($professors as $model)
		{
			$item = $feed->createNewItem();
			 
			$item->title = $model->tag_ucase().' '.$model->first_name.' '.$model->last_name.': '.$model->getAds();
			$item->link = "http://www.ps-book.com";
			$item->date = time();
			$item->description = 'I am a '.$model->tag_ucase().' from '.$model->getSchool()->getInstituteDesc().'. My research interest include '.$model->getResearchInterest().'. You can know more about me by visiting '.Yii::app()->createAbsoluteUrl($model->tag_lcase().'/view', array('id'=>$model->id)).'. Please contact me at '.CHtml::mailto($model->email1).' if you are interested.';
			// this is just a test!!
			//$item->setEncloser('http://www.ps-book.com', '1111111', 'audio/mpeg');
			 
			$item->addTag('author', 'team@ps-book.com (PS-Book Team)');
			$item->addTag('guid', 'http://www.ps-book.com/',array('isPermaLink'=>'true'));
			 
			$feed->addItem($item);
		}
		
		foreach($students as $model)
		{
			$item = $feed->createNewItem();
			 
			$item->title = $model->tag_ucase().' '.$model->first_name.' '.$model->last_name.': '.$model->getAds();
			$item->link = "http://www.ps-book.com";
			$item->date = time();
			$item->description = 'I am a '.$model->tag_ucase().' from '.$model->getSchool()->getInstituteDesc().'. My research interest include '.$model->getResearchInterest().'. You can know more about me by visiting '.Yii::app()->createAbsoluteUrl($model->tag_lcase().'/view', array('id'=>$model->id)).'. Could you contact me at '.CHtml::mailto($model->email1).' if you have a PhD in the related area to offer?';
			// this is just a test!!
			//$item->setEncloser('http://www.tester.com', '1111111', 'audio/mpeg');
			 
			$item->addTag('author', 'team@ps-book.com (PS-Book Team)');
			$item->addTag('guid', 'http://www.ps-book.com/',array('isPermaLink'=>'true'));
			 
			$feed->addItem($item);
		}
		
		$feed->generateFeed();
		Yii::app()->end();
	}
	
	public function actionSubmitLogin()
	{
		$model=new LoginForm;
		
		if(isset($_POST['username']))
		{
			$model->username=$_POST['username'];
		}
		if(isset($_POST['password']))
		{
			$model->password=$_POST['password'];
		}
		if(isset($_POST['rememberMe']))
		{
			$model->rememberMe=$_POST['rememberMe'];
		}
		
		$returUrl='index';
		if(isset($_POST['returnUrl']))
		{
			$returnUrl=$_POST['returnUrl'];
		}
		// validate user input and redirect to the previous page if valid
		if($model->validate() && $model->login())
		{
			echo '{"status":"success"}';
		}
		else
		{
			echo '{"status":"failure", "error":"invalid login"}';
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$browser = Yii::app()->browser->getBrowser();
		$platform = Yii::app()->browser->getPlatform();
			
		if($browser==Browser::PLATFORM_IPHONE || $browser==Browser::BROWSER_IPOD || $browser==Browser::BROWSER_ANDROID)
		{
			$this->redirect(array('mobile/index'));
		}
		else
		{
			$this->render('index');
		}
	}
	
	public function actionSearch()
	{
		$model=null;
		if(isset($_GET['mtype']))
		{	
			$mtype=$_GET['mtype'];
			if($mtype==Messages::RECTYPE_STUDENT)
			{
				$model = new Student;
			}
			else
			{
				$model = new Professor;
			}
			
			$model->unsetAttributes();  // clear any default values
		}		
		
		if(isset($_GET['Student']))
		{
			if(!isset($model))
			{
				$model=new Student;
				$model->unsetAttributes();  // clear any default values
			}
			$model->attributes=$_GET['Student'];
		}
		
		if(isset($_GET['Professor']))
		{
			if(!isset($model))
			{
				$model=new Professor;
				$model->unsetAttributes();  // clear any default values
			}
			$model->attributes=$_GET['Professor'];
		}
		
		if(!isset($model))
		{
			$model=new Student;
			$model->unsetAttributes();  // clear any default values
		}
			
		$this->render('search', array('model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}