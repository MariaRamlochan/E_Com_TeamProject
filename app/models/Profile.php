<?php
namespace app\models;

class Profile extends \app\core\Model{
	public $profile_id;
	public $user_id;
	public $profile_name;
	public $email;
	public $phone_num;
	public $profile_pic;

	public function __construct(){
		parent::__construct();
	}

	public function setProfileName($profile_name){
		$this->profile_name = $profile_name;
	}

	public function getProfileName(){
		return $this->profile_name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPhoneNum($phone_num){
		$this->phone_num = $phone_num;
	}

	public function getPhoneNum(){
		return $this->phone_num;
	}

	public function get($user_id){
        $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id'=>$user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');
        return $STMT->fetch();
    }

	public function getAll($user_id){
        $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id'=>$user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');
        return $STMT->fetchAll();
    }

	public function insert(){
		$SQL = 'INSERT INTO profile(user_id, profile_name, email, phone_num, profile_pic) 
		VALUES (:user_id, :profile_name, :email, :phone_num, :profile_pic)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,'profile_name'=>$this->profile_name,
			'email'=>$this->email, 'phone_num'=>$this->phone_num, 'profile_pic'=>$this->profile_pic]);
	}

	public function update(){
		$SQL = 'UPDATE `profile` SET `profile_name`=:profile_name,`email`=:email, `phone_num`=:phone_num, `profile_pic`=:profile_pic WHERE profile_id = :profile_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_name'=>$this->profile_name,'email'=>$this->email,
			'phone_num'=>$this->phone_num, 'profile_pic'=>$this->profile_pic,'profile_id'=>$this->profile_id]);
	}

	public function delete($profile_id){
		$SQL = 'DELETE FROM `profile` WHERE profile_id = :profile_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
	}

}