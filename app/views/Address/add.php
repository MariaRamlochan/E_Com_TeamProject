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

	<title>Add Address Information</title>
</head>
<body style="background-image: linear-gradient(to top, rgba(25,25,112,0), rgba(25,25,112,1));">

<center>
<div class="box">
    <div class="container p-3 insideColor" style="width: 80%; height: 127%; margin-top: 25%">

    	<h1 style="font-weight: bold; font-size: 350%">~Insert Address~</h1><hr>

        <form action='' method='post'>

        	<h4 style="margin-right: 36%; font-weight: bold; color: black">Street Number</h4>
        		<input type="text" name="street_num" style="width: 60%; border-radius: 15px"/><br>
        	<h4 style="margin-right: 39%; font-weight: bold; color: black">Street Name</h4>
        		<input type="text" name="street_name" style="width: 60%; border-radius: 15px"/><br>
        	<h4 style="margin-right: 39%; font-weight: bold; color: black">Postal Code</h4>
        		<input type="text" name="postal_code" style="width: 60%; border-radius: 15px"/><br>
        	<h4 style="margin-right: 53%; font-weight: bold; color: black">City</h4>
        		<input type="text" name="city" style="width: 60%; border-radius: 15px"/><br>
        	<h4 style="margin-right: 44%; font-weight: bold; color: black">Province</h4>
        		<input type="text" name="province" style="width: 60%; border-radius: 15px"/><br>
        	<h4 style="margin-right: 44%; font-weight: bold; color: black">Country</h4>
        		<input type="text" name="country" style="width: 60%; border-radius: 15px"/><br><br>

			<input class="btn btn-dark btn-lg" type='submit' name='action' value='Create' style="width: 40%"/>
		</form>
    </div>
</div>
</center>

</body></html>
