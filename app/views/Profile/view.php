<html>
<head>
    <title>Profile index</title>
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
    <form action='/message/send/<?php echo $data['user']->profile_id; ?>' method='post'>
        message: <input type='text' name='message' value='' />
        <br>
        <label for="">public</label>
        <input type="radio" name="private_status" value="public" checked>
        <label for="">private</label>
        <input type="radio" name="private_status" value="private">
        <input type='submit' name='action' value='Send' />
    </form>
    <p>Messages:</p>
    <?php 
    if(count($data['messages'])){
        foreach($data['messages'] as $message){
            echo "<li>".$message->username." : ".$message->message."</li>";
        }
    }
    ?>
    <h4>Information</h4>
        <h4>First Name :<?php echo $data['user']->first_name ?></h4> 
        <h4>Middle Name :<?php echo $data['user']->middle_name ?></h4> 
        <h4>Last Name :<?php echo $data['user']->last_name ?></h4>

<h4>Pictures</h4>
    <?php
    if(count($data['pictures'])){
        foreach($data['pictures'] as $picture){
            echo "<img alt='picture' style='width:185px' src='/uploads/".$picture->filename."'><br>";
            echo "<span>Caption: ".$picture->caption."</span><br>";
        }
    }
    ?>
</body>
</html>


