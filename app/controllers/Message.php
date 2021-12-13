<?php
namespace app\controllers;

class Message extends \app\core\Controller{
    
    public function index(){
        $myProfile = new \app\models\Profile();
        $users = $myProfile->getAllUser($_SESSION['user_id']);

		$this->view('/Message/index', ['users'=>$users]);

	 }

    public function send($profile_id){
        $myProfile = new \app\models\Profile();
        $result = $myProfile->get($_SESSION['user_id']);

        if($result){

            $message = new \app\models\Message();
            $messagesReceived = $message->getMessagesReceived($result->profile_id);
            $messagesSent = $message->getMessagesSent($result->profile_id);
            $messages_count = count($message->getUnread($result->profile_id));
            $message->updateStatusPrivate($result->profile_id);

            $userName = $myProfile->getSpecificUser($profile_id);

            $_SESSION['messages_count'] = $messages_count;
        }

		if(isset($_POST['action'])){
			$message = new \app\models\Message();
            $message->sender=$_SESSION['profile_id'];
            $message->receiver=$profile_id;
            $message->message=$_POST['message'];
            $message->read_status='unread';
            $message->private_status=$_POST['private_status'];
			$message->insert();

            header('location:/Message/index');
        } else
            $this->view('Message/send', ['user'=>$userName,'messages_count'=>$messages_count,'messagesReceived'=>$messagesReceived,'messagesSent'=>$messagesSent]);
	}

    public function delete($message_id) {
        $message = new \app\models\message();
        $message->delete($message_id);
        header('location:/Message/index');
    }
}