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
    
    <title>2FA Setup</title>
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
        <a style="color: #2fadfc;" href="/Profile/index">Search</a>
        <hr class="admin-hr">
        <a href="/Item/index">Sell</a>
        <hr class="admin-hr">
        <a href="/Favorite/index">Favorites</a>
        <hr class="admin-hr">
        <a href="/Message/index">Messages(<?php echo $_SESSION['messages_count'] ?>)</a>
        <hr class="admin-hr">
        <a href="/Item/past">Past Post</a>
        <hr class="admin-hr">
    </div>
    </center>

    <div class="text-center setting-logout-position-admin">
        <a href="/Profile/settings">Settings</a>
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
            <a href="">About Us
                <img src="/images/bunny.gif" id="profilepic">
            </a>
        </ul>
    </div>
<!-- Top Bar -->



    <!-- Content Here -->
 <div class="blue-box">

    <!-- Title -->
    <div class="container" style="margin-left: 10%"> 
        <center>
	        <div style='display:inline-block; margin-top: 4%'>
	        	<h1 style="display:inline;color:white; width: 50%; font-size: 400%">2FA Setup</h1>
	        </div>
        </center>
    </div>

    <!-- Item View -->
    <center>
        <div class="container">
            <div class="container p-5 insideColor" style="margin-right: 30%; width: 50%; height: 63%; margin-top: 5%">

	           	<img src="/Main/makeQRCode?data=<?= $data ?>" />
				<br><hr>
					<h4>Please scan the QR-code on the screen with your favorite
					Authenticator software, such as Google Authenticator. The
					authenticator software will generate codes that are valid for 30
					seconds only. Enter such a code while and submit it while it is
					still valid to confirm that the 2-factor authentication can be
					applied to your account.</h4><hr>

				<form method="post" action="">
					<h4 style="margin-right: 36%">Current code:</h4>
					<input type="text" name="currentCode" style="width: 60%; border-radius: 15px"/><br><br>
					<input type="submit" name="action" value="Verify code" 
					class="btn btn-dark" style="width: 60%; border-radius: 15px"/>
				</form>

            </div>
        </div>
    </center>
</div>
</div>
<!-- Content Here -->
</body>
</html>




<!-- <html>
<head>
    <title>Dashboard index</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
	
<img src="/Main/makeQRCode?data=<?= $data ?>" />
<br>
Please scan the QR-code on the screen with your favorite
Authenticator software, such as Google Authenticator. The
authenticator software will generate codes that are valid for 30
seconds only. Enter such a code while and submit it while it is
still valid to confirm that the 2-factor authentication can be
applied to your account.
<form method="post" action="">
<label>Current code:<input type="text" name="currentCode"
/></label>
<input type="submit" name="action" value="Verify code" />
</form>

</body>
</html> -->