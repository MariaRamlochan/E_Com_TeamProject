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
    
    <title>Settings</title>
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
        <a href="/Message/index">Messages</a>
        <hr class="admin-hr">
        <a href="/Item/past">Past Post</a>
        <hr class="admin-hr">
    </div>
    </center>

    <div class="text-center setting-logout-position-admin">
        <a style="color: #2fadfc;" href="/Profile/settings">Settings</a>
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

    <!-- Title -->
    <div class="container" style="margin-left: 10%"> 
        <center>
        <div style='display:inline-block; margin-top: 4%'><h1 style="display:inline;color:white; width: 50%; font-size: 400%">
        Settings</h1></div>
        </center>
    </div>

    <!-- Item View -->
        <center>
            <div class="container">
                <div class="container p-5 insideColor" style="margin-right: 30%; width: 50%; height: 67%; margin-top: 5%">

                    <br>
                    <a class="btn btn-lg btn-danger" href="/Profile/edit/<?=$_SESSION['user_id']?>" 
                            style="width: 80%; border-radius: 15px; height: 12%">Edit Profile</a>
                    <br><hr>
                    <a class="btn btn-lg btn-danger" href="/Address/edit/<?=$_SESSION['address_id']?>" style="width: 80%; border-radius: 15px; height: 12%">Edit Address</a>
                    <br><hr>
                    <a class="btn btn-lg btn-danger" href="/Main/changePassword" 
                            style="width: 80%; border-radius: 15px; height: 12%">Change Password</a>
                    <br><hr>
                    <a class="btn btn-lg btn-danger" href="/Main/setup2fa" 
                            style="width: 80%; border-radius: 15px; height: 12%">Setup 2FA</a>
                    <br><hr>
                    <a class="btn btn-lg btn-danger" href="/User/delete/<?=$_SESSION['address_id']?>" 
                            style="width: 80%; border-radius: 15px; height: 12%">Delete Account</a>

                    <br><hr>
                    <!-- modal button trigger -->
                    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" 
                        data-target="#modalCenter" style="width: 80%; border-radius: 15px; height: 12%">Delete</button>
                    <!-- modal button trigger -->

                </div>
            </div>
        </center>


        <!-- Modal Popup(Add New Item)-->

        <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" 
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" style="margin-left: 40%">Delete Account?</h3>
                <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close" style="padding-left: 30%">
                  <span aria-hidden="true" style="color:white">&times;</span>
                </button>
              </div>

              <form action="/Profile/delete/<?=$_SESSION['user_id']?>" method="post">
              <div class="modal-body">
                <center>
                    <h4 style="margin-right: 38%">Would you like to delete your account?</h4>
                </center>
              </div>
              <div class="modal-footer">
                <center>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <input type="submit" name="action" class="btn btn-primary" value="Yes"/>
                </center>
              </div>
              </form>

            </div>
          </div>
        </div>

        <!-- Modal Popup(Add new Item) -->
    </div>
<!-- Content Here -->
</body>
</html>
