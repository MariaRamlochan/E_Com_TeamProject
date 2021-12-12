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
    
    <title>Inbox</title>
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
        <a style="color: #2fadfc;" href="/Message/index">Messages</a>
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

        <!-- Title and Search Bar -->
        <div class="container" style="margin-left: 10%"> 
            <form action="/Item/search" method="POST">
                    <div style='display:inline-block; margin-top: 4%'><h1 style="display:inline;color:white; width: 50%; font-size: 400%">Inbox</h1></div>
                    <div style='display:inline-block; margin-left: 33%'><input type="search" class="form-control rounded" placeholder="Search" style="width: 150%; margin-left: 145%" />
                    </div>
            </form>
        </div>


        <!-- Item View -->
        <div class="container" style="margin-top: 5%;">
            <div class="row overflow-auto" style="width: 90%; height: 50%; margin-left: 5%">
                <div> 
                    <table class="table table-light table-hover" style="table-layout: fixed;">
                        <tr class="table-secondary">
                            <th style="width: 20%"></th>
                            <th style="width: 13%"></th>
                            <th style="width: 30%"></th>
                            <th style="width:  9%"></th>
                            <th style="width:  9%"></th>
                            <th style="width:  9%"></th>
                        </tr>
   
                    </table>
                </div>
            </div>
        </div>
        
    </div>
<!-- Content Here -->
</body>
</html>
