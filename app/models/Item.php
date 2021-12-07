<?php
namespace app\models;

class Item extends \app\core\Model{
	public $profile_id;
	public $item_id;
	public $item_name;
	public $item_pic;
	public $item_desc;
	public $item_price;
	public $posted_date;
	public $visits;

	public function __construct(){
		parent::__construct();
	}

	public function get($profile_id){
        $SQL = 'SELECT * FROM item WHERE profile_id = :profile_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetch();
    }

	public function getAll($profile_id){
        $SQL = 'SELECT * FROM item WHERE profile_id = :profile_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

	public function insert(){
		$SQL = 'INSERT INTO item(profile_id, item_name, item_pic, item_desc, item_price, posted_date, visits) 
		VALUES (:user_id, :item_name, :item_pic, :item_desc, :item_price, :posted_date, :visits)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,'item_name'=>$this->item_name, 'item_pic'=>$this->item_pic,
			'item_desc'=>$this->item_desc, 'item_price'=>$this->item_price, 'posted_date'=>$this->posted_date, 'visits'=>$this->visits]);
	}

	public function update(){
		$SQL = 'UPDATE `item` SET `item_name`=:item_name,`item_pic`=:item_pic, `item_desc`=:item_desc, `item_price`=:item_price, `visits`=:visits WHERE item_id = :item_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_name'=>$this->item_name,'item_pic'=>$this->item_pic, 'item_desc'=>$this->item_desc, 'item_price'=>$this->item_price, 'visits'=>$this->visits, 'item_id'=>$this->item_id]);
	}

	public function delete($item_id){
		$SQL = 'DELETE FROM `item` WHERE item_id = :item_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$item_id]);
	}

}