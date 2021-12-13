<?php
namespace app\models;

class User extends \app\core\Model{
	public $user_id;
	public $username;
	public $password_hash;
	public $password;

	public function __construct(){
		parent::__construct();
	}

	public function get($username){
		$SQL = 'SELECT * FROM user WHERE username LIKE :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\User');
		return $STMT->fetch();//return the record
	}

	public function getUser($user_id){
		$SQL = 'SELECT * FROM user WHERE user_id LIKE :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\User');
		return $STMT->fetch();//return the record
	}

	public function insert(){
		$this->password_hash = password_hash($this->password, PASSWORD_DEFAULT);
		$SQL = 'INSERT INTO user(username, password_hash) VALUES (:username,:password_hash)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,'password_hash'=>$this->password_hash]);
	}

	public function update2FA(){//update an user record
		$SQL = 'UPDATE `user` SET `secret_key`=:secret_key WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['secret_key'=>$this->secret_key,'user_id'=>$this->user_id]);
	}

	public function updateLoginTimestamp(){//update an user record last login timestamp
		$SQL = 'UPDATE `user` SET `last_login_timestamp`=utc_timestamp() WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
	}

	public function update(){
        $SQL = 'UPDATE `user` SET `password_hash`=:password_hash WHERE user_id = :user_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['password_hash'=>$this->password_hash,'user_id'=>$this->user_id]);
    }

	public function delete($user_id){
		$SQL = 'DELETE FROM `user` WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
	}

}