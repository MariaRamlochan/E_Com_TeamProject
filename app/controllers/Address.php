<?php
namespace app\controllers;

class Address extends \app\core\Controller{

	public function index(){
		$address = new \app\models\Address();
		$result = $address->get($_SESSION['profile_id']);

		$this->view('Address/index',['address'=>$result]);
	}

	public function insert(){
		$profile_id = $_SESSION['profile_id'];

		if(isset($_POST['action'])){
            $address = new \app\models\Address();
    		$address->profile_id = $profile_id;
    		$address->street_num = $_POST['street_num'];
    		$address->street_name = $_POST['street_name'];
    		$address->postal_code = $_POST['postal_code'];
    		$address->city = $_POST['city'];
            $address->province  = $_POST['province'];
            $address->country  = $_POST['country'];
    		$address->insert();
    		//redirect the user back to the index

            $profile = new \app\models\Profile();
            $profile = $profile->get($_SESSION['user_id']);
            $_SESSION['profile_id'] = $profile->profile_id;
            $_SESSION['profile_name'] = $profile->profile_name;
            $_SESSION['profile_pic'] = $profile->profile_pic;
    		header("location:/Profile/index");
                
        } else {
            $this->view('Address/add');
        }
    }


	public function edit(){
		$address = new \app\models\Address;
		$address = $address->get($_SESSION['profile_id']);

		if(isset($_POST['action'])){
           
            $address = new \app\models\Address();
            $address->profile_id = $_SESSION['profile_id'];
            $address->street_num = $_POST['street_num'];
            $address->street_name = $_POST['street_name'];
            $address->postal_code = $_POST['postal_code'];
            $address->city = $_POST['city'];
            $address->province  = $_POST['province'];
            $address->country  = $_POST['country'];
			$profile->edit();
			//redirect the user back to the index
			header("location:/Address/index");

        }else //1 present a form to the user
            $this->view('Address/edit', ['address'=>$address]);
    }

	public function delete($address_id) {
        $address = new \app\models\Address();
        $address->delete($address_id);
        header('location:/Address/index');
    }

}