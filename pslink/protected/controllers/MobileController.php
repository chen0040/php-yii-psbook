<?php

class MobileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'viewResearch', 'viewSchool', 'login', 'logout', 'loginFailed', 'submitLogin', 'lookingForStudent', 'lookingForProfessor', 'viewStudent', 'viewProfessor'),
				'users'=>array('*'),
			),/*
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	 /*
	public function actionView($id)
	{
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}*/
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Gender');
		$this->renderPartial('index',array(
			//'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionLoginFailed()
	{
		//$dataProvider=new CActiveDataProvider('Gender');
		$this->renderPartial('loginFailed',array(
			'url'=>$_GET['url']
		));
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
			$this->redirect(array('index'));
		}
		else
		{
			$this->redirect(array('loginFailed',
				'url'=>$returnUrl,
				'error'=>'Invalid Login',
			));
		}
	}
	
	public function actionLogin()
	{
		$url='index';
		$url=$_GET['url'];
		$this->renderPartial('login',array(
			'url'=>$url,
		));
	}
	
	public function actionLookingForStudent()
	{
		//$dataProvider=new CActiveDataProvider('Gender');
		$this->renderPartial('lookingForStudent',array(
			//'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionViewStudent($id)
	{
		$model=Student::model()->findByPk($id);
		$this->renderPartial('viewStudent',array(
			'model'=>$model,
		));
	}
	
	public function actionLookingForProfessor()
	{
		//$dataProvider=new CActiveDataProvider('Gender');
		$this->renderPartial('lookingForProfessor',array(
			//'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionViewProfessor($id)
	{
		$model=Professor::model()->findByPk($id);
		$this->renderPartial('viewProfessor',array(
			'model'=>$model,
		));
	}
	
	public function actionViewSchool($institute_name)
	{		
		$model=EducationSchool::model()->find('institute_name=?', array($institute_name));
		
		if(!isset($model))
		{
			$model=new EducationSchool;
			$model->institute_name=$institute_name;
			$model->save();
		}
		
		$this->renderPartial('viewSchool',array(
			'model'=>$model,
		));
	}
	
	public function actionViewResearch($research_field_name)
	{
		$model=ResearchField::model()->find('research_field_name=?', array($research_field_name));
		if(!isset($model))
		{
			$model=new ResearchField;
			$model->research_field_name=$research_field_name;
			$model->save();
			
		}
		$this->renderPartial('viewResearch',array(
				'model'=>$model,
			));
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mobile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
