<html>
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
</html>