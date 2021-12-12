<?php
namespace app\models;

class Address extends \app\core\Model{
	public $profile_id;
	public $address_id;
	public $street_num;
	public $street_name;
	public $postal_code;
	public $city;
	public $province;
	public $country;

	public function __construct(){
		parent::__construct();
	}

	public function get($profile_id){
        $SQL = 'SELECT * FROM address WHERE profile_id = :profile_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Address');
        return $STMT->fetch();
    }

    public function getAddress($address_id){
        $SQL = 'SELECT * FROM address WHERE address_id = :address_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['address_id'=>$address_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Address');
        return $STMT->fetch();
    }

	public function getAll($profile_id){
        $SQL = 'SELECT * FROM address WHERE profile_id = :profile_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id'=>$profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Address');
        return $STMT->fetchAll();
    }

	public function insert(){
		$SQL = 'INSERT INTO address(profile_id, street_num, street_name, postal_code, city, province, country) 
		VALUES (:profile_id, :street_num, :street_name, :postal_code, :city, :province, :country)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id,'street_num'=>$this->street_num, 'street_name'=>$this->street_name,
			'postal_code'=>$this->postal_code, 'city'=>$this->city, 'province'=>$this->province, 'country'=>$this->country]);
	}

	public function update(){
		$SQL = 'UPDATE `address` SET `street_num`=:street_num,`street_name`=:street_name, `postal_code`=:postal_code, `city`=:city, `province`=:province, `country`=:country WHERE address_id = :address_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['street_num'=>$this->street_num,'street_name'=>$this->street_name, 'postal_code'=>$this->postal_code, 'city'=>$this->city, 'province'=>$this->province, 'country'=>$this->country, 'address_id'=>$this->address_id]);
	}

	public function delete($address_id){
		$SQL = 'DELETE FROM `address` WHERE address_id = :address_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['address_id'=>$address_id]);
	}

}