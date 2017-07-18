<?php

/**
 * This is the model class for table "ps_article".
 *
 * The followings are the available columns in table 'ps_article':
 * @property integer $id
 * @property string $title
 * @property string $journal
 * @property string $pages
 * @property integer $publish_year
 * @property string $note
 * @property string $author
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'ps_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publish_year', 'numerical', 'integerOnly'=>true),
			array('title, journal', 'length', 'max'=>256),
			array('pages', 'length', 'max'=>16),
			array('note, author', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, journal, pages, publish_year, note, author', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'journal' => 'Journal',
			'pages' => 'Pages',
			'publish_year' => 'Publish Year',
			'note' => 'Note',
			'author' => 'Author',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('journal',$this->journal,true);
		$criteria->compare('pages',$this->pages,true);
		$criteria->compare('publish_year',$this->publish_year);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('author',$this->author,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function toString()
	{
		return $this->author.'. '.$this->title.'. '.$this->journal.'. pp.'.$this->pages.', '.$this->publish_year;
	}
}