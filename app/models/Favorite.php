<?php
namespace app\models;

class Favorite extends \app\core\Model{
	public $favorite_id;
	public $profile_id;
	public $item_id;

	public function __construct(){
		parent::__construct();
	}

	public function get($profile_id, $item_id){
        $SQL = 'SELECT * FROM favorite WHERE profile_id = :profile_id AND item_id = : item_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id, 'item_id'=>$item_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Favorite');
        return $STMT->fetch();
    }

	public function getAll($profile_id){
        $SQL = 'SELECT * FROM favorite WHERE profile_id = :profile_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Favorite');
        return $STMT->fetchAll();
    }


	public function insert(){
		$SQL = 'INSERT INTO favorite(profile_id, item_id) 
		VALUES (:profile_id, :item_id)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id, 'item_id'=>$this->item_id]);
	}

	public function delete($favorite_id){
		$SQL = 'DELETE FROM `favorite` WHERE favorite_id = :favorite_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['favorite_id'=>$favorite_id]);
	}

}