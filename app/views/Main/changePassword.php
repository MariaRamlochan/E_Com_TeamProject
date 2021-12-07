<html>
<head>
    <title>Change password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="/app/css/design.css">
</head>
<body>


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

    <div class="blue-box">

	<center>
		<h2>Change your password</h2>

		<form method='post' action=''>
			<label>Current Password: <input type="password" name="current_password" value='' /></label><br />
			<label>New Password: <input type="password" name="new_password" value='' /></label><br />
			<label>Confirm New Password: <input type="password" name="new_password_confirm" /></label><br />
			<input type="submit" name="action" value="Change Password"/>
		</form>

		<p><a href='/Profile/index'>Cancel</a></p>
	</center>
    </div>

</body>
</html>