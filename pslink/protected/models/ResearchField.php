<?php

/**
 * This is the model class for table "ps_research_field".
 *
 * The followings are the available columns in table 'ps_research_field':
 * @property integer $id
 * @property string $research_field_name
 * @property string $research_field_category
 */
class ResearchField extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ResearchField the static model class
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
		return 'ps_research_field';
	}
	
	public function getCiteULikeByTag($tag, $page_index, $rec_per_page)
	{
		$tag=str_replace(" ", "_", $tag);
		$tag=strtolower($tag);
		$tag=urlencode($tag);
		$filename='cite/'.$tag.'.rf';
		
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
			
			$url = "http://www.citeulike.org/json/tag/$tag"; //?page=2&per_page=100";
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
		return $this->getCiteULikeByTag($this->research_field_name, $page_index, $rec_per_page);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('research_field_name', 'length', 'max'=>256),
			array('research_field_category', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, research_field_name, research_field_category', 'safe', 'on'=>'search'),
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
			'researchFieldIds' => array(self::HAS_MANY, 'ProfessorResearchField', 'research_field_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'research_field_name' => 'Research Field',
			'research_field_category' => 'Long Name (If Any)',
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
		$criteria->compare('research_field_name',$this->research_field_name,true);
		$criteria->compare('research_field_category',$this->research_field_category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}