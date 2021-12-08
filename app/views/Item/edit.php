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
    
    <title>Edit your Post</title>
</head>

<body id='container'>

<!-- Side Bar -->
<div class="sidenav">
    <center>

    <img src="/images/bunny.gif" class='img-thumbnail img-fluid' alt="Responsive image" id='logo' alt="">
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
        <a href="/Message/index">Messages</a>
        <hr class="admin-hr">
        <a style="color: #2fadfc;" href="/Item/past">Past Post</a>
        <hr class="admin-hr">
    </div>
    </center>

    <div class="text-center setting-logout-position-admin">
        <a href="#">Settings</a>
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
            <a href="">username
                <img src="https://i.imgur.com/HMF0ega.jpeg" id="profilepic">
            <!-- <img src="<?php echo $user['profile_pic'];?>" id="profilepic"> -->
            <!-- <?php echo $user['user_name'];?> -->
            </a>
        </ul>
    </div>
<!-- Top Bar -->


<!-- Content Here -->
    <div class="blue-box">

     <!-- Title and Search Bar -->
     <div class="container" style="margin-left: 7%;"> 
                 <div style='display:inline-block; margin-top: 4%; margin-left: 43%'>
                    <h1 style="display:inline;color:white; width: 50%; font-size: 400%">Your Treasures</h1>
                 </div>
                 
         </form>
     </div>


    <!-- Item View -->
    <div style='display:inline-block; height: 55%'>
        <div class="container insideColor" style="margin-left: 50%; margin-top: 5%; width: 500%; height: 145%">

            <form action="/Item/insert" method="post"  enctype="multipart/form-data">
                <div>
                    <center>
                        <h4 style="margin-right: 52%">Item Image</h4>
                            <input class="editDesign btn btn-primary" type="file" name="newPicture" 
                                style="width: 60%; border-radius: 20px">
                        <h4 style="margin-right: 52%">Item Name</h4>
                            <input class="editDesign" type="text" name="item_name" style="color: black; width: 60%">
                        <h4 style="margin-right: 55%">Price</h4>
                            <input class="editDesign" type="number" name="item_price" min="0" step=".01" style="color: black; width: 60%">
                        <h4 style="margin-right: 78%">Item Description</h4>
                            <textarea class="editDesign" type="text" name="item_desc" style="width: 90%; height: 45%; resize:none; color: black;"></textarea>
                    </center>
                </div>
                <div>
                    <center><hr>
                    <input type="submit" name="action" class="btn btn-success btn-lg" value="Save" style="width: 50%" />
                    </center>
                </div>
      </form>
            
        </div>
    </div>
</div>
<!-- Content Here -->
</body>
</html>