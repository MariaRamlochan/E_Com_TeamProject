<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="/app/css/design.css">
	<title>Edit Profile</title>
</head>
<body>

	<!-- Navigation Bar -->
	<div class="sidenav">
        <center>
        <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome <?=$data['profile']->profile_name ?>!</h2>

        <div class="admin-navbar-items">
            <hr class="admin-hr">
            <a href="/Profile/index">Home</a>
            <hr class="admin-hr">
            <a href="/Picture/index">Profile Picture</a>
            <hr class="admin-hr">
            <a href="/Profile/edit">Edit Profile</a>
            <hr class="admin-hr">
            <a href="/Main/changePassword">Change Password</a>
            <hr class="admin-hr">
            <a href="/Main/setup2fa">2fa Setup</a>
            <hr class="admin-hr">
        </div>
        </center>

        <hr>
        <div class="text-center setting-logout-position-admin">
            <a href="#">Settings</a>
            <center>
            	<br><br><br><br><br><br><br><br><br><br>
                <hr class="setting-logout-hr">
            </center>
            <a href="/Main/logout" class="logouthover">Logout</a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="blue-box">
    	<center>
	    	<h2>Edit Your Profile Information</h2>
			<form action='' method='post'>
				Profile Name: <input type='text' name='profile_name' value='<?php echo $data['profile']->profile_name; ?>' /><br>
				Email: <input type='text' name='email' value='<?php echo $data['profile']->email; ?>' /><br>
				Phone Number: <input type='text' name='phone_num' value='<?php echo $data['profile']->phone_num; ?>' /><br>
				<input type='submit' name='action' value='Save changes' />
			</form>
		</center>
    </div>

</body>
</html>