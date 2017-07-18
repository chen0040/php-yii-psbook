<?php

/**
 * This is the model class for table "ps_professor".
 *
 * The followings are the available columns in table 'ps_professor':
 * @property integer $id
 * @property string $username
 * @property string $password
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
 * @property string $create_time
 * @property string $update_time
 * @property string $last_login_time
 * @property string $university
 * @property integer $school
 * @property integer $division
 * @property string $research
 * @property string $looking_for
 * @property string $requirements
 */
class Professor extends CActiveRecord
{
	private $idCache;
	public $image;
	
	const CLASS_NAME='Professor';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Professor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ps_professor';
	}
	
	public function mtype()
	{
		return 1;
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
		return 'professor';
	}
	
	public function tag_ucase()
	{
		return 'Professor';
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
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gender_id, country_id, school, division', 'numerical', 'integerOnly'=>true),
			array('username, password, first_name, last_name, race, nationality, address_line1, address_line2, address_line3, address_line4, province, email1, email2, phone1, phone2', 'length', 'max'=>128),
			array('postal', 'length', 'max'=>16),
			array('country_code1, country_code2, area_code1, area_code2', 'length', 'max'=>4),
			array('create_time, update_time, last_login_time, university, research, requirements, looking_for', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, first_name, last_name, gender_id, race, nationality, address_line1, address_line2, address_line3, address_line4, postal, country_id, province, email1, email2, country_code1, country_code2, area_code1, area_code2, phone1, phone2, create_time, update_time, last_login_time, university, school, division, research', 'safe', 'on'=>'search'),
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
			'researchFieldIds' => array(self::HAS_MANY, 'ProfessorResearchField', 'professor_id'),
			'articleIds' => array(self::HAS_MANY, 'ProfessorArticle', 'professor_id'),
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
			'username' => Yii::t('translation', 'Username'),
			'password' => Yii::t('translation', 'Password'),
			'first_name' => Yii::t('translation', 'First Name'),
			'last_name' => Yii::t('translation', 'Last Name'),
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
			'email2' => Yii::t('translation', 'Website'),
			'country_code1' => 'Country Code1',
			'country_code2' => 'Country Code2',
			'area_code1' => 'Area Code1',
			'area_code2' => 'Area Code2',
			'phone1' => Yii::t('translation', 'Phone'),
			'phone2' => 'Phone2',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'last_login_time' => 'Last Login Time',
			'university' => Yii::t('translation', 'University'),
			'school' => 'School',
			'division' => 'Division',
			'research' => Yii::t('translation', 'Research'),
			'requirements' => Yii::t('translation', 'Requirements'),
			'looking_for' => Yii::t('translation', 'Looking For'),
		);
	}
	
	public function getImagePath()
	{
		return $this->getImagePathWithExt('png');
	}
	
	public function getImagePathWithExt($ext)
	{
		return 'images/p_'.$this->username.'.'.$ext;
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
		return 'images/tp_'.$this->username.'.'.$ext;
	}
	
	public function getRawImagePathWithExt($ext)
	{
		return 'images/rp_'.$this->username.'.'.$ext;
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
		return $this->getImagePathIfFileExists();
	}
	
	public function getResearchInterest()
	{
		return $this->research;
	}
	
	public function getArticles()
	{
		 $criteria = new CDbCriteria(array(
                'condition' => 'professor_id=:professorId',
                'params' => array(
                    ':professorId' => $this->id),
            ));
			
		$articles=array();
		$children = ProfessorArticle::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $article=Article::model()->find('id=?', array($child->article_id));
			$articles[$child->id]=$article;
        }
		
		return $articles;
	}
	
	public function getCountryName()
	{
		return Country::model()->find('id=?', array($this->country_id))->country_name;
	}
	
	public function getGenderName()
	{
		return Gender::model()->find('id=?', array($this->gender_id))->gender_name;
	}
	
	public function getSchoolFullName()
	{
		return $this->getSchoolName();
	}
	
	public function getEmail()
	{	
		return $this->email1;
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
	
	public function isStudent()
	{
		return false;
	}
	
	public function isProfessor()
	{
		return true;
	}
	
	public function getAds()
	{
		//return 'I have two Ph.D positions 2012 fall!';
		return $this->looking_for;
	}
	
	public function getSchoolName()
	{
		if(isset($this->university))
		{
			return $this->university;
		}
		else
		{
			return 'NA';
		}
	}
	
	public function getDivisionName()
	{
		$div = EducationDivision::model()->find('id=?', array($this->division));
		if(isset($div))
		{
			return $div->division_name;
		}
		return 'NA';
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
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
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('school',$this->school);
		$criteria->compare('division',$this->division);
		$criteria->compare('research',$this->research,true);
		$criteria->compare('requirements', $this->requirements, true);
		$criteria->compare('looking_for', $this->looking_for, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchByKeywords()
	{
		$criteria = new CDbCriteria;
		
		$keywords = $this->address_line1;
		$criteria->addSearchCondition('research', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('last_name', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('first_name', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('university', $keywords, true, 'OR', 'LIKE');
		$criteria->addSearchCondition('email1', $keywords, true, 'OR', 'LIKE');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeValidate() 
	{
		if($this->isNewRecord)
		{
			// set the create date, last updated date and the user doing the creating
			$this->create_time=$this->update_time=new CDbExpression('NOW()');
			$this->update_time=new CDbExpression('NOW()'); 
			
			$existing_prof=Professor::model()->find('username=?', array($this->username));
			if(isset($existing_prof))
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
			$this->school=1;
			$this->division=1;
			$this->create_time=$this->update_time=new CDbExpression('NOW()');
			$this->last_login_time=$this->create_time;
			$this->password = $this->encrypt($this->password);
		}
		else
		{
			$this->update_time=new CDbExpression('NOW()'); 
			
			if(isset($this->research) && $this->research !== '')
			{
				$research_interest_arr=explode(",", $this->research);
				
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
		//$this->study_avail_time=date('m-d-Y', strtotime($this->study_avail_time));
		//$this->password=null;
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
                'condition' => 'professor_id=:professorId',
                'params' => array(
                    ':professorId' => $this->idCache),
            ));

        $children = ProfessorResearchField::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$children = ProfessorArticle::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$children = Awards::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$children = ProfessorFriends::model()->findAll($criteria);

        foreach ($children as $child)
        {
            $child->delete();
        }
		
		$criteria = new CDbCriteria(array(
		'condition' => '(from_id=:professorId AND from_type=1) OR (to_id=:professorId2 AND to_type=1)',
		'params' => array(
			':professorId' => $this->idCache,
			':professorId2' => $this->idCache),
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
	
	public function getProfessors1()
	{
		$professor_group=new CActiveDataProvider('Professor', 
			array( 
				//'criteria'=>array(
				//	'condition'=>'student_id=:studentId',
				//	'params'=>array(':studentId'=>$p->id), 
				//),
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		return $professor_group;
	}
	
	public function getProfessors2()
	{
		$professor_group=new CActiveDataProvider('Professor', 
			array( 
				//'criteria'=>array(
				//	'condition'=>'student_id=:studentId',
				//	'params'=>array(':studentId'=>$p->id), 
				//),
				'pagination'=>array( 
					'pageSize'=>5,
				), 
			)
		);
		
		return $professor_group;
	}
	
	public function getUnreadMessages()
	{
		$criteria = new CDbCriteria(array(
                'condition' => 'to_id=:toId AND to_type=1 AND text_type=0',
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
                'condition' => '((from_id=:fromId AND to_id=:toId  AND from_type=1 AND to_type=0) OR (to_id=:toId2 AND from_id=:fromId2  AND from_type=0 AND to_type=1)) AND (text_type=0 OR text_type=1)',
                'params' => array(
                    ':fromId' => $this->id,
					':toId'=>$student_id,
					':toId2' => $this->id,
					':fromId2'=>$student_id),
				'limit'=>10,
				'order'=>'text_date DESC',
            ));
			
		$messages = Messages::model()->findAll($criteria);

        return $messages;
		
	}
	
	public function getMessagesToProfessor($professor_id)
	{
		$criteria = new CDbCriteria(array(
                'condition' => '((from_id=:fromId AND to_id=:toId) OR (to_id=:toId2 AND from_id=:fromId2)) AND from_type=1 AND to_type=1 AND (text_type=0 OR text_type=1)',
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
	
	public function isFollowingStudent($friend_id)
	{
		$val=Messages::model()->find(array(
			'condition'=>'to_id=:friendId AND from_id=:professorId AND to_type=0 AND from_type=1 AND text_type=3', 
			'params'=>array(
				':friendId'=>$friend_id, 
				':professorId'=>$this->id),
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
			'condition'=>'to_id=:friendId AND from_id=:professorId AND to_type=1 AND from_type=1 AND text_type=3', 
			'params'=>array(
				':friendId'=>$friend_id, 
				':professorId'=>$this->id),
			)
			);
		if(isset($val))
		{
			return true;
		}
		return false;
	}
	
	public function getStudentsWithSimilarResearchBackground()
	{
		$research_interests=$this->getResearchInterest();
		$research_interest_arr=explode(",", $research_interests);
		
		$q = new CDbCriteria;
		
		foreach($research_interest_arr as $match)
		{
			//$match1 = addcslashes($match, '%_'); // escape LIKE's special characters
			$q->addSearchCondition('proposed_research_topic', trim($match), true, 'OR', 'LIKE');
		}
		
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
	
	public function getStudentsApplyingSameUniversity()
	{
		$q = new CDbCriteria;
		
		$q->addSearchCondition('universities_applied', trim($this->getSchool()->getInstituteName()), true, 'AND', 'LIKE');
		
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