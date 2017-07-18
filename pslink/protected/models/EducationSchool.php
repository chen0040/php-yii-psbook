<?php

/**
 * This is the model class for table "ps_education_school".
 *
 * The followings are the available columns in table 'ps_education_school':
 * @property integer $id
 * @property string $institute_name
 * @property string $note
 */
class EducationSchool extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EducationSchool the static model class
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
		return 'ps_education_school';
	}

	public function getInstituteName()
	{
		$in_arr=explode(",", $this->institute_name);
		if(count($in_arr)>0)
		{
			return Yii::t('translation', trim($in_arr[0]));
		}
		return 'NA';
	}
	
	public function getLatLngByAddress($address)
	{
		
		$address=urlencode($address);
		$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Singapore";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response);
		$lat = $response_a->results[0]->geometry->location->lat;
		$lng = $response_a->results[0]->geometry->location->lng;
		return array($lat, $lng);
	}
	
	public function getLatLng()
	{
		$in_arr=explode(",", $this->institute_name);
		$address = null;
		if(count($in_arr)>3)
		{
			$in_name=trim($in_arr[0]);
			$city_name=trim($in_arr[1]);
			$province_name=trim($in_arr[2]);
			$country_name=trim($in_arr[3]);
			
			if($city_name===$province_name)
			{
				if($city_name===$country_name)
				{
					$address = $in_name.', '.$country_name;
				}
				else
				{
					$address = $in_name.', '.$city_name.', '.$country_name;
				}
			}
			else
			{
				$address = $in_name.', '.$city_name.', '.$province_name.', '.$country_name;
			}
		}
		else if(count($in_arr)>0)
		{
			$address=$in_arr[0];
		}
		
		$filename=$this->getGeoFilePath();
		if(file_exists($filename))
		{
			$file_content=file_get_contents($filename);
			$fcontents=explode(",", $file_content);
			$lat=(double)$fcontents[0];
			$lng=(double)$fcontents[1];
			return array($lat, $lng);
		}
		else
		{
			$latlng=$this->getLatLngByAddress($address);
			
			$fh = fopen($filename, 'w') or die("can't open file");
			fwrite($fh, $latlng[0].', '.$latlng[1]);
			fclose($fh);
		}
		return $latlng;
	}
	
	public function getGeoFilePath()
	{
		$folder='geo';
		$in_arr=explode(",", $this->institute_name);
		$address=null;
		if(count($in_arr)>3)
		{
			$address=trim($in_arr[0]).'-'.trim($in_arr[1]).'-'.trim($in_arr[2]).'-'.trim($in_arr[3]);
		}
		else if(count($in_arr)>0)
		{
			$address=$in_arr[0];
		}
		$address=str_replace(' ', '_', $address);
		
		return $folder.'/'.$address.'.latlng';
	}
	
	public function getCityName()
	{
		$in_arr=explode(",", $this->institute_name);
		if(count($in_arr)>1)
		{
			return Yii::t('translation', trim($in_arr[1]));
		}
		return 'NA';
	}
	
	public function getProvinceName()
	{
		$in_arr=explode(",", $this->institute_name);
		if(count($in_arr)>2)
		{
			return Yii::t('translation', trim($in_arr[2]));
		}
		return 'NA';
	}
	
	public function getCountryName()
	{
		$in_arr=explode(",", $this->institute_name);
		if(count($in_arr)>3)
		{
			return Yii::t('translation', trim($in_arr[3]));
		}
		return 'NA';
	}
	
	public function getInstituteDesc()
	{
		$in_arr=explode(",", $this->institute_name);
		if(count($in_arr)>3)
		{
			$in_name=Yii::t('translation', trim($in_arr[0]));
			$city_name=Yii::t('translation', trim($in_arr[1]));
			$province_name=Yii::t('translation', trim($in_arr[2]));
			$country_name=Yii::t('translation', trim($in_arr[3]));
			
			if($city_name===$province_name)
			{
				if($city_name===$country_name)
				{
					return $in_name.', '.$country_name;
				}
				else
				{
					return $in_name.', '.$city_name.', '.$country_name;
				}
			}
			else
			{
				return $in_name.', '.$city_name.', '.$province_name.', '.$country_name;
			}
		}
		else if(count($in_arr)>0)
		{
			$in_name=Yii::t('translation', trim($in_arr[0]));
			return $in_name;
		}
		return 'NA';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('institute_name', 'length', 'max'=>255),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, institute_name, note', 'safe', 'on'=>'search'),
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
			'institute_name' => 'Institute Name',
			'note' => 'Note',
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
		$criteria->compare('institute_name',$this->institute_name,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}