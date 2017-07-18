<?php

class AccountPlugin extends CComponent
{	
	public function __construct()
	{
	}

	public function init()
	{
	}
	
	public function getUser()
	{
		$user=null;
		$loginType='';
		if(isset(Yii::app()->user))
		{
			if(Yii::app()->user->hasState('cLoginType'))
			{
				$loginType=Yii::app()->user->cLoginType;
			}
		}
		 
		if(strcmp($loginType, Professor::CLASS_NAME)==0)
		{
			$user=Professor::model()->find('id=?', array(Yii::app()->user->cId));
		}
		else if(strcmp($loginType, Student::CLASS_NAME)==0)
		{
			$user=Student::model()->find('id=?', array(Yii::app()->user->cId));
		}
		
		return $user;
	}
}
?>