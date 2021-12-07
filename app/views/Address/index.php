<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/design.css">
    <title>Address View</title>
</head>
<body>

<div class="sidenav">
        <center>
        <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome <?=$data['user']->profile_name ?>!</h2>

        <div class="admin-navbar-items">
            <hr class="admin-hr">
            <a style="color: #2fadfc;" href="/Profile/index">Search</a>
            <hr class="admin-hr">
            <a href="/Item/add">Sell Item</a>
            <hr class="admin-hr">
            <a href="/Item/index">Search Item</a>
            <hr class="admin-hr">
            <a href="/Message/index">Messages</a>
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
            <div style="margin-top: 5%;">
                Street Number: <input disabled type='text' name='street_num' value='<?php echo $data['address']->street_num; ?>' /><br>
                Street Name: <input disabled type='text' name='street_name' value='<?php echo $data['address']->street_name; ?>' /><br>
                Postal Code: <input disabled type='text' name='postal_code' value='<?php echo $data['address']->postal_code ?>' /><br>
                City: <input disabled type='text' name='city' value='<?php echo $data['address']->city ?>' /><br>
                Province: <input disabled type='text' name='province' value='<?php echo $data['address']->province ?>' /><br>
                Country: <input disabled type='text' name='country' value='<?php echo $data['address']->country ?>' /><br>
            </div>
        </center>
    </div>

</body>
</html>