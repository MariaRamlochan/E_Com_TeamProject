<html>
<head><title>This is somewhere secure</title></head>
<body>
	<p>Welcome to somewhere secure... 
	<?= $_SESSION['username'] ?></p>

	<p><a href='<?= BASE ?>/Main/twofasetup'>Two factor authentication setup</a></p>
	<p><a href="<?=BASE?>/Main/changePassword">Change password</a></p>
	<p><a href='<?= BASE ?>/Main/logout'>Logout</a></p>


</body>
</html>