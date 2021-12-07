<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/app/css/design.css">

	<title>Add Profile Information</title>
</head>

<body style="background-image: linear-gradient(to top, rgba(25,25,112,0), rgba(25,25,112,1));">

	<center>
	<div class="box">
	    <div class="container p-3 insideColor" style="width: 80%; height: 115%; margin-top: 25%">

	    	<h1 style="font-weight: bold; font-size: 350%">~Insert Profile Info~</h1><hr>

	        <form action='' method='post' enctype="multipart/form-data">

	        	<h4 style="margin-right: 27%; font-weight: bold; color: black">Add A profile Picture</h4>
	        		<input class="btn btn-primary btn-lg" type="file" name="newPicture" style="width: 60%; border-radius: 15px"/><br>

	        	<h4 style="margin-right: 38%; font-weight: bold; color: black">Profile Name</h4>
	        		<input type='text' name='profile_name' style="width: 60%; border-radius: 15px"/><br>

	        	<h4 style="margin-right: 48%; font-weight: bold; color: black">Email</h4>
	        		<input type='text' name='email' style="width: 60%; border-radius: 15px"/><br>

	        	<h4 style="margin-right: 35%; font-weight: bold; color: black">Phone Number</h4>
	        		<input type='tel' name='phone_num' style="width: 60%; border-radius: 15px"/><br><br><br>

				<input class="btn btn-dark btn-lg" type='submit' name='action' 
						value='Create' style="width: 40%"/>
			</form>
	    </div>
	</div>
	</center>

</body>
</html>
