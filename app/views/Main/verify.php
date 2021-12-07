
<html>
<head>
<title>2fa verify</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<h2>Menu</h2>

<ul>
  <li><a href="/Main/logout">Logout</a></li>
</ul>
<br>
Please Verify 2fa :
<form method="post" action="/Main/verify2fa">
<label>Current code:<input type="text" name="currentCode"
/></label>
<input type="submit" name="action" value="Verify code" />
</form>
</body>
</html>