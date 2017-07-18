<?php

/**
 * This is the model class for table "ps_messages".
 *
 * The followings are the available columns in table 'ps_messages':
 * @property integer $id
 * @property integer $from_id
 * @property integer $from_type
 * @property integer $to_id
 * @property integer $to_type
 * @property string $text_message
 * @property string $text_date
 * @property string $note
 * @property string $field1
 * @property string $field2
 * @property integer $text_type
 */
class Messages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Messages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	const MSGTYPE_RECOMMEND=4;
	const MSGTYPE_FOLLOW=3;
	const MSGTYPE_UNREAD=0;
	const MSGTYPE_READ=1;
	const MSGTYPE_WALL_MESSAGE=5;
	const MSGTYPE_RULES=6;
	
	const MSGGROUP_ALL=0;
	const MSGGROUP_FOLLOWERS=1;
	
	const RECTYPE_PROFESSOR=1;
	const RECTYPE_STUDENT=0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ps_messages';
	}
	
	public function isMyIdolStudent()
	{
		return $this->to_type==Messages::RECTYPE_STUDENT;
	}
	
	public function isMyIdolProfessor()
	{
		return $this->to_type==Messages::RECTYPE_PROFESSOR;
	}
	
	public function isMyFollowerStudent()
	{
		return $this->from_type==Messages::RECTYPE_STUDENT;
	}
	
	public function isMyFollowerProfessor()
	{
		return $this->from_type==Messages::RECTYPE_PROFESSOR;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_id, from_type, to_id, to_type, text_type', 'numerical', 'integerOnly'=>true),
			array('field1, field2', 'length', 'max'=>256),
			array('text_message, text_date, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, from_id, from_type, to_id, to_type, text_message, text_date, note, field1, field2, text_type', 'safe', 'on'=>'search'),
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
			'from_id' => 'From',
			'from_type' => 'From Type',
			'to_id' => 'To',
			'to_type' => 'To Type',
			'text_message' => 'Text Message',
			'text_date' => 'Text Date',
			'note' => 'Note',
			'field1' => 'Field1',
			'field2' => 'Field2',
			'text_type' => 'Text Type',
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
		$criteria->compare('from_id',$this->from_id);
		$criteria->compare('from_type',$this->from_type);
		$criteria->compare('to_id',$this->to_id);
		$criteria->compare('to_type',$this->to_type);
		$criteria->compare('text_message',$this->text_message,true);
		$criteria->compare('text_date',$this->text_date,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('field1',$this->field1,true);
		$criteria->compare('field2',$this->field2,true);
		$criteria->compare('text_type',$this->text_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}