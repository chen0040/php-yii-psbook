<?php

/**
 * This is the model class for table "ps_professor_research_field".
 *
 * The followings are the available columns in table 'ps_professor_research_field':
 * @property integer $id
 * @property integer $professor_id
 * @property integer $research_field_id
 */
class ProfessorResearchField extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProfessorResearchField the static model class
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
		return 'ps_professor_research_field';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('professor_id, research_field_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, professor_id, research_field_id', 'safe', 'on'=>'search'),
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
			'professor' => array(self::BELONGS_TO, 'Professor', 'professor_id'),
			'research_field' => array(self::BELONGS_TO, 'ResearchField', 'research_field_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'professor_id' => 'Professor',
			'research_field_id' => 'Research Field',
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
		$criteria->compare('professor_id',$this->professor_id);
		$criteria->compare('research_field_id',$this->research_field_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}