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
    
    <title>Favorites</title>
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
        <a style="color: #2fadfc;" href="/Favorite/index">Favorites</a>
        <hr class="admin-hr">
        <a href="/Message/index">Messages</a>
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
                    <div style='display:inline-block; margin-top: 4%'><h1 style="display:inline;color:white; width: 50%; font-size: 400%">Favorite List</h1></div>
                    <div style='display:inline-block; margin-left: 33%'><input type="search" class="form-control rounded" placeholder="Search" style="width: 150%; margin-left: 145%" />
                    </div>
            </form>
        </div>


    <!-- Item View -->
    <div style='display:inline-block; height: 55%'>
        <div class="container insideColor" style="margin-left: 19%; 
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
                              <th scope="col">Sell Info</th>
                              <th scope="col">Unfavorite</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($data as $favorite) {

                            $item = new \app\models\Item();
                            $item = $item->getSpecificItem($favorite->item_id);

                            $profile = new \app\models\Profile();
                            $profile = $profile->getSpecificUser($item->profile_id);
                            echo " <tr> 
                                        <td >
                                            <img src='$item->item_pic' style='width:150px; height: 120px;'>
                                        </td>
                                        <td >$item->item_name</td>
                                        <td style='word-wrap:break-word'>$item->item_desc</td>
                                        <td >$item->item_price$</td>
                                        <td >$item->posted_date</td>
                                        <td >
                                            $profile->profile_name<br><br>
                                            $profile->email<br>
                                            $profile->phone_num
                                        </td>
                                        <td>
                                            <a href='/Favorite/delete/$favorite->favorite_id' class='btn btn-danger' style='width:100%;''>Unfavorite</a>
                                        </td>
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