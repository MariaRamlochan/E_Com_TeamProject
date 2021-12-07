<html>
<head>
    <title>Inbox</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <h2>Menu</h2>

    <a href="/Main/changePassword/">Change password</a><br>
    <a href="/Main/setup2fa">Setup2fa</a><br>
    <a href="/profile/index">My profile</a><br>
    <a href="/profile/search">Search for other profiles</a><br>
    <a href="/Message/index">Inbox(<?php echo $data['messages_count'] ?>)</a><br>
    <a href="/Main/logout">Logout</a><br>
    <h2>Profile</h2>

    <h4>Inbox</h4>
    <p>Messages received:</p>
    <?php 
    if(count($data['messagesReceived'])){
        foreach($data['messagesReceived'] as $message){
            echo "<li> [From: ".$message->username."] ".$message->message."</li>";
            echo "<a href='/Message/delete/$message->message_id'>delete</a>";
        }
    }
    ?>
    <br>
    <p>Messages sent:</p>
    <?php 
    if(count($data['messagesSent'])){
        foreach($data['messagesSent'] as $message){
            echo "<li> [Status: ".$message->read_status."]".$message->message." </li>";
        }
    }
    ?>
</body>
</html>


