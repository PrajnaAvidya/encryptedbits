<?php
class UserIdentity extends CUserIdentity
{
	private $_id;

	private $_username;

	public function authenticate()
	{
		$record = User::model()->find('LOWER(username)=?',array(strtolower($this->username)));

		if ($record === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if ( !CPasswordHelper::verifyPassword($this->password, $record->password) )
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id = $record->id;
			$this->_username = $record->username;
			$this->errorCode = self::ERROR_NONE;
		}

		if (isset($record->timezone))
			Yii::app()->request->cookies['timezone'] = new CHttpCookie('timezone', $record->timezone);

		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function getUsername()
	{
		return $this->_username;
	}
}
