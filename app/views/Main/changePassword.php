<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/design.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Change Password</title>
</head>

<body id='container'>

<!-- Side Bar -->
<div class="sidenav">
    <center>

     <img src="<?=$_SESSION['profile_pic'] ?>" class='img-thumbnail img-fluid' alt="Responsive image" id='logo' alt="">
    <center>

    <h2 class="nav-title" style="color:white; margin-top: 30px">
        Welcome <?=$_SESSION['profile_name'] ?>!
    </h2>

    <div class="admin-navbar-items">
        <hr class="admin-hr">
        <a href="/Profile/index">Search</a>
        <hr class="admin-hr">
        <a href="/Item/add">Sell</a>
        <hr class="admin-hr">
        <a href="/Favorite/index">Favorites</a>
        <hr class="admin-hr">
        <a href="/Message/index">Messages</a>
        <hr class="admin-hr">
        <a href="/Item/past">Past Post</a>
        <hr class="admin-hr">
    </div>
    </center>

    <div class="text-center setting-logout-position-admin">
        <a style="color: #2fadfc;" href="/Profile/settings">Settings</a>
        <center>
            <br><br><br><br><br><hr>
        </center>
        <a href="/Main/logout" class="logouthover">Logout</a>
    </div>
</div>
 <!-- Side Bar -->

<!-- Top Bar -->
    <div class="p-4 topBar">
        <ul id="right-side">
            <a href="">username
                <img src="https://i.imgur.com/HMF0ega.jpeg" id="profilepic">
            <!-- <img src="<?php echo $user['profile_pic'];?>" id="profilepic"> -->
            <!-- <?php echo $user['user_name'];?> -->
            </a>
        </ul>
    </div>
<!-- Top Bar -->


<!-- Content Here -->
 <div class="blue-box">

    <!-- Title -->
    <div class="container" style="margin-left: 10%"> 
        <center>
        <div style='display:inline-block; margin-top: 4%'><h1 style="display:inline;color:white; width: 50%; font-size: 400%">
        Edit Password</h1></div>
        </center>
    </div>

    <!-- Item View -->
        <center>
            <div class="container">
                <div class="container p-5 insideColor" style="margin-right: 30%; width: 50%; height: 50%; margin-top: 5%">

                    <form action='' method='post'>
                        <h4 style="margin-right: 29%">Current Password</h4>
                            <input type='password' name='current_password' value='' 
                            style="width: 60%; border-radius: 15px"/><br><br>

                        <h4 style="margin-right: 34%">New Password</h4>    
                            <input type='password' name='new_password' value='' 
                            style="width: 60%; border-radius: 15px"/><br><br>

                        <h4 style="margin-right: 22%">Confirm New Password</h4>
                            <input type='password' name='new_password_confirm' value='' 
                            style="width: 60%; border-radius: 15px"/><br><br><hr>

                        <input type='submit' name='action' value='Change Password' class="btn btn-dark btn-lg" 
                        style="width: 60%; border-radius: 15px"/>
                    </form>

                </div>
            </div>
        </center></div>
<!-- Content Here -->
</body>
</html>


<!-- <center>
        <h2>Change your password</h2>

        <form method='post' action=''>
            <label>Current Password: <input type="password" name="current_password" value='' /></label><br />
            <label>New Password: <input type="password" name="new_password" value='' /></label><br />
            <label>Confirm New Password: <input type="password" name="new_password_confirm" /></label><br />
            <input type="submit" name="action" value="Change Password"/>
        </form>

        <p><a href='/Profile/index'>Cancel</a></p>
    </center> -->