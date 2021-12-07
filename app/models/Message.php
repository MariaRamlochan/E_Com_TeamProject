<?php
namespace app\models;

class Message extends \app\core\Model{

    public $message_id;
	public $sender;
	public $receiver;
	public $message;
	public $read_status;
	public $private_status;

	public function __construct(){
		parent::__construct();
	}

	public function getPrivate($profile_id){
		$SQL = 'SELECT message.*,user.username FROM `message` join profile on message.sender = profile.profile_id join user on user.user_id= profile.user_id where receiver = :profile_id && `private_status` = :private_status';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'private','profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Message');
		return $STMT->fetchAll();//returns an array of all the records
	}
    public function updateStatusPrivate($profile_id){
        $SQL = 'UPDATE `message` SET read_status="reread" where read_status="read" && receiver = :profile_id && `private_status` = :private_status';
        $STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'private','profile_id'=>$profile_id]);

		$SQL = 'UPDATE `message` SET read_status="read" where read_status="unread" && receiver = :profile_id && `private_status` = :private_status';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'private','profile_id'=>$profile_id]);
	}
    public function updateStatusPublic($profile_id){
        $SQL = 'UPDATE `message` SET read_status="reread" where read_status="read" && receiver = :profile_id && `private_status` = :private_status';
        $STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'public','profile_id'=>$profile_id]);

		$SQL = 'UPDATE `message` SET read_status="read" where read_status="unread" && receiver = :profile_id && `private_status` = :private_status';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'public','profile_id'=>$profile_id]);
	}
    public function getUnreadPrivate($profile_id){
		$SQL = 'SELECT * FROM `message` where read_status="unread" && receiver = :profile_id && `private_status` = :private_status';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'private','profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Message');
		return $STMT->fetchAll();//returns an array of all the records
	}
    public function getPublic(){
		$SQL = 'SELECT message.*,user.username FROM `message` join profile on message.sender = profile.profile_id join user on user.user_id= profile.user_id where `private_status` = :private_status';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'public']);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Message');
		return $STMT->fetchAll();//returns an array of all the records
	}
    public function getMessagesSent($profile_id){
		$SQL = 'SELECT * FROM message where sender = :profile_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Message');
		return $STMT->fetchAll();//returns an array of all the records
	}

	public function insert(){
		$SQL = 'INSERT INTO `message`(`sender`, `receiver`, `message`, `read_status`, `private_status`) 
        VALUES (:sender,:receiver,:message,:read_status,:private_status)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['sender'=>$this->sender, 'receiver'=>$this->receiver, 'message'=>$this->message, 'read_status'=>$this->read_status, 'private_status'=>$this->private_status]);//associative array with key => value pairs
	}

	public function delete($message_id) {
		$SQL = 'DELETE FROM `message` where message_id = :message_id && `private_status` = :private_status';
        $STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['private_status'=>'private','message_id'=>$message_id]);

	}

}