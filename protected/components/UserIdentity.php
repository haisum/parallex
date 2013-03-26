<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
		$users = User::model()->findAll("email = :email", array(":email" => $this->username));

		if(count($users) == 0)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[0]->password!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			Yii::app()->authManager->clearAuthAssignments();
			$this->errorCode=self::ERROR_NONE;
			Yii::app()->authManager->assign("authenticated", $users[0]->id);
			$this->setState("name", $users[0]->firstName . " " . $users[0]->lastName);
			if($users[0]->type == Yii::app()->params["app"]["userTypes"]["admin"]){
				Yii::app()->authManager->assign("admin", $users[0]->id);
			}
		}
		return !$this->errorCode;
	}
}