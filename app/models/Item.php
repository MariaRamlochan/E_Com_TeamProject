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
	public $status;

	public function __construct(){
		parent::__construct();
	}

	public function get($profile_id){
        $SQL = "SELECT * FROM item WHERE profile_id = :profile_id AND `status` = 'available'";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetch();
    }

    public function getSpecificItem($item_id){
        $SQL = "SELECT * FROM item WHERE item_id = :item_id AND `status` = 'available'";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_id'=>$item_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetch();
    }

    public function getAllItem($profile_id){
        $SQL = "SELECT * FROM item WHERE profile_id = :profile_id AND `status` = 'available'";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }


	public function getAll(){
        $SQL = "SELECT * FROM item WHERE `status` = 'available' ";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getDiscard(){
        $SQL = "SELECT * FROM item WHERE `status` = 'unavailable' ";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

	public function insert(){
		$SQL = 'INSERT INTO item(profile_id, item_name, item_pic, item_desc, item_price, visits) 
		VALUES (:profile_id, :item_name, :item_pic, :item_desc, :item_price, :visits)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,'item_name'=>$this->item_name, 'item_pic'=>$this->item_pic,
			'item_desc'=>$this->item_desc, 'item_price'=>$this->item_price, 'visits'=>$this->visits]);
	}

	public function update(){
		$SQL = 'UPDATE `item` SET `item_name`=:item_name,`item_pic`=:item_pic, `item_desc`=:item_desc, `item_price`=:item_price, `visits`=:visits, `status`=:status WHERE item_id = :item_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_name'=>$this->item_name,'item_pic'=>$this->item_pic, 'item_desc'=>$this->item_desc, 'item_price'=>$this->item_price, 'visits'=>$this->visits, 'status'=>$this->status, 'item_id'=>$this->item_id]);
	}

}