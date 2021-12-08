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
    
    <title>Your Items for Sale</title>
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
        <a style="color: #2fadfc;" href="/Item/add">Sell</a>
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
     <div class="container" style="margin-left: 7%;"> 
         <form action="/Item/search" method="POST">
                 <div style='display:inline-block; margin-top: 4%'><h1 style="display:inline;color:white; width: 30%; font-size: 400%">Your Items for Sale</h1>
                 </div>
                 <div style='display:inline-block; margin-left: 25%'><input type="search" class="form-control rounded" placeholder="Search" style="width: 150%; margin-left: 145%"/>
                 </div>
         </form>
     </div>


    <!-- Item View -->
    <div style='display:inline-block; height: 55%'>
        <div class="container insideColor" style="height: 40%; margin-left: 20%; margin-top: 5%; width: 400%; height: 145%">
            <section class="p-3" style="width: 85%;">

                <!-- modal button trigger -->
                <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" 
                        data-target="#modalCenter" style="margin-left: 97%; width: 20%; height: 7%; margin-top: 1.5%">Add new item</button>
                <!-- modal button trigger -->

                <div class="table-wrapper-scroll-y my-custom-scrollbar" style="width: 117%;margin-top: 0.5%">
                    <table class="table table-bordered table-striped table-dark"> 
                        <thead>
                            <tr>
                              <th scope="col">Item Image</th>
                              <th scope="col">Item Name</th>
                              <th scope="col">Item Description</th>
                              <th scope="col">Item Price</th>
                              <th scope="col">Posted Date</th>
                              <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($data['item'] as $result) {
                            echo " <tr> 
                                        <td >
                                            <img src='$result->item_pic' style='width:150px; height: 120px;'>
                                        </td>
                                        <td >$result->item_name</td>
                                        <td style='word-wrap:break-word'>$result->item_desc</td>
                                        <td >$result->item_price</td>
                                        <td >$result->posted_date</td>
                                        <td >
                                            <a href='/Item/edit/$result->item_id' class='btn btn-primary' style='width:100%;''>Edit</a>

                                            <a href='/Item/discard/$result->item_id' class='btn btn-danger' style='width:100%;''>Remove</a>
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

<!-- Modal Popup(Add New Item)-->

<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" 
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="margin-left: 40%">Add Item</h3>
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close" style="padding-left: 30%">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>

      <form action="/Item/insert" method="post"  enctype="multipart/form-data">
      <div class="modal-body">
        <center>
            <h4 style="margin-right: 38%">Item Image</h4>
                <input type="file" name="newPicture" class="inputModal" style="width: 60%">
            <h4 style="margin-right: 38%">Item Name</h4>
                <input type="text" name="item_name" class="inputModal" style="color: black; width: 60%">
            <h4 style="margin-right: 48%">Price</h4>
                <input type="number" name="item_price" class="inputModal" min="0" step=".01" style="color: black; width: 60%">
            <h4 style="margin-right: 70%">Item Description</h4>
                <textarea type="text" name="item_desc" class="inputModal" style="width: 100%; height: 100%; resize:none; color: black;"></textarea>
        </center>
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="action" class="btn btn-primary" value="Save"/>
        </center>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Popup(Add new Item) -->

<!-- Modal Popup(Edit Item)-->

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" 
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="margin-left: 40%">Edit Item</h3>
        <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close" style="padding-left: 30%">
          <span aria-hidden="true" style="color:white">&times;</span>
        </button>
      </div>

      <form action="/Item/edit($item->item_id)" method="post"  enctype="multipart/form-data">
      <div class="modal-body">
        <center>
            <h4 style="margin-right: 27%">Edit Image</h4>
                <img src='<?=$item->item_pic?>'>
            <h4 style="margin-right: 38%">Item Name</h4>
                <input type='text' name='item_name' class='inputModal' value='<?php echo $item['item_name']; ?>'>
            <h4 style="margin-right: 35%">Item Description</h4>
                <textarea type="text" name="item_desc" class="inputModal" style="width: 100%; height: 100%; resize:none;"><?php echo $data['item']->item_description; ?></textarea>
            <h4 style="margin-right: 18%">Price</h4>
                <input type="number" name="item_price" class="inputModal" min="0" step=".01">
        </center>
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="action" class="btn btn-primary" value="Save"/>
        </center>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Popup(Edit Item) -->
        
</div>
<!-- Content Here -->
</body>
</html>
