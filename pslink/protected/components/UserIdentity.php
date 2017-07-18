<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $pLoginType;
	public $pId;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$cLoginType='NA';
		$cId='default';
		$pLoginType=$cLoginType;
		$pId=$cId;
		
		$users=array(
			// username => password
			'demo'=>'*(F_dfs)()FD',
			'admin'=>'&*&(^JKIj)!!!!__00',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->setState('cId', $cId);
			$this->setState('cLoginType', $cLoginType);
			$this->errorCode=self::ERROR_NONE;
		}	
		if($this->errorCode === self::ERROR_NONE)
		{
			return !$this->errorCode;
		}
		else
		{
			$cLoginType='Student';
			$this->pLoginType=$cLoginType;
			
			$user=Student::model()->findByAttributes(array('username'=>$this->username));
			if($user===null)
			{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
			else
			{
				if($user->password!==$user->encrypt($this->password))
				{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
				else
				{
					if(null===$user->last_login_time)
					{
						$lastLogin=time();
					}
					else
					{
						$lastLogin=strtotime($user->last_login_time);
					}
					$this->pId=$user->id;
					$this->setState('cId', $user->id);
					$this->setState('lastLoginTime', $lastLogin);
					$this->setState('cLoginType', $cLoginType);
					$this->errorCode=self::ERROR_NONE;
				}
			}
		}
		
		if($this->errorCode === self::ERROR_NONE)
		{
			return !$this->errorCode;
		}
		else
		{
			$cLoginType='Professor';
			$this->pLoginType=$cLoginType;
			$user=Professor::model()->findByAttributes(array('username'=>$this->username));
			if($user===null)
			{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
			else
			{
				if($user->password!==$user->encrypt($this->password))
				{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
				else
				{
					$cId=$user->id;
					$pId=$cId;
					if(null===$user->last_login_time)
					{
						$lastLogin=time();
					}
					else
					{
						$lastLogin=strtotime($user->last_login_time);
					}
					$this->setState('cId', $cId);
					$this->setState('lastLoginTime', $lastLogin);
					$this->setState('cLoginType', $cLoginType);
					$this->errorCode=self::ERROR_NONE;
				}
			}
		}
		
		return !$this->errorCode;
	}
}