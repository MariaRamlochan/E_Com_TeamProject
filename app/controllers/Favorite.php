<?php
namespace app\controllers;

class Favorite extends \app\core\Controller{

	public $folder='uploads/';

	public function index(){
		$favorite = new \app\models\Favorite();
		$favorite = $favorite->getAll($_SESSION['profile_id']);


		$this->view('Favorite/index', $favorite);
	}

	public function insert($item_id){
        $favorite = new \app\models\Favorite();
        $favorite->profile_id = $_SESSION['profile_id'];
        $favorite->item_id = $item_id;
        $favorite->insert();

		header("location:/Profile/index");
    }


	public function edit(){

		$item = new \app\models\Item;
		$item = $item->get($_SESSION['profile_id']);

		if(isset($_POST['action'])){
            if ($_FILES['newPicture']['size']>0) {
                $check = getimagesize($_FILES['newPicture']['tmp_name']);
                $mime_type_to_extension = ['image/jpeg'=>'.jpg',
                                            'image/gif'=>'.gif',
                                            'image/bmp'=>'.bmp',
                                            'image/png'=>'.png'
                                            ];
                if($check !== false && isset($mime_type_to_extension[$check['mime']])){
                    $extension = $mime_type_to_extension[$check['mime']];
                }else{
                    $this->view('Profile/index', ['error'=>"Bad file type",'pictures'=>[]]);
                    return;
                }
                
                $filename = uniqid().$extension;
                $filepath = $this->folder.$filename;

                if($_FILES['newPicture']['size'] > 4000000){
                     $this->view('Profile/index', ['error'=>"File too large",'pictures'=>[]]);
                     return;
                }
                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
                    $item = new \app\models\Item();
                    $item->profile_id = $_SESSION['profile_id'];
                    $item->item_name = $_POST['item_name'];
                    $item->item_desc = $_POST['item_desc'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_pic = "/".$this->folder.$filename;
					$profile->edit();
					//redirect the user back to the index
					header("location:/Item/index");
                } else{
                    echo "There was an error";
                } 
            } else {
                    $item->profile_id = $_SESSION['profile_id'];
                    $item->item_name = $_POST['item_name'];
                    $item->item_desc = $_POST['item_desc'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_pic = "/".$this->folder.$filename;
                    $profile->edit();

                    header("location:/Item/index");
            }

        }else //1 present a form to the user
            $this->view('Item/edit', ['item'=>$item]);
    }

	public function delete($favorite_id) {
        $favorite = new \app\models\Favorite();
        $favorite->delete($favorite_id);
        header('location:/Favorite/index');
    }


 //    public function search(){

 //        if(isset($_POST['action'])){
			
 //            $profile = new \app\models\Profile;
 //            $profiles = $profile->search($_POST['user_name']);
 //            $this->view('/Profile/search',['users'=>$profiles]);
	// 	}else
	// 		$this->view('/Profile/search',['users'=>[]]);
	// }

}