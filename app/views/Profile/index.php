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
    
    <title>Items for Sale</title>
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
        <a style="color: #2fadfc;" href="/Profile/index">Search</a>
        <hr class="admin-hr">
        <a href="/Item/index">Sell</a>
        <hr class="admin-hr">
        <a href="/Favorite/index">Favorites</a>
        <hr class="admin-hr">
        <a href="/Message/index">Messages</a>
        <hr class="admin-hr">
        <a href="/Item/past">Past Post</a>
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
        <div class="container" style="margin-left: 8%"> 
            <form action="/Item/search" method="POST">
                    <div style='display:inline-block; margin-top: 4%'><h1 style="display:inline;color:white; width: 50%; font-size: 400%">Items for Sale</h1></div>
                    <div style='display:inline-block;'><input type="search" class="form-control rounded" placeholder="Search" style="width: 150%; margin-left: 145%" /></div>
            </form>
        </div>


    <!-- Item View -->
    <div style='display:inline-block; height: 55%'>
        <div class="container insideColor" style="height: 165%; margin-left: 28%; 
                margin-top: 5%; width: 400%; height: 145%">
            <section class="p-3" style="width: 100%;margin-top: 1.5%">
                <div class="table-wrapper-scroll-y my-custom-scrollbarSell">
                    <table class="table table-bordered table-striped table-dark"> 
                        <thead>
                            <tr>
                              <th scope="col">Image</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Price</th>
                              <th scope="col">Post Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($data as $result) {
                            echo " <tr> 
                                        <td >
                                            <img src='$result->item_pic' style='width:150px; height: 120px;'>
                                        </td>
                                        <td >$result->item_name</td>
                                        <td style='word-wrap:break-word'>$result->item_desc</td>
                                        <td >$result->item_price</td>
                                        <td >$result->posted_date</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                 </div>
            </section>
        </div>
    </div> 
</div>
<!-- Content Here -->
</body>
</html>