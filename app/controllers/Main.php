<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	#[\app\filters\Login]
	#[\app\filters\TwoFactor]
	public function index(){
		$this->view('Main/index');
	}

	public function register(){
		if(isset($_POST['action']) && $_POST['password'] == $_POST['password_confirm']){
			$user = new \app\models\User();
			$user->username = $_POST['username'];
			$user->password = $_POST['password'];
			$user->insert();
			$user = $user->get($_POST['username']);
			$_SESSION['user_id'] = $user->user_id;
			$_SESSION['username'] = $user->username;

			header('location:/Profile/insert');
		}else
			$this->view('Main/register');
	}

	public function login(){
		if(!isset($_SESSION['failedattempts']))
			$_SESSION['failedattempts']=0;

		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);

			if($_SESSION['failedattempts'] < 3 && $user!=false && password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['username'] = $user->username;
				$_SESSION['last_login_timestamp'] = $user->last_login_timestamp;
				$_SESSION['failedattempts']=0;
				$user->updateLoginTimestamp();

				$profile = new \app\models\Profile();
        		$profile = $profile->get($_SESSION['user_id']);
        		$_SESSION['profile_id'] = $profile->profile_id;
        		$_SESSION['profile_name'] = $profile->profile_name;
        		$_SESSION['profile_pic'] = $profile->profile_pic;
        		$address = new \app\models\Address();
        		$address = $address->get($_SESSION['profile_id']);
        		$_SESSION['address_id'] = $address->address_id;
				if($user->secret_key != '')
					$_SESSION['secret_key'] = $user->secret_key;
				header('location:'.BASE.'Profile/index');
			}else{
				$this->view('Main/login','Wrong username and password combination!');
				$_SESSION['failedattempts'] += 1;
			}

		}else //1 present a form to the user
			$this->view('Main/login');
	}

	public function logout(){
		if($_SESSION['failedattempts'] <3){
			session_destroy();
		}
		header('location:/Main/login');
	}
	
	#[\app\filters\Login]
	public function makeQRCode(){
		$data = $_GET['data'];
		\QRcode::png($data);
	}
	
	#[\app\filters\Login]
	public function setup2fa(){
	    if(isset($_POST['action'])){
	        $currentcode = $_POST['currentCode'];
	        if(\app\core\TokenAuth6238::verify($_SESSION['secretkey'],$currentcode)){
	//the user has verified their proper 2-factor authentication setup
	            $user = new \App\models\User();
	            $user->user_id = $_SESSION['user_id'];
	            $user->secret_key = $_SESSION['secretkey'];
	            $user->update2fa();
	          	header('location:/Profile/index');
	        }else{
	            header('location:'.BASE.'Main/setup2fa?error=token not verified!');//reload
	        }
	    }else{
	        $secretkey = \app\core\TokenAuth6238::generateRandomClue();
	        $_SESSION['secretkey'] = $secretkey;
	        $url = \app\core\TokenAuth6238::getLocalCodeUrl($_SESSION['username'],'TeamProject.com',$secretkey,'Great Succes');
	        $this->view('Main/twofasetup', $url);
	    }
	}

	#[\app\filters\Login]
	public function check2fa(){
	    if(isset($_POST['action'])){
	        $currentcode = $_POST['currentCode'];
	        if(\app\core\TokenAuth6238::verify($_SESSION['secret_key'],$currentcode)){
	        	unset($_SESSION['secret_key']);
	            header('location:'.BASE.'Main/index');
	        }else{
	        	session_destroy();
	            header('location:'.BASE.'Main/login');
	        }
	    }else{
	        $this->view('Main/check2fa');
	    }
	}

	public function changePassword(){

		$user = new \App\models\User();
		$user = $user->get($_SESSION['username']);
		$profile = new \app\models\Profile;
		$profile = $profile->get($_SESSION['user_id']);

		if(isset($_POST['action'])){
			if(!password_verify($_POST['current_password'], $user->password_hash)){
				header('location:/Profile/changePassword?error=Wrong current password!');	
			} else {	

				if($_POST['new_password'] == $_POST['new_password_confirm'] && !empty($_POST['new_password'])){
					$user->password_hash = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
					$user->update();
					header('location:/Profile/index');
				}else
					header('location:/Main/changePassword?error=New passwords do not match or new password is empty!');
			}
		}else{
			$this->view('Main/changePassword', ['profile'=>$profile]);
		}
	}

}