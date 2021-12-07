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
        Welcome <?=$data['user']->profile_name ?>!
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
        <a href="/Item/discard">Past Post</a>
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
        <div class="container" style="margin-left: 1%"> 
            <form action="/Item/search" method="POST">
                    <div style='display:inline-block;'><h1 style="display:inline;color:white; width: 50%; font-size: 400%">Items for Sale</h1></div>
                    <div style='display:inline-block;'><input type="search" class="form-control rounded" placeholder="Search" style="width: 150%; margin-left: 200%" /></div>
            </form>
        </div>


    <!-- Item View -->
    <div style='display:inline-block; height: 55%'>
        <div class="container" style="height: 40%; margin-left: 1%">
            <section class="p-3" style="width: 85%;">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-striped table-dark"> 
                        <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">#</th>
                              <th scope="col">Item</th>
                              <th scope="col">Type</th>
                              <th scope="col">Theme</th>
                              <th scope="col">Production Cost</th>
                              <th scope="col">Sale Cost</th>
                              <th scope="col">Sale Quantity</th>
                              <th scope="col">Listed Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>
                                <center>
                                    <!-- Modal for remove button trigger -->
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" 
                                    data-toggle="modal" data-target="#removeItemRow">Remove</button>
                                    <!-- Modal for remove button trigger -->

                                    <!-- Modal for the edit button trigger -->
                                    <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" 
                                            style="width: 40%" data-toggle="modal" data-target="#editItemRow">Edit
                                    </button>
                                    <!-- Modal for the endit button trigger -->
                                </center>
                              </td>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>Testing</td>
                            </tr>
                        </tbody>
                    </table>
                 </div>
            </section>
        </div>
    </div>

        <!-- Filter -->
        <div style='display:inline-block; margin-left: 5%'>
            <div class="container" style="width: 150%">
                <fieldset class="p-3" style="width: 13%; margin-right: 0.2%">
                <!-- modal button trigger -->
                <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" 
                        data-target="#modalCenter">Add new item</button>
                <!-- modal button trigger -->
                <br>
                <label for="orderRadio" style="color:white; font-weight: bold; font-size: 150%">Order By</label><hr>
                <input type="radio" id="orderRadio" value="Item Name"> 
                <p style="display: inline; color: white">Item name</p><br><br>
                <label style="color:white; font-weight: bold; font-size: 150%">Sort By</label><hr>

            <label for="itemType" style="color: white">Item Type:</label></br>
                <select name="itemType" id="itemType">
                    <option value="none">None</option>
                    <option value="pencilCase">Pencil case</option>
                    <option value="sticker">Sticker</option>
                    <option value="planner">Planner</option>
                    <option value="calendar">Calendar</option>
                    <option value="bookmark">Book Mark</option>
                    <option value="cards">Cards</option>
                </select></br>

            <label for="itemTheme" style="color: white">Item Theme:</label></br>
                <select name="itemTheme" id="itemTheme">
                    <option value="None">None</option>
                    <option value="winter">Winter</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                    <option value="fall">Fall</option>
                    <option value="xmas">Christmas</option>
                    <option value="halloween">Halloween</option>
                </select>
    </fieldset>
    </div>
    </div>
    <!-- filter -->
        
    </div>
<!-- Content Here -->
</body>
</html>