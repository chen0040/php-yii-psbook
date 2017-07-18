<?php

class StudentController extends Controller
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
	
	public function actionSetRule($id)
	{
		$success_msg='success';
		$failure_msg='failure';
		
		$model=$this->loadModel($id);
		
		$model->setRule($_POST['rule_name'], $_POST['rule_value']);
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
				'actions'=>array('index','view', 'myProfileView', 'create', 'linkData', 'resume', 'resume1', 'resume2'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('setRule', 'update', 'settings', 'updatePartial', 'addArticle', 'deleteGalleryVideo', 'updateGalleryVideoDesc', 'deleteGalleryImage', 'updateGalleryImageDesc', 'deleteArticle', 'follow', 'unfollow', 'message', 'wallMessage', 'recommend', 'clearMessages', 'showMessages', 'showUnreadMessages', 'getUnreadMessagesCount', 'dismissUnreadMessages', 'search', 'getProvinces', 'getCities', 'getSchoolsByLocation'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		
		$this->render('view',array(
			'model'=>$model
		));
	}
	
	public function actionUpdateGalleryImageDesc($id)
	{
		$model=$this->loadModel($id);
		
		$imagename=$_POST['title'];
		$img_desc=$_POST['desc'];
		//$img_desc='test test test';
		$foldername=$model->mtype().'_'.$model->id;
		
		$pathname='imggallery/images/'.$foldername.'/'.$imagename;
		
		if(file_exists($pathname))
		{
			$rfile_ffn=$pathname.'.dat';
			
			$myFile = $rfile_ffn;
			$fh = fopen($myFile, 'w') or die("can't open file");
			$stringData = $img_desc;
			fwrite($fh, $stringData);
			fclose($fh);
		}
		
	}
	
	public function actionDeleteGalleryImage($id)
	{
		$model=$this->loadModel($id);
		
		$imagename=$_POST['title'];
		$foldername=$model->mtype().'_'.$model->id;
		
		$pathname='imggallery/images/'.$foldername.'/'.$imagename;
		
		if(file_exists($pathname))
		{
			unlink($pathname);
		}
		
		$ffn_pathname=$pathname.'.dat';
		if(file_exists($ffn_pathname))
		{
			unlink($ffn_pathname);
		}
	}
	
	public function actionUpdateGalleryVideoDesc($id)
	{
		$model=$this->loadModel($id);
		
		$imagename=$_POST['title'];
		$img_desc=$_POST['desc'];
		//$img_desc='test test test';
		$foldername=$model->mtype().'_'.$model->id;
		
		$pathname='vidgallery/videos/'.$foldername.'/'.$imagename;
		
		if(file_exists($pathname))
		{
			$rfile_ffn=$pathname.'.dat';
			
			$myFile = $rfile_ffn;
			$fh = fopen($myFile, 'w') or die("can't open file");
			$stringData = $img_desc;
			fwrite($fh, $stringData);
			fclose($fh);
		}
		
	}
	
	public function actionDeleteGalleryVideo($id)
	{
		$model=$this->loadModel($id);
		
		$imagename=$_POST['title'];
		$foldername=$model->mtype().'_'.$model->id;
		
		$pathname='vidgallery/videos/'.$foldername.'/'.$imagename;
		
		if(file_exists($pathname))
		{
			unlink($pathname);
		}
		
		$ffn_pathname=$pathname.'.dat';
		if(file_exists($ffn_pathname))
		{
			unlink($ffn_pathname);
		}
	}
	
	public function actionGetProvinces($id)
	{
		$country=$_POST['country'];
		$provinces=Yii::app()->schoolService->getProvinces($country);
		
		$result='{"status":"success", "provinces":[';
		$p_count=count($provinces);
		for($i=0; $i < $p_count; $i=$i+1)
		{
			$province=$provinces[$i];
			if($i==$p_count-1)
			{
				$result.='{"name":"'.$province.'"}';
			}
			else
			{
				$result.='{"name":"'.$province.'"},';
			}
		}
		$result.=(']}');
		echo $result;
	}
	
	public function actionGetCities($id)
	{
		$country=$_POST['country'];
		$province=$_POST['province'];
		$cities=Yii::app()->schoolService->getCities($country, $province);
		
		$result='{"status":"success", "cities":[';
		$p_count=count($cities);
		for($i=0; $i < $p_count; $i=$i+1)
		{
			$city=$cities[$i];
			if($i==$p_count-1)
			{
				$result.='{"name":"'.$city.'"}';
			}
			else
			{
				$result.='{"name":"'.$city.'"},';
			}
		}
		$result.=(']}');
		echo $result;
	}
	
	public function actionGetSchoolsByLocation($id)
	{
		$country=$_POST['country'];
		$province=$_POST['province'];
		$city=$_POST['city'];
		$schools=Yii::app()->schoolService->getSchoolsByLocation($country, $province, $city);
		
		$result='{"status":"success", "schools":[';
		$p_count=count($schools);
		for($i=0; $i < $p_count; $i=$i+1)
		{
			$school=$schools[$i];
			if($i==$p_count-1)
			{
				$result.='{"name":"'.$school.'"}';
			}
			else
			{
				$result.='{"name":"'.$school.'"},';
			}
		}
		$result.=(']}');
		echo $result;
	}
	
	public function actionRecommend($id)
	{
		$success_msg='success';
		$failure_msg='failure';
		
		$model=$this->loadModel($id);
		
		$subject_id='';
		$subject_type='';
		$to_id='';
		$to_type='';
		$recommend_body='';
		
		if(isset($_POST['subject_id']))
		$subject_id=$_POST['subject_id'];
		if(isset($_POST['subject_type']))
		$subject_type=$_POST['subject_type'];
		if(isset($_POST['to_id']))
		$to_id=$_POST['to_id'];
		if(isset($_POST['to_type']))
		$to_type=$_POST['to_type'];
		if(isset($_POST['recommend_body']))
		$recommend_body=$_POST['recommend_body'];
		
		$suc_msg='{"status":"success", "subject_id":"'.$subject_id.'", "subject_type":"'.$subject_type.'", "to_id":"'.$to_id.'", "to_type":"'.$to_type.'", "recommend_body":"'.$recommend_body.'"}';
		$err_msg='{"status":"failure", "error":"invalid input"}';
		
		$recommend_msg=new Messages;
		
		$myRec=null;
		$mySub=null;
		
		if($to_type==Messages::RECTYPE_STUDENT)
		{
			$myRec=$this->loadModel($to_id);
		}
		else
		{
			$myRec=$this->loadProfessor($to_id);
		}
		
		if($subject_type==Messages::RECTYPE_STUDENT)
		{
			$mySub=$this->loadModel($subject_id);
		}
		else
		{
			$mySub=$this->loadProfessor($subject_id);
		}
		
		
		$recommend_msg->to_id=$to_id;
		$recommend_msg->from_id=$id;
		$recommend_msg->to_type=$to_type;
		$recommend_msg->from_type=Messages::RECTYPE_STUDENT;
		$recommend_msg->text_type=Messages::MSGTYPE_RECOMMEND;
		$recommend_msg->note=$recommend_body;
		if(isset($me) && isset($myRec) && isset($mySub))
		{
			$recommend_msg->text_message='[PS-Bok]: '.$model->first_name.' '.$model->last_name.' is recommending '.$mySub->first_name.' '.$mySub->last_name.' to '.$myRec->first_name.' '.$myRec->last_name;
		}
		else
		{
			$recommend_msg->text_message='[PS-Bok]: Recommending';
		}
		$recommend_msg->text_date=new CDbExpression('NOW()');
		$recommend_msg->field1=''.$subject_id;
		$recommend_msg->field2=''.$subject_type;
		if($recommend_msg->save())
		{
			echo $suc_msg;
		}
		else
		{
			echo $err_msg;
		}
	}
	
	public function actionResume($id)
	{
		$model=$this->loadModel($id);
		$this->renderPartial('resume', array(
			'model'=>$model
		), false, false);
	}
	
	public function actionResume2($id)
	{
		$model=$this->loadModel($id);
		spl_autoload_unregister(array('YiiBase','autoload')); //required when incorporating third party lib
		require_once Yii::app()->basePath.'/extensions/PHPWord/PHPWord.php';
		spl_autoload_register(array('YiiBase','autoload')); //required when incorporating third party lib

		$styleField = array('color'=>'000000');
		
		// Create a new PHPWord Object
		$PHPWord = new PHPWord();
		$PHPWord->addTableStyle('fieldStyle', $styleField);
		
		// New portrait section
		$section = $PHPWord->createSection();
		
		
		
		// Create header
		$header = $section->createHeader();
		// Add a watermark to the header
		$header->addWatermark('img/doc_background.jpg', array('marginTop'=>-80, 'marginLeft'=>-100));
		//$header->addText("PS-Book: Resume from ".$model->first_name.' '.$model->last_name);
		
		$footer = $section->createFooter();
		//$footer->addText("PS-Book: ".date('Y-M-d'));
		//$footer->addWatermark('/img/blue_line.jpg', array('marginTop'=>200, 'marginLeft'=>55));
		//$footer->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));
		
		$section->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));

		// Add table
		$table = $section->addTable();

		$table_column1_width=1750;
		$table_column2_width=7050;
		
		
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Name:");
		$table->addCell($table_column2_width)->addText($model->first_name.' '.$model->last_name, 'fieldStyle');
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Photo:");
		$table->addCell($table_column2_width)->addImage($model->getImagePathIfFileExists(), array('width'=>150, 'height'=>150, 'align'=>'left'));
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("School:");
		$table->addCell($table_column2_width)->addText($model->getSchoolName());
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Email:");
		$table->addCell($table_column2_width)->addLink('mailto://'.$model->getEmail(), $model->getEmail(), array('color'=>'0000FF', 'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE));
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Tel:");
		$table->addCell($table_column2_width)->addText($model->getContactFullNumber());
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Research Interest:");
		$table->addCell($table_column2_width)->addText($model->getResearchInterest());
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Objective:");
		$table->addCell($table_column2_width)->addText($model->getAds());
		
		$section->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));
		//$section->addTextBreak(1);
		
		
		$table = $section->addTable();
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Education:");
		$table->addCell($table_column2_width)->addText($model->getDegree().', '.$model->getSchoolName().', GPA ('.$model->getGPA());

		$table->addRow();
		$table->addCell($table_column1_width)->addText("Research Experiences:");
		
		$artext='';
		$articles=$model->getArticles();
		$article_count=count($articles);
		if($article_count > 0)
		{
			foreach($articles as $article_key => $article)
			{
				if(isset($article))
				{
					$artext.=($article->toString().', ');
				}
			}
			$artext.='etc.';
		}
		$table->addCell($table_column2_width)->addText($artext);
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("English:");
		$table->addCell($table_column2_width)->addText('TOFLE: ('.$model->getTOEFL().'), GRE: ('.$model->getGRE().'), GPA: ('.$model->getGPA().')');

		$section->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));

		// At least write the document to webspace:
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		
		$rfile='resumes/s_'.$model->username.'.docx';
		$objWriter->save($rfile);
		
		
		$this->renderPartial('resume2', array(
			'model'=>$model
		), false, false);
	}
	
	public function actionResume1($id)
	{
		$model=$this->loadModel($id);
		spl_autoload_unregister(array('YiiBase','autoload')); //required when incorporating third party lib
		require_once Yii::app()->basePath.'/extensions/PHPWord/PHPWord.php';
		spl_autoload_register(array('YiiBase','autoload')); //required when incorporating third party lib

		$styleField = array('color'=>'000000');
		
		// Create a new PHPWord Object
		$PHPWord = new PHPWord();
		$PHPWord->addTableStyle('fieldStyle', $styleField);
		
		// New portrait section
		$section = $PHPWord->createSection();
		
		
		
		// Create header
		$header = $section->createHeader();
		// Add a watermark to the header
		//$header->addWatermark('img/doc_background.jpg', array('marginTop'=>-80, 'marginLeft'=>-100));
		$header->addText("PS-Book: Resume from ".$model->first_name.' '.$model->last_name);
		
		$footer = $section->createFooter();
		$footer->addText("PS-Book: ".date('Y-M-d'));
		//$footer->addWatermark('/img/blue_line.jpg', array('marginTop'=>200, 'marginLeft'=>55));
		//$footer->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));
		
		//$section->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));

		// Add table
		$table = $section->addTable();

		$table_column1_width=1750;
		$table_column2_width=7050;
		
		
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Name:");
		$table->addCell($table_column2_width)->addText($model->first_name.' '.$model->last_name, 'fieldStyle');
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Photo:");
		$table->addCell($table_column2_width)->addImage($model->getImagePathIfFileExists(), array('width'=>150, 'height'=>150, 'align'=>'left'));
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("School:");
		$table->addCell($table_column2_width)->addText($model->getSchoolName());
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Email:");
		$table->addCell($table_column2_width)->addLink('mailto://'.$model->getEmail(), $model->getEmail(), array('color'=>'0000FF', 'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE));
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Tel:");
		$table->addCell($table_column2_width)->addText($model->getContactFullNumber());
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Research Interest:");
		$table->addCell($table_column2_width)->addText($model->getResearchInterest());
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Objective:");
		$table->addCell($table_column2_width)->addText($model->getAds());
		
		//$section->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));
		//$section->addTextBreak(1);
		
		
		$table = $section->addTable();
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("Education:");
		$table->addCell($table_column2_width)->addText($model->getDegree().', '.$model->getSchoolName().', GPA ('.$model->getGPA());

		$table->addRow();
		$table->addCell($table_column1_width)->addText("Research Experiences:");
		
		$artext='';
		$articles=$model->getArticles();
		$article_count=count($articles);
		if($article_count > 0)
		{
			foreach($articles as $article_key => $article)
			{
				if(isset($article))
				{
					$artext.=($article->toString().', ');
				}
			}
			$artext.='etc.';
		}
		$table->addCell($table_column2_width)->addText($artext);
		
		$table->addRow();
		$table->addCell($table_column1_width)->addText("English:");
		$table->addCell($table_column2_width)->addText('TOFLE: ('.$model->getTOEFL().'), GRE: ('.$model->getGRE().'), GPA: ('.$model->getGPA().')');

		//$section->addImage('img/hr.png', array('width'=>610, 'height'=>20, 'align'=>'left'));

		// At least write the document to webspace:
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		
		$rfile='resumes/s_'.$model->username.'.docx';
		$objWriter->save($rfile);
		
		
		$this->renderPartial('resume2', array(
			'model'=>$model
		), false, false);
	}
	
	public function actionLinkData($id)
	{
		$model=$this->loadModel($id);
		
		$width=960;
		$height=600;
		
		if(isset($_GET['width']))
		{
			$width=$_GET['width'];
		}
		if(isset($_GET['height']))
		{
			$height=$_GET['height'];
		}
		
		$this->renderPartial('linkData',array(
			'model'=>$model,
			'linkWidth'=>$width,
			'linkHeight'=>$height
			), false, true
		);
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionMyProfileView($id)
	{
		$model=$this->loadModel($id);
		
		$studentResearchFieldDataProvider=new CActiveDataProvider('StudentResearchField', 
			array( 
				'criteria'=>array(
					'condition'=>'student_id=:studentId',
					'params'=>array(':studentId'=>$model->id), 
				),
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		
		$studentArticleDataProvider=new CActiveDataProvider('StudentArticle', 
			array( 
				'criteria'=>array(
					'condition'=>'student_id=:studentId',
					'params'=>array(':studentId'=>$model->id), 
				),
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		
		$studentAwardsDataProvider=new CActiveDataProvider('Awards', 
			array( 
				'criteria'=>array(
					'condition'=>'student_id=:studentId',
					'params'=>array(':studentId'=>$model->id), 
				),
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		
		$studentFriendsDataProvider=new CActiveDataProvider('StudentFriends', 
			array( 
				'criteria'=>array(
					'condition'=>'student_id=:studentId',
					'params'=>array(':studentId'=>$model->id), 
				),
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		
		$this->render('myProfileView',array(
			'model'=>$model,
			'studentResearchFieldDataProvider'=>$studentResearchFieldDataProvider,
			'studentArticleDataProvider'=>$studentArticleDataProvider,
			'studentAwardsDataProvider'=>$studentAwardsDataProvider,
			'studentFriendsDataProvider'=>$studentFriendsDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Student;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			$orig_password=$model->password;
			
			if($model->save())
			{
				$identity=new UserIdentity($model->username,$orig_password);
				
                $identity->authenticate();
				
				if($identity->errorCode===UserIdentity::ERROR_NONE)
				{
					$duration=0; //3600*24*30 // 30 days
					Yii::app()->user->login($identity, $duration);
				
					$this->redirect(array('site/index'));
				}
				else
				{
					$this->redirect(array('view', 'id'=>$model->id));
				}
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionSettings($id)
	{
		$model=$this->loadModel($id);
		$this->render('settings',array(
			'model'=>$model,
		));
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			$model->image=CUploadedFile::getInstance($model,'image');
			if($model->save())
			{
				if(isset($model->image))
				{
					$ext = strtolower($model->image->getExtensionName());
					$rfile=$model->getRawImagePathWithExt($ext);
					$model->image->saveAs($rfile);
					$image=null;
					if($ext==='png')
					{
						$image=imagecreatefrompng($rfile);
					}
					else if($ext==='jpg')
					{
						$image=imagecreatefromjpeg($rfile);
					}
					else if($ext==='gif')
					{
						$image=imagecreatefromgif($rfile);
					}
					//$image->resize(128, 128);
					imagepng($image, $model->getRawImagePath());
					if(file_exists($rfile))
					{
						unlink($rfile);
					}
					
					$rfile=$model->getRawImagePath();
					$img = Yii::app()->simpleImage->load($rfile);
					$img->resize(250, 250);
					$img->save($model->getImagePath());
					
					$img = Yii::app()->simpleImage->load($rfile);
					$img->resize(60, 60);
					$img->save($model->getThumbnailImagePath());
					
					if(file_exists($rfile))
					{
						unlink($rfile);
					}
				}
				
				$this->redirect(array('site/index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatePartial($id)
	{
		$model=$this->loadModel($id);

		$success_msg='success';
		$failure_msg='failure';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['partial_password']))
		{
			$pass=trim($_POST['partial_password']);
			if($pass==='')
			{
				echo 'Invalid Input!';
			}
			else
			{
				$model->password=$model->encrypt($pass);
				
				if($model->save())
				{
					echo $success_msg;
				}
			}
		}
		else if(isset($_POST['partial_first_name']) && isset($_POST['partial_last_name']))
		{
			$first_name=trim($_POST['partial_first_name']);
			$last_name=trim($_POST['partial_last_name']);
			$model->first_name=$first_name;
			$model->last_name=$last_name;
			if($model->save())
			{
				echo $model->first_name.' '.$model->last_name;
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_highest_education_school']))
		{
			$highest_education_school=trim($_POST['partial_highest_education_school']);
			$model->highest_education_school=$highest_education_school;
			if($model->save())
			{
				echo $model->highest_education_school;
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_gpa_score']) && isset($_POST['partial_degree']))
		{
			$gpa_score=trim($_POST['partial_gpa_score']);
			$degree=$_POST['partial_degree'];
			$model->gpa_score=$gpa_score;
			$model->education_level_id=$degree;
			if($model->save())
			{
				echo '{"degree":"'.$model->getDegree().'", "schoolname":"'.$model->getSchoolName().'", "gpa_score":"'.$model->getGPA().'"}';
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_gre_score']) && isset($_POST['partial_tofle_score']))
		{
			$gre_score=trim($_POST['partial_gre_score']);
			$tofle_score=trim($_POST['partial_tofle_score']);
			$model->gre_score=$gre_score;
			$model->tofle_score=$tofle_score;
			if($model->save())
			{
				echo '{"gre_score":"'.$model->gre_score.'", "tofle_score":"'.$model->tofle_score.'"}';
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_universities_applied']))
		{
			$universities_applied=trim($_POST['partial_universities_applied']);
			$model->universities_applied=$universities_applied;
			if($model->save())
			{
				echo '{"universities_applied":"'.$model->universities_applied.'"}';
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_localization']))
		{
			$localization=trim($_POST['partial_localization']);
			$app = Yii::app();
			$app->language=$localization;
			$app->session['_lang'] = $localization;
			$model->setLocalization($localization);
			if($model->save())
			{
				echo '{"status":"'.$success_msg.'", "partial_localization":"'.$model->getLocalization().'"}';
			}
			else
			{
				echo '{"status":"'.$failure_msg.'", "error":"failed to save"}';
			}
		}
		else if(isset($_POST['partial_email1']))
		{
			$email1=trim($_POST['partial_email1']);
			$model->email1=$email1;
			if($model->save())
			{
				echo '{"email1":"'.$model->email1.'"}';
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_phone1']))
		{
			$phone1=trim($_POST['partial_phone1']);
			$model->phone1=$phone1;
			if($model->save())
			{
				echo '{"phone1":"'.$model->phone1.'"}';
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_looking_for']))
		{
			$looking_for=trim($_POST['partial_looking_for']);
			$model->looking_for=$looking_for;
			if($model->save())
			{
				echo '{"looking_for":"'.$model->looking_for.'"}';
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['partial_proposed_research_topic']))
		{
			$proposed_research_topic=trim($_POST['partial_proposed_research_topic']);
			$model->proposed_research_topic=$proposed_research_topic;
			if($model->save())
			{
				echo $model->getResearchInterest();
			}
			else
			{
				echo $failure_msg;
			}
		}
		else
		{
			echo 'irrelavant call! id='.$id;
			foreach($_POST as $key => $value)
			{
				echo $key.'='.$value.';';
			}
		}
	}
	
	/**
	 * Add a new article.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionDeleteArticle($id)
	{
		$ar = StudentArticle::model()->findByPk($id);
		
		$success_msg='success';
		$failure_msg='failure';
		
		if(isset($ar))
		{
			$article_id=$ar->article_id;
			$article=Article::model()->findByPk($article_id);
			if(isset($article))
			{
				$ar->delete();
				$article->delete();
				$student=Student::model()->findByPk($ar->student_id);
				if(isset($student))
				{
					$result = '{"status":"'.$success_msg.'", "error":"none", "articles":[';
					$articles=$student->getArticles();
					$article_count=count($articles);
					$article_index=0;
					foreach($articles as $ar_key => $ar_value)
					{
						if($article_index==$article_count-1)
						{
							$result.='{"ar_key":"'.$ar_key.'", "title":"'.$ar_value->title.'"}';
						}
						else
						{
							$result.='{"ar_key":"'.$ar_key.'", "title":"'.$ar_value->title.'"},';
						}
						$article_index++;
					}
					$result .= ']}';
					echo $result;
				}
				else
				{
					$result = '{"status":"'.$success_msg.'", "error":"none"}';
					echo $result;
				}
			}
			else
			{
				echo '{"status":"'.$failure_msg.'", "error":"failed to find article ['.$ar->article_id.'] with the relationship ['.$id.']"}';
			}
		}
		else
		{
			echo '{"status":"'.$failure_msg.'", "error":"failed to find the student article relationship ['.$id.']"}';
		}
	}
	
	/**
	 * Add a new article.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionFollow($id)
	{
		$success_msg='success';
		$failure_msg='failure';
		
		$studentFriend=new Messages;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['sid']))
		{
			$sid=trim($_POST['sid']);
			
			$me=$this->loadModel($id);
			$myIdol=$this->loadModel($sid);
			
			
			$studentFriend->to_id=$sid;
			$studentFriend->from_id=$id;
			$studentFriend->to_type=0;
			$studentFriend->from_type=0;
			$studentFriend->text_type=3;
			$studentFriend->note='';
			if(isset($me) && isset($myIdol))
			{
				$studentFriend->text_message='[PS-Bok]: '.$me->first_name.' '.$me->last_name.' is following '.$myIdol->first_name.' '.$myIdol->last_name;
			}
			else
			{
				$studentFriend->text_message='[PS-Bok]: Following';
			}
			$studentFriend->text_date=new CDbExpression('NOW()');
			$studentFriend->field1='';
			$studentFriend->field2='';
			if($studentFriend->save())
			{
				$result=$success_msg;
				echo $result;
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['pid']))
		{
			$pid=trim($_POST['pid']);
			
			$me=$this->loadModel($id);
			$myIdol=$this->loadProfessor($pid);
			
			
			$studentFriend->to_id=$pid;
			$studentFriend->from_id=$id;
			$studentFriend->to_type=1;
			$studentFriend->from_type=0;
			$studentFriend->text_type=3;
			$studentFriend->note='';
			if(isset($me) && isset($myIdol))
			{
				$studentFriend->text_message='[PS-Bok]: '.$me->first_name.' '.$me->last_name.' is following '.$myIdol->first_name.' '.$myIdol->last_name;
			}
			else
			{
				$studentFriend->text_message='[PS-Bok]: Following';
			}
			$studentFriend->text_date=new CDbExpression('NOW()');
			$studentFriend->field1='';
			$studentFriend->field2='';
			if($studentFriend->save())
			{
				$result=$success_msg;
				echo $result;
			}
			else
			{
				echo $failure_msg;
			}
		}
		else
		{
			echo $failure_msg;
		}
	}
	
	/**
	 * Add a new article.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUnfollow($id)
	{
		$success_msg='success';
		$failure_msg='failure';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['sid']))
		{
			$sid=trim($_POST['sid']);
			
			$studentFriend=Messages::model()->find(array(
			'condition'=>'to_id=:friendId AND from_id=:studentId AND from_type=0 AND to_type=0 AND text_type=3', 
			'params'=>array(
				':friendId'=>$sid, 
				':studentId'=>$id),
			)
			);
			if(isset($studentFriend))
			{
				$studentFriend->delete();
				echo $success_msg;
			}
			else
			{
				echo $failure_msg;
			}
		}
		else if(isset($_POST['pid']))
		{
			$pid=trim($_POST['pid']);
			
			$studentFriend=Messages::model()->find(array(
			'condition'=>'to_id=:friendId AND from_id=:studentId AND from_type=0 AND to_type=1 AND text_type=3', 
			'params'=>array(
				':friendId'=>$pid, 
				':studentId'=>$id),
			)
			);
			if(isset($studentFriend))
			{
				$studentFriend->delete();
				echo $success_msg;
			}
			else
			{
				echo $failure_msg;
			}
		}
		else
		{
			echo $failure_msg;
		}
	}
	
	
	
	/**
	 * Add a new article.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionClearMessages($id)
	{
		$success_msg='success';
		$failure_msg='failure';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['tid']))
		{
			$to_id=trim($_POST['tid']);
			$stype=trim($_POST['stype']);
			
			$model=$this->loadModel($id);
			
			if($stype==='student')
			{
				$messages=$model->getMessagesToStudent($to_id);
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					$message->delete();
					break;
				}
				$messages=$model->getMessagesToStudent($to_id);
				$result = '{"status":"'.$success_msg.'", ';
				$result .= '"messages":[';
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					$text_date=$message->text_date;
					if($i != $msg_count-1)
					{
						
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"},';
					}
					else
					{
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"}';
					}
				}
				$result .= ']}';
				echo $result;
			}
			else
			{
				$messages=$model->getMessagesToProfessor($to_id);
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					$message->delete();
					break;
				}
				$messages=$model->getMessagesToProfessor($to_id);
				$result = '{"status":"'.$success_msg.'", ';
				$result .= '"messages":[';
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					$text_date=$message->text_date;
					if($i != $msg_count-1)
					{
						
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"},';
					}
					else
					{
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"}';
					}
				}
				$result .= ']}';
				echo $result;
			}
		}
		else
		{
			echo '{"status":"'.$failure_msg.'", "error":"tid is not posted"}';
		}
	}
	
	public function actionShowMessages($id)
	{
		$success_msg='success';
		$failure_msg='failure';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['tid']))
		{
			$to_id=trim($_POST['tid']);
			$stype=trim($_POST['stype']);
			
			$model=$this->loadModel($id);
			
			if($stype==='student')
			{
				$messages=$model->getMessagesToStudent($to_id);
				$result = '{"status":"'.$success_msg.'", ';
				$result .= '"messages":[';
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					$text_date=$message->text_date;
					if($i != $msg_count-1)
					{
						
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"},';
					}
					else
					{
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"}';
					}
				}
				$result .= ']}';
				echo $result;
			}
			else
			{
				$messages=$model->getMessagesToProfessor($to_id);
				$result = '{"status":"'.$success_msg.'", ';
				$result .= '"messages":[';
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					$text_date=$message->text_date;
					if($i != $msg_count-1)
					{
						
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"},';
					}
					else
					{
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"}';
					}
				}
				$result .= ']}';
				echo $result;
			}
		}
		else
		{
			echo '{"status":"'.$failure_msg.'", "error":"tid is not posted"}';
		}
	}
	
	public function actionShowUnreadMessages($id)
	{
		$success_msg='success';
		$failure_msg='failure';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$model=$this->loadModel($id);
		
		$messages=$model->getUnreadMessages();
		$result = '{"status":"'.$success_msg.'", ';
		$result .= '"messages":[';
		$msg_count=count($messages);
		for($i=0; $i < $msg_count; ++$i)
		{
			$message=$messages[$i];
			$text_date=$message->text_date;
			$sendby_model=null;
			if($message->from_type==0)
			{
				$sendby_model=$this->loadModel($message->from_id);
			}
			else
			{
				$sendby_model=$this->loadProfessor($message->from_id);
			}
			$following=0;
			$sendby='';
			if(isset($sendby_model))
			{
				$sendby=$sendby_model->first_name.' '.$sendby_model->last_name;
				if($message->from_type==0 && $model->isFollowingStudent($message->from_id))
				{
					$following=1;
				}
				else if($message->from_type==1 && $model->isFollowingProfessor($message->from_id))
				{
					$following=1;
				}
			}
			if($i != $msg_count-1)
			{
				$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "sendby":"'.$sendby.'", "following":"'.$following.'"},';
			}
			else
			{
				$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "sendby":"'.$sendby.'", "following":"'.$following.'"}';
			}
		}
		$result .= ']}';
		echo $result;
		
	}
	
	public function actionDismissUnreadMessages($id)
	{
		$success_msg='success';
		$failure_msg='failure';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$model=$this->loadModel($id);
		
		$messages=$model->getUnreadMessages();
		$msg_count=count($messages);
		for($i=0; $i < $msg_count; ++$i)
		{
			$message=$messages[$i];
			$message->text_type=1;
			$message->save();
		}

		echo $success_msg;
		
	}
	
	public function actionGetUnreadMessagesCount($id)
	{
		$success_msg='success';
		$failure_msg='failure';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$model=$this->loadModel($id);
		
		$messages=$model->getUnreadMessages();
		$msg_count=count($messages);
		$result = '{"status":"'.$success_msg.'", ';
		$result .= '"msg_count":"'.$msg_count.'"}';
		echo $result;
		
	}
	
	/**
	 * Add a new article.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionMessage($id)
	{
		$success_msg='success';
		$failure_msg='failure';
		
		$msg=new Messages;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['tid']))
		{
			$to_id=trim($_POST['tid']);
			$stype=trim($_POST['stype']);
			$msg_body=trim($_POST['message_body']);
			$msg_subject='';
			$msg->from_id=$id;
			$msg->to_id=$to_id;
			$msg->from_type=0;
			if($stype==='student')
			{
				$msg->to_type=0;
			}
			else
			{
				$msg->to_type=1;
			}
			$msg->text_message=$msg_body;
			$msg->text_date=new CDbExpression('NOW()');
			$msg->note=$msg_subject;
			$msg->field1='';
			$msg->field2='';
			$msg->text_type=0;
			
			if($msg->save())
			{
				$model=$this->loadModel($id);
				$messages=array();
				if($msg->to_type==0)
				{
					$messages=$model->getMessagesToStudent($to_id);
				}
				else
				{
					$messages=$model->getMessagesToProfessor($to_id);
				}
				$result = '{"status":"'.$success_msg.'", ';
				$result .= '"messages":[';
				$msg_count=count($messages);
				for($i=0; $i < $msg_count; ++$i)
				{
					$message=$messages[$i];
					if($message->text_type==0 && $message->to_id == $model->id && $message->to_type==$model->mtype())
					{
						$message->text_type=1;
						$message->save();
					}
					if($i != $msg_count-1)
					{
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$message->text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"},';
					}
					else
					{
						$result .= '{"id":"'.$message->id.'", "body":"'.$message->text_message.'","dat":"'.$message->text_date.'", "type":"'.$message->text_type.'", "from":"'.$message->from_id.'", "to":"'.$message->to_id.'", "from_type":"'.$message->from_type.'", "to_type":"'.$message->to_type.'"}';
					}
				}
				$result .= ']}';
				echo $result;
			}
			else
			{
				echo '{"status":"'.$failure_msg.'", "error":"failed to save message"}';
			}
		}
		else
		{
			echo '{"status":"'.$failure_msg.'", "error":"tid is not posted"}';
		}
	}
	
	public function actionWallMessage($id)
	{
		$success_msg='success';
		$failure_msg='failure';
		
		$msg=new Messages;

		$msg->to_id=0;
		$msg->to_type=$_POST['to_type'];
		$msg->from_id=$id;
		$msg->from_type=Messages::RECTYPE_STUDENT;
		
		$msg->text_message=trim($_POST['message_body']);
		$msg->text_date=new CDbExpression('NOW()');
		$msg->note='';
		$msg->field1='';
		$msg->field2='';
		$msg->text_type=Messages::MSGTYPE_WALL_MESSAGE;
		
		if($msg->save())
		{
			$result = '{"status":"'.$success_msg.'"}';
			echo $result;
		}
		else
		{
			echo '{"status":"'.$failure_msg.'", "error":"failed to save message"}';
		}
	}
	
	/**
	 * Add a new article.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddArticle($id)
	{
		$model=$this->loadModel($id);

		$success_msg='success';
		$failure_msg='failure';
		
		$article=new Article;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['add_student_article_title'])
			&& isset($_POST['add_student_article_journal'])
			&& isset($_POST['add_student_article_pages'])
			&& isset($_POST['add_student_article_publish_year'])
			&& isset($_POST['add_student_article_note'])
			&& isset($_POST['add_student_article_author'])
		)
		{
			$add_student_article_title=trim($_POST['add_student_article_title']);
			$add_student_article_journal=trim($_POST['add_student_article_journal']);
			$add_student_article_pages=trim($_POST['add_student_article_pages']);
			$add_student_article_publish_year=trim($_POST['add_student_article_publish_year']);
			$add_student_article_note=trim($_POST['add_student_article_note']);
			$add_student_article_author=trim($_POST['add_student_article_author']);
			
			$article->title=$add_student_article_title;
			$article->journal=$add_student_article_journal;
			$article->pages=$add_student_article_pages;
			$article->publish_year=$add_student_article_publish_year;
			$article->note=$add_student_article_note;
			$article->author=$add_student_article_author;
			
			if($article->save())
			{
				$as=new StudentArticle;
				$as->student_id=$id;
				$as->article_id=$article->id;
				if($as->save())
				{
					$result = '{"status":"'.$success_msg.'", "error":"none", "articles":[';
					$articles=$model->getArticles();
					$article_count=count($articles);
					$article_index=0;
					foreach($articles as $ar_key => $ar_value)
					{
						if($article_index==$article_count-1)
						{
							$result.='{"ar_key":"'.$ar_key.'", "title":"'.$ar_value->title.'"}';
						}
						else
						{
							$result.='{"ar_key":"'.$ar_key.'", "title":"'.$ar_value->title.'"},';
						}
						$article_index++;
					}
					$result .= ']}';
					echo $result;
				}
				else
				{
					echo '{"status":"'.$failure_msg.'", "error":"failed to save the student article relationship"}';
				}
			}
			else
			{
				echo '{"status":"'.$failure_msg.'", "error":"failed to save the article and its relationship with the student"}';
			}
		}
		else
		{
			echo '{"status":"'.$failure_msg.'", "error":"invalid parameters for saving the article to student"}';
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Student',
		array(),
		array( 
			'pagination'=>array( 
				'pageSize'=>6,
			), 
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionSearch()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('search',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadProfessor($id)
	{
		$model=Professor::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	// Helper functions

	function exit_status($str){
		echo json_encode(array('status'=>$str));
		exit;
	}

	function get_extension($file_name){
		$ext = explode('.', $file_name);
		$ext = array_pop($ext);
		return strtolower($ext);
	}
}
