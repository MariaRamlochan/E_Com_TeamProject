<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	public $folder='uploads/';

	public function index(){
		$item = new \app\models\Item();
        $result = $item->getAll();
        
		$this->view('Profile/index', $result);
	}

    public function settings(){
        
        $this->view('Profile/settings');
    }

	public function insert(){
		$user_id = $_SESSION['user_id'];

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
                    $this->view('Main/index', ['error'=>"Bad file type",'pictures'=>[]]);
                    return;
                }
                
                $filename = uniqid().$extension;
                $filepath = $this->folder.$filename;

                if($_FILES['newPicture']['size'] > 4000000){
                     $this->view('Main/index', ['error'=>"File too large",'pictures'=>[]]);
                     return;
                }
                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
                    $profile = new \app\models\Profile();
					$profile->user_id = $user_id;
					$profile->profile_name = $_POST['profile_name'];
					$profile->email = $_POST['email'];
					$profile->phone_num = $_POST['phone_num'];
					$profile->profile_pic = "/".$this->folder.$filename;
					$profile->insert();

                    $profile = $profile->get($user_id);
                    $_SESSION['profile_id'] = $profile->profile_id;
					//redirect the user back to the index
					header("location:/Address/insert");
                } else{
                    echo "There was an error";
                } 
            }
        } else {
            $this->view('Profile/add');
        }
    }


	public function edit($profile_id){

		$profile = new \app\models\Profile;
		$profile = $profile->get($_SESSION['user_id']);

		if(isset($_POST['action'])){
            if ($_FILES['newPicture']['size']>0) {
                $check = getimagesize($_FILES['newPicture']['tmp_name']);
                $mime_type_to_extension = ['image/jpeg'=>'.jpg',
                                            'image/gif'=>'.gif',
                                            'image/bmp'=>'.bmp',
                                            'image/png'=>'.png',
                                            'image/jfif'=>'.jfif'
                                            ];
                if($check !== false && isset($mime_type_to_extension[$check['mime']])){
                    $extension = $mime_type_to_extension[$check['mime']];
                }else{
                    $this->view('Profile/settings', ['error'=>"Bad file type",'pictures'=>[]]);
                    return;
                }
                
                $filename = uniqid().$extension;
                $filepath = $this->folder.$filename;

                if($_FILES['newPicture']['size'] > 4000000){
                     $this->view('Profile/settings', ['error'=>"File too large",'pictures'=>[]]);
                     return;
                }
                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
                    $profile = new \app\models\Profile();
					$profile->profile_id = $profile_id;
					$profile->profile_name = $_POST['profile_name'];
					$profile->email = $_POST['email'];
					$profile->phone_num = $_POST['phone_num'];
					$profile->profile_pic = "/".$this->folder.$filename;
					$profile->update();
                    $_SESSION['profile_pic'] = $profile->profile_pic;
					//redirect the user back to the index
					header("location:/Profile/settings");
                } else{
                    echo "There was an error";
                } 
            } else {
                    $profile->profile_id = $profile_id;
					$profile->profile_name = $_POST['profile_name'];
					$profile->email = $_POST['email'];
					$profile->phone_num = $_POST['phone_num'];
					$profile->update();
                    $_SESSION['profile_pic'] = $profile->profile_pic;

                    header("location:/Profile/settings");
            }

        }else //1 present a form to the user
            $this->view('Profile/edit', ['profile'=>$profile]);
    }


    public function delete($user_id){

        $user = new \app\models\User;
        $user = $user->getUser($user_id);
        $user->delete($user_id);
        header("location:/Profile/settings");
    }


    public function search(){

        if(isset($_POST['action'])){
			
            $profile = new \app\models\Profile;
            $profiles = $profile->search($_POST['user_name']);
            $this->view('/Profile/search',['users'=>$profiles]);
		}else
			$this->view('/Profile/search',['users'=>[]]);
	}

	public function view_profile($user_id, $profile_id){
        if($user_id != $_SESSION['user_id']){
		$myProfile = new \app\models\Profile();
		$result = $myProfile->get($user_id);
        
            if($result){
                $message = new \app\models\Message();
                $messages = $message->getPublic($profileID);
                $messages_count = count($message->getUnreadPrivate($result->profile_id));

                $this->view('/Profile/view',['user'=>$result,'messages_count'=>$messages_count,'messages'=>$messages]);
            }
            else{
                header('location:/Profile/index');
            }
        }
        else{
            header('location:/Profile/index');
        }
	}

}