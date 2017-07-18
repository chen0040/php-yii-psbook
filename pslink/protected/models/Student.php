<?php

/**
 * This is the model class for table "ps_student".
 *
 * The followings are the available columns in table 'ps_student':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $gender_id
 * @property string $race
 * @property string $nationality
 * @property string $address_line1
 * @property string $address_line2
 * @property string $address_line3
 * @property string $address_line4
 * @property string $postal
 * @property integer $country_id
 * @property string $province
 * @property string $email1
 * @property string $email2
 * @property string $country_code1
 * @property string $country_code2
 * @property string $area_code1
 * @property string $area_code2
 * @property string $phone1
 * @property string $phone2
 * @property double $gre_score
 * @property double $tofle_score
 * @property double $gpa_score
 * @property string $study_avail_time
 * @property integer $study_level_id
 * @property integer $study_type_id
 * @property integer $education_level_id
 * @property string $highest_education_school
 * @property string $proposed_research_topic
 * @property string $create_time
 * @property string $update_time
 * @property string $username
 * @property string $password
 * @property string $last_login_time
 * @property string $universities_applied
 * @property string $looking_for
 */
class Student extends CActiveRecord
{
	private $idCache;
	public $image;
	
	const CLASS_NAME='Student';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function setRule($rule_name, $rule_value)
	{
		$criteria = new CDbCriteria(array(
                'condition' => 'text_type=:textType AND text_message=:textMessage',
                'params' => array(
                    ':textType' => Messages::MSGTYPE_RULES,
					':textMessage' => $rule_name),
            ));
			
		$rule=Messages::model()->find($criteria);
		
		if(isset($rule))
		{
			$rule->note=$rule_value;
		}
		else
		{			
			$rule=new Messages;
			$rule->text_message=$rule_name;
			$rule->note=$rule_value;
			$rule->text_date=new CDbExpression('NOW()');
		}
		$rule->save();
	}
	
	public function getRule($rule_name, $default_rule_value)
	{
		$criteria = new CDbCriteria(array(
                'condition' => 'text_type=:textType AND text_message=:textMessage',
                'params' => array(
                    ':textType' => Messages::MSGTYPE_RULES,
					':textMessage' => $rule_name),
            ));
			
		$rule=Messages::model()->find($criteria);
		
		if(isset($rule))
		{
			return $rule->note;
		}
		else
		{
			return $default_rule_value;
		}
	}
	
	public function isFollowingStudent($friend_id)
	{
		$val=Messages::model()->find(array(
			'condition'=>'to_id=:friendId AND from_id=:studentId AND to_type=0 AND from_type=0 AND text_type=3', 
			'params'=>array(
				':friendId'=>$friend_id, 
				':studentId'=>$this->id),
			)
			);
		if(isset($val))
		{
			return true;
		}
		return false;
	}
	
	public function isFollowingProfessor($friend_id)
	{
		$val=Messages::model()->find(array(
			'condition'=>'to_id=:friendId AND from_id=:studentId AND to_type=1 AND from_type=0 AND text_type=3', 
			'params'=>array(
				':friendId'=>$friend_id, 
				':studentId'=>$this->id),
			)
			);
		if(isset($val))
		{
			return true;
		}
		return false;
	}
	
	public function getSchool()
	{
		$institute_name=$this->getSchoolName();
		$model=EducationSchool::model()->find('institute_name=?', array($institute_name));
		
		if(!isset($model))
		{
			$model=new EducationSchool;
			$model->institute_name=$institute_name;
			$model->save();
		}
		
		return $model;
	}
	
	public function getCiteULikeByAuthor($tag, $page_index, $rec_per_page)
	{
		$tag=str_replace(" ", "_", $tag);
		$tag=strtolower($tag);
		$tag=urlencode($tag);
		$filename='cite/'.$tag.'.author';
		
		$response='';
		if(file_exists($filename))
		{
			$response= file_get_contents($filename);
		}
		else
		{
			// http://www.citeulike.org/author/some-author 
			// http://www.citeulike.org/tag/some-tag

			// http://www.citeulike.org/json/user/USERNAME
			// http://www.citeulike.org/json/user/USERNAME?callback=myfunc&page=2&per_page=100
			// http://www.citeulike.org/json/user/USERNAME/article/NNNNNN

			// http://www.citeulike.org/json/author/Jim
			
			$url = "http://www.citeulike.org/json/author/$tag"; //?page=2&per_page=100";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$fh = fopen($filename, 'w') or die("can't open file");
			fwrite($fh, $response);
			fclose($fh);
		}
		
		$response_a = json_decode($response);
		$article_count=count($response_a);
		if($article_count > 30)
		{
			$article_count=30;
		}
		$articles=array();
		for($article_index=0; $article_index < $article_count; ++$article_index)
		{
			$a=$response_a[$article_index];
			$title = $a->title;
			$article_id = $a->article_id;
			$year=-1;
			if(isset($a->published))
			{
				$year=$a->published[0];
			}
			$href='';
			if(isset($a->href))
			{
				$href=$a->href;
			}
			$start_page=0;
			if(isset($a->start_page))
			{
				$start_page=$a->start_page;
			}
			$end_page=0;
			if(isset($a->end_page))
			{
				$end_page=$a->end_page;
			}
			$authors=array();
			if(isset($a->authors))
			{
				$authors=$a->authors;
			}
			$journal=null;
			if(isset($a->journal))
			{
				$journal=$a->journal;
			}
			$publisher=null;
			if(isset($a->publisher))
			{
				$publisher=$a->publisher;
			}
			$article=array();
			$article['title']=$title;
			$article['article_id']=$article_id;
			$article['year']=$year;
			$article['href']=$href;
			$article['start_page']=$start_page;
			$article['end_page']=$end_page;
			$article['authors']=$authors;
			$article['journal']=$journal;
			$article['publisher']=$publisher;
			$articles[]=$article;
		}
		return $articles;
	}
	
	public function getCitations($page_index, $rec_per_page)
	{
		return $this->getCiteULikeByAuthor($this->first_name.' '.$this->last_name, $page_index, $rec_per_page);
	}
	
	public function tag_lcase()
	{
		return 'student';
	}
	
	public function tag_ucase()
	{
		return 'Student';
	}
	
	public function getUnreadMessages()
	{
		$criteria = new CDbCriteria(array(
                'condition' => 'to_id=:toId AND to_type=0 AND text_type=0',
                'params' => array(
					':toId'=>$this->id),
				'order'=>'text_date DESC',
            ));
			
		$messages = Messages::model()->findAll($criteria);
		
		// $rmsg=array();
		// $msg_count=count($messages);
		
		// for($i=$msg_count-1; $i >= 0; $i=$i-1)
		// {
			// $rmsg[]=$messages[$i];
		// }

        return $messages;
		
	}
	
	public function getMessagesToStudent($student_id)
	{
		$criteria = new CDbCriteria(array(
                'condition' => '((from_id=:fromId AND to_id=:toId) OR (to_id=:toId2 AND from_id=:fromId2)) AND from_type=0 AND to_type=0 AND (text_type=0 OR text_type=1)',
                'params' => array(
                    ':fromId' => $this->id,
					':toId'=>$student_id,
					':toId2' => $this->id,
					':fromId2'=>$student_id),
				'limit'=>10,
				'order'=>'text_date DESC',
            ));
			
		$messages = Messages::model()->findAll($criteria);
		
		// $rmsg=array();
		// $msg_count=count($messages);
		
		// for($i=$msg_count-1; $i >= 0; $i=$i-1)
		// {
			// $rmsg[]=$messages[$i];
		// }

        return $messages;
		
	}
	
	public function getMessagesToProfessor($professor_id)
	{
		$criteria = new CDbCriteria(array(
                'condition' => '((from_id=:fromId AND to_id=:toId AND from_type=0 AND to_type=1) OR (to_id=:toId2 AND from_id=:fromId2 AND from_type=1 AND to_type=0)) AND (text_type=0 OR text_type=1)',
                'params' => array(
                    ':fromId' => $this->id,
					':toId'=>$professor_id,
					':toId2' => $this->id,
					':fromId2'=>$professor_id),
				'limit'=>10,
				'order'=>'text_date DESC',
            ));
			
		$messages = Messages::model()->findAll($criteria);

        return $messages;
		
	}
	
	public function mtype()
	{
		return 0;
	}
	
	public function getLocalization()
	{
		return $this->phone2;
	}
	
	public function setLocalization($loc)
	{
		$this->phone2=$loc;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ps_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gender_id, country_id, study_level_id, study_type_id, education_level_id', 'numerical', 'integerOnly'=>true),
			array('username, email1, first_name, last_name', 'required'),
			array('gre_score, tofle_score, gpa_score', 'numerical'),
			array('username, password, first_name, last_name, race, nationality, address_line1, address_line2, address_line3, address_line4, province, email1, email2, phone1, phone2', 'length', 'max'=>128),
			array('postal', 'length', 'max'=>16),
			array('country_code1, country_code2, area_code1, area_code2', 'length', 'max'=>4),
			array('highest_education_school', 'length', 'max'=>256),
			array('study_avail_time, proposed_research_topic, create_time, update_time, last_login_time, universities_applied, looking_for', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, first_name, last_name, gender_id, race, nationality, address_line1, address_line2, address_line3, address_line4, postal, country_id, province, email1, email2, country_code1, country_code2, area_code1, area_code2, phone1, phone2, gre_score, tofle_score, gpa_score, study_avail_time, study_level_id, study_type_id, education_level_id, highest_education_school, proposed_research_topic, create_time, update_time, last_login_time, universities_applied, looking_for', 'safe', 'on'=>'search'),
			 array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty' => true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'researchFieldIds' => array(self::HAS_MANY, 'StudentResearchField', 'student_id'),
			'articleIds' => array(self::HAS_MANY, 'StudentArticle', 'student_id'),
			'awards' => array(self::HAS_MANY, 'Awards', 'student_id'),
			'friendIds' => array(self::HAS_MANY, 'StudentFriends', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'image' => 'Photo',
			'id' => 'ID',
			'first_name' => Yii::t('translation', 'First Name'),
			'last_name' => Yii::t('translation', 'Last Name'),
			'username' => Yii::t('translation', 'Username'),
			'password' => Yii::t('translation', 'Password'),
			'gender_id' => Yii::t('translation', 'Gender'),
			'race' => Yii::t('translation', 'Race'),
			'nationality' => 'Nationality',
			'address_line1' => Yii::t('translation', 'Address Line').'1',
			'address_line2' => Yii::t('translation', 'Address Line').'2',
			'address_line3' => Yii::t('translation', 'Address Line').'3',
			'address_line4' => Yii::t('translation', 'Address Line').'4',
			'postal' => Yii::t('translation', 'Postal'),
			'country_id' => Yii::t('translation', 'Country'),
			'province' => Yii::t('translation', 'Province'),
			'email1' => Yii::t('translation', 'Email'),
			'email2' => 'Alternative Email',
			'country_code1' => 'Country Code1',
			'country_code2' => 'Country Code2',
			'area_code1' => 'Area Code1',
			'area_code2' => 'Area Code2',
			'phone1' => Yii::t('translation', 'Phone'),
			'phone2' => 'Phone2',
			'gre_score' => Yii::t('translation', 'GRE'),
			'tofle_score' => Yii::t('translation', 'TOEFL'),
			'gpa_score' => Yii::t('translation', 'GPA'),
			'study_avail_time' => 'When will be available for the Study?',
			'study_level_id' => Yii::t('translation', 'Intend to further study'),
			'study_type_id' => Yii::t('translation', 'Would like to take further study by'),
			'education_level_id' => Yii::t('translation', 'Education Level'),
			'highest_education_school' => Yii::t('translation', 'University'),
			'proposed_research_topic' => Yii::t('translation', 'Interested Research'),
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'last_login_time' => 'Last Login Time',
			'universities_applied' => 'Universities Applied',
			'looking_for' => Yii::t('translation', 'Looking For'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('gender_id',$this->gender_id);
		$criteria->compare('race',$this->race,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('address_line1',$this->address_line1,true);
		$criteria->compare('address_line2',$this->address_line2,true);
		$criteria->compare('address_line3',$this->address_line3,true);
		$criteria->compare('address_line4',$this->address_line4,true);
		$criteria->compare('postal',$this->postal,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('email1',$this->email1,true);
		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('country_code1',$this->country_code1,true);
		$criteria->compare('country_code2',$this->country_code2,true);
		$criteria->compare('area_code1',$this->area_code1,true);
		$criteria->compare('area_code2',$this->area_code2,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('gre_score',$this->gre_score);
		$criteria->compare('tofle_score',$this->tofle_score);
		$criteria->compare('gpa_score',$this->gpa_score);
		$criteria->compare('study_avail_time',$this->study_avail_time,true);
		$criteria->compare('study_level_id',$this->study_level_id);
		$criteria->compare('study_type_id',$this->study_type_id);
		$criteria->compare('education_level_id',$this->education_level_id);
		$criteria->compare('highest_education_school',$this->highest_education_school,true);
		$criteria->compare('proposed_research_topic',$this->proposed_research_topic,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('last_login_time', $this->last_login_time, true);
		$criteria->compare('universities_applied', $this->universities_applied, true);
		$criteria->compare('looking_for', $this->looking_for, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByKeywords()
	{
		$criteria = new CDbCriteria;
		
		$keywords = $this->address_line1;
		$criteria->addSearchCondition('proposed_research_topic', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('last_name', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('first_name', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('highest_education_school', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('email1', $keywords, true, 'OR', 'LIKE');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getProfilePath()
	{
		$ext='pro';
		return 'profiles/ts_'.$this->id.'.'.$ext;
	}
	
	public function hasProfile()
	{
		$profile_path=$this->getProfilePath();
		return file_exists($profile_path);
	}
	
	public function getImagePath()
	{
		return $this->getImagePathWithExt('png');
	}
	
	public function getRawImagePath()
	{
		return $this->getRawImagePathWithExt('png');
	}
	
	public function getThumbnailImagePath()
	{
		return $this->getThumbnailImagePathWithExt('png');
	}
	
	public function getThumbnailImagePathWithExt($ext)
	{
		return 'images/ts_'.$this->username.'.'.$ext;
	}
	
	public function getImagePathWithExt($ext)
	{
		return 'images/s_'.$this->username.'.'.$ext;
	}
	
	public function getRawImagePathWithExt($ext)
	{
		return 'images/rs_'.$this->username.'.'.$ext;
	}
	
	public function getSchoolName()
	{
		if(isset($this->highest_education_school))
		{
			return $this->highest_education_school;
		}
		return 'NA';
	}
	
	public function getSchoolFullName()
	{
		return $this->getSchoolName();
	}
	
	public function getEmail()
	{
		return $this->email1;
	}
	
	public function getResearchInterest()
	{
		return $this->proposed_research_topic;
	}
	
	public function getContactFullNumber()
	{
		if(isset($this->phone1) && $this->phone1 !== '')
		{
			if(isset($this->country_code1) && $this->country_code1 !== '')
			{
				if(isset($this->area_code1) && $this->area_code1!=='')
				{
					return '+'.$this->country_code1.'-('.$this->area_code1.')-'.$this->phone1;
				}
				else
				{
					return '+'.$this->country_code1.'-'.$this->phone1;
				}
			}
			else
			{
				return $this->phone1;
			}
		}
		return null;
	}
	
	
	public function getAds()
	{
		//return 'I am looking for Ph.D positions 2012 fall!';
		return $this->looking_for;
	}
	
	public function getGPA()
	{
		if($this->gpa_score==-1)
		{
			return 'NA';
		}
		return $this->gpa_score.' / 5';
	}
	
	public function getTOEFL()
	{
		if($this->tofle_score==-1)
		{
			return 'NA';
		}
		return $this->tofle_score.' ';
	}
	
	public function getGRE()
	{
		if($this->gre_score==-1)
		{
			return 'NA';
		}
		return $this->gre_score.' ';
	}
	
	public function getDegree()
	{
		return $this->getEducationLevelName();
	}
	
	public function isStudent()
	{
		return true;
	}
	
	public function isProfessor()
	{
		return false;
	}
	
	public function getImagePathIfFileExists()
	{
		$filename=$this->getImagePath();
		if(file_exists($filename))
		{
			return $filename;
		}
		return 'images/default_profile_image.png';
	}
	
	public function getThumbnailImagePathIfFileExists()
	{
		$filename=$this->getThumbnailImagePath();
		if(file_exists($filename))
		{
			return $filename;
		}
		return 'images/default_profile_image.png';
	}
	
	
	public function getCountryName()
	{
		$c = Country::model()->find('id=?', array($this->country_id));
		if(isset($c))
		{
			return $c->country_name;
		}
		return 'NA';
	}
	
	public function getArticles()
	{
		$criteria = new CDbCriteria(array(
                'condition' => 'student_id=:studentId',
                'params' => array(
                    ':studentId' => $this->id),
            ));
			
		$articles=array();
		$children = StudentArticle::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $article=Article::model()->findByPk($child->article_id);
			$articles[$child->id]=$article;
        }
		
		return $articles;
	}
	
	public function getGenderName()
	{
		$g = Gender::model()->find('id=?', array($this->gender_id));
		if(isset($g))
		{
			return $g->gender_name;
		}
		return 'NA';
	}
	
	public function getEducationLevelName()
	{
		$level = EducationLevel::model()->find('id=?', array($this->education_level_id));
		if(isset($level))
		{
			return $level->education_level_name;
		}
		return 'NA';
	}
	
	public function getStudyTypeName()
	{
		$t = StudyType::model()->find('id=?', array($this->study_type_id));
		if(isset($t))
		{
			return $t->study_type_name;
		}
		return 'NA';
	}
	
	public function getStudyLevelName()
	{
		$level = StudyLevel::model()->find('id=?', array($this->study_level_id));
		if(isset($level))
		{
			return $level->study_level_name;
		}
		return 'NA';
	}
	
	protected function beforeValidate() 
	{
		if($this->isNewRecord)
		{
			// set the create date, last updated date and the user doing the creating
			$this->create_time=$this->update_time=new CDbExpression('NOW()');
			$this->update_time=new CDbExpression('NOW()'); 
			
			$existing_student=Student::model()->find('username=?', array($this->username));
			if(isset($existing_student))
			{
				return false;
			}
		}
		else
		{
			//not a new record, so just set the last updated time and last updated user id
			$this->update_time=new CDbExpression('NOW()'); 
		}
		
		return parent::beforeValidate();
	}
	
	public function encrypt($value)
	{
		return md5($value);
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->gender_id=0;
			$this->country_id=0;
			$this->gre_score=-1;
			$this->tofle_score=-1;
			$this->gpa_score=-1;
			$this->study_avail_time=date('Y-m-d');
			$this->study_level_id=0;
			$this->study_type_id=0;
			$this->education_level_id=0;
			$this->create_time=$this->update_time=new CDbExpression('NOW()');
			$this->last_login_time=$this->create_time;
			$this->password = $this->encrypt($this->password);
		}
		else
		{
			$this->study_avail_time=date('Y-m-d', strtotime($this->study_avail_time));
			$this->update_time=new CDbExpression('NOW()'); 
			
			if(isset($this->proposed_research_topic) && $this->proposed_research_topic !== '')
			{
				$research_interest_arr=explode(",", $this->proposed_research_topic);
				
				$qr_count=count($research_interest_arr);
				for($qr_index=0; $qr_index < $qr_count; ++$qr_index)
				{
					$match=trim($research_interest_arr[$qr_index]);
					$research_field=ResearchField::model()->find('research_field_name=?', array($match));
					if(!isset($research_field))
					{
						$research_field=new ResearchField;
						$research_field->research_field_name=$match;
						$research_field->research_field_category='';
						$research_field->save();
					}
				}
				
			}
		}
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->study_avail_time=date('m-d-Y', strtotime($this->study_avail_time));
		return TRUE;
	} 

    public function beforeDelete()
    {
        $this->idCache = $this->id;

        return parent::beforeDelete();
    }

    public function afterDelete()
    {
        $criteria = new CDbCriteria(array(
                'condition' => 'student_id=:studentId',
                'params' => array(
                    ':studentId' => $this->idCache),
            ));

        $children = StudentResearchField::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$children = StudentArticle::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$children = Awards::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$children = StudentFriends::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$criteria = new CDbCriteria(array(
                'condition' => '(from_id=:studentId AND from_type=0) OR (to_id=:studentId2 AND to_type=0)',
                'params' => array(
                    ':studentId' => $this->idCache,
					':studentId2' => $this->idCache),
            ));
		$children = Messages::model()->findAll($criteria);
		foreach($children as $child)
		{
			$child->delete();
		}
		
		$filename=$this->getImagePath();
		if(file_exists($filename))
		{
			unlink($filename);
		}
		$filename=$this->getThumbnailImagePath();
		if(file_exists($filename))
		{
			unlink($filename);
		}

        parent::afterDelete();
    }
	
	public function getProfessorsWithSimilarResearchBackground()
	{
		$research_interests=$this->getResearchInterest();
		$research_interest_arr=explode(",", $research_interests);
		
		$q = new CDbCriteria;
		
		foreach($research_interest_arr as $match)
		{
			//$match1 = addcslashes($match, '%_'); // escape LIKE's special characters
			$q->addSearchCondition('research', trim($match), true, 'OR', 'LIKE');
		}
		
		
		$professor_group=new CActiveDataProvider('Professor', 
			array( 
				'criteria'=>$q,
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		return $professor_group;
	}
	
	public function getProfessorsOfInterest()
	{		
		$universities_applied_arr=explode(",", trim($this->universities_applied));
			
		$q = new CDbCriteria;
		
		$qr_count=count($universities_applied_arr);
		for($qr_index=0; $qr_index < $qr_count; ++$qr_index)
		{
			$match=$universities_applied_arr[$qr_index];
			$q->addSearchCondition('university', trim($match), true, 'OR', 'LIKE');
		}
		
		$professor_group=new CActiveDataProvider('Professor', 
			array( 
				'criteria'=>$q,
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		return $professor_group;
	}
	
	public function getStudentsWithSimilarResearchBackground()
	{
		$research_interests=trim($this->getResearchInterest());
		
		if($research_interests==='')
		{
			//$q = new CDbCriteria;
			//$q->compare('id', $this->id, false, '<>');
			return new CActiveDataProvider('Student', 
				array( 
					'criteria'=>array(
						'condition'=>'id =:studentId',
						'params'=>array(':studentId'=>0),
					),
					'pagination'=>array( 
						'pageSize'=>5,
					), 
				)
			);
		}
		else
		{
			$research_interest_arr=explode(",", $research_interests);
			
			$q = new CDbCriteria;
			
			$qr_count=count($research_interest_arr);
			for($qr_index=0; $qr_index < $qr_count; ++$qr_index)
			{
				$match=$research_interest_arr[$qr_index];
				$q->addSearchCondition('proposed_research_topic', '%'.trim($match).'%', true, 'OR', 'LIKE');
			}
			$q->compare('id', $this->id, false, '<>');
			
			$student_group=new CActiveDataProvider('Student', 
				array( 
					'criteria'=>$q,
					'pagination'=>array( 
						'pageSize'=>5,
					), 
				)
			);
			return $student_group;
		}
	}
	
	public function getStudentsFromSameUniversity()
	{
		if(trim($this->highest_education_school)==='')
		{
			$student_group=new CActiveDataProvider('Student', 
				array( 
					'criteria'=>array(
						'condition'=>'id =:studentId',
						'params'=>array(':studentId'=>0),
					),
					'pagination'=>array( 
						'pageSize'=>5,
					), 
				)
			);
			return $student_group;
		}
		else
		{
			$q = new CDbCriteria;
			$q->compare('highest_education_school', $this->highest_education_school);
			$q->compare('id', $this->id, false, '<>');
			
			$student_group=new CActiveDataProvider('Student', 
				array( 
					'criteria'=>$q,
					'pagination'=>array( 
						'pageSize'=>5,
					), 
				)
			);
			return $student_group;
		}
	}
	
}