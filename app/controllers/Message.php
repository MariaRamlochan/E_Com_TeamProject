<?php
namespace app\controllers;

class Message extends \app\core\Controller{
    
    public function index(){
  //       if (!isset($_SESSION['user_id'])) {
  //           header('location:/Main/login');
  //       }
		// else if(!isset($_SESSION['verified'])){
		// 	header('location:/Main/verify');
		// }
		// $myProfile = new \app\models\Profile();
		// $result = $myProfile->get($_SESSION['user_id']);
  //       if($result){
  //           $_SESSION['profile_id'] = $result->profile_id;

  //           $message = new \app\models\Message();
  //           $messagesReceived = $message->getPrivate($result->profile_id);
  //           $messagesSent = $message->getMessagesSent($result->profile_id);
  //           $messages_count = count($message->getUnreadPrivate($result->profile_id));
  //           $message->updateStatusPrivate($result->profile_id);

		//     $this->view('/message/index',['user'=>$result,'messages_count'=>$messages_count,'messagesReceived'=>$messagesReceived,'messagesSent'=>$messagesSent]);
  //       }
  //       else
		//     $this->view('/profile/create');

        $item = new \app\models\Item();
        $result = $item->get($_SESSION['profile_id']);
        $profile = new \app\models\Profile();
        $user = $profile->get($_SESSION['user_id']);

        $this->view('Message/index',['item'=>$result, 'user'=>$user]);

	}

    public function send($profileID){
		//insert a new record ne known PK yet
		if (!isset($_SESSION['user_id'])) {
            header('location:/Main/login');
        }
		else if(!isset($_SESSION['verified'])){
			header('location:/Main/verify');
		}
        //2 steps
		//2 get the information from the user and input it in the DB
		if(isset($_POST['action'])){//verify that the user clicked the submit button
			$message = new \app\models\Message();
            $message->sender=$_SESSION['profile_id'];
            $message->receiver=$profileID;
            $message->message=$_POST['message'];
            $message->read_status='unread';
            $message->private_status=$_POST['private_status'];
			$message->insert();
            header('location:/Main/index');
        }
	}

    public function delete($message_id) {
        if (!isset($_SESSION['user_id'])) {
            header('location:/Main/login');
        }
        else if(!isset($_SESSION['verified'])){
            header('location:/Main/verify');
        }
        $message = new \app\models\message();
        $message->delete($message_id);
        header('location:/Message/index');
    }
}