<?php

class ResearchFieldController extends Controller
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
				'actions'=>array('index','view', 'create', 'update', 'delete', 'wiki'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('linkData'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionWiki()
	{
		$def=$_POST['def'];
		$url = 'http://en.wikipedia.org/w/api.php?action=opensearch&search='.urlencode($def).'&format=xml&limit=1';
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_HTTPGET, TRUE);

		curl_setopt($ch, CURLOPT_POST, FALSE);

		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_NOBODY, FALSE);

		curl_setopt($ch, CURLOPT_VERBOSE, FALSE);

		curl_setopt($ch, CURLOPT_REFERER, "");

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

		curl_setopt($ch, CURLOPT_MAXREDIRS, 4);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; he; rv:1.9.2.8) Gecko/20100722 Firefox/5.0.0');

		$page = curl_exec($ch);

		$xml = simplexml_load_string($page);

		if((string)$xml->Section->Item->Description) 
		{
			echo '{"term":"'.((string)$xml->Section->Item->Text).'", "desc":"'.((string)$xml->Section->Item->Description).'", "url":"'.((string)$xml->Section->Item->Url).'"}';
			//echo (string)$xml->Section->Item->Description;
		} else {
			echo '{"term":"", "desc":"", "url":""}';
		}
	}
	
	public function actionLinkData()
	{
		
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($research_field_name)
	{
		//$model=$this->loadModel($research_field_name);
		
		$model=ResearchField::model()->find('research_field_name=?', array($research_field_name));
		if(!isset($model))
		{
			$model=new ResearchField;
			$model->research_field_name=$research_field_name;
			$model->save();
			
		}
		$this->render('view',array(
				'model'=>$model,
			));
			
			/*
		if(isset($model->research_field_category) && $model->research_field_category !=='')
		{
			
			$research_field_category=$model->research_field_category;
			$model=ResearchField::model()->find('research_field_name=?', array($research_field_category));
			
			if(!isset($model))
			{
				$model=new ResearchField;
				$model->research_field_name=$research_field_category;
				$model->save();
			}
			
			$this->redirect(array('view', 'research_field_name'=>$research_field_category));
		}
		else
		{
			$this->render('view',array(
				'model'=>$model,
			));
		}*/
		
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ResearchField;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResearchField']))
		{
			$model->attributes=$_POST['ResearchField'];
			if($model->save())
				$this->redirect(array('view','research_field_name'=>$model->research_field_name));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($research_field_name)
	{
		$model=$this->loadModel($research_field_name);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResearchField']))
		{
			$model->attributes=$_POST['ResearchField'];
			if($model->save())
				$this->redirect(array('view','research_field_name'=>$model->research_field_name));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($research_field_name)
	{
		$model=$this->loadModel($research_field_name);
		if(isset($model))
		{
			$model->delete();
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		
		/*
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($research_field_name)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ResearchField');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ResearchField('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ResearchField']))
			$model->attributes=$_GET['ResearchField'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($research_field_name)
	{
		$model=ResearchField::model()->find('research_field_name=?', array($research_field_name));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='research-field-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
