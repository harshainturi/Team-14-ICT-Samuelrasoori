<?php
$id = $_GET["id"];
include_once './gallery/galleryClass.php';
$galleryClass=new galleryClass();
$galleryList=$galleryClass->listGallery("where AlbumId='$id'");
?>
<?php session_start();
if($_SESSION["username"]){
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
<link rel="stylesheet" type="text/css" href="navbar-admin.css" media="screen" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
.navbar navbar-dark {
position: fixed;
    width: 100%;
    top: auto;
  }
</style>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Samuel Rasoori Photography</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <?php if($_SESSION["username"]) {?>
        <a class="nav-link" href="" id="logout">Sign Out</a>
      </ul>
    </li>
      <!-- <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">
            <span data-feather="users"></span>
          Account
        </a>
        </li>
      </ul> -->
    <? } else {?>
    <? } ?>
  </ul>
</nav>
<br>
<br>

    <div id="mySidenav" class="sidenav">
      <br>
      <br>

      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a class="nav-link active" href="admin.php">
          <span data-feather="settings"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>


        <a class="nav-link" href="landing_page_edit.php">
          <span data-feather="monitor"></span>
          Landing
        </a>


        <a class="nav-link" href="home_edit.php">
          <span data-feather="home"></span>
          Homepage
        </a>


        <a class="nav-link" href="addalbum.php">
          <span data-feather="image"></span>
          Gallery
        </a>


        <a class="nav-link" href="inquiries.php">
          <span data-feather="bar-chart-2"></span>
          Inquiries
          <span class="badge" ><div id="ink"></div></span>
        </a>

        <a class="nav-link" href="admin_account.php">
            <span data-feather="users"></span>
          Account
        </a>

    </div>

    <div id="main">
      <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Dashboard Menu</span>

    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
$("#main").click( function(e) {
    e.stopPropagation(); // this stops bubbling up to the body
});
$(document.body).click(function(){
  closeNav();
});
$('#logout').click(function(){
     var action = "logout";
     $.ajax({
          url:"admin_login_action.php",
          method:"POST",
          data:{action:action},
          success:function()
          {
               location.reload();
          }
     });
});
</script>
<script>
$(document).ready(function(){
  sendRequest();
  function sendRequest(){
      $.ajax({
        url: "inquiries_fetch.php",
        success:
          function(data){
           $('#ink').html(data);
        },
        complete: function() {
       setInterval(sendRequest, 9000);
     }
    });
  };
});
</script>


<style>
body {
padding: 30px 0px;
}
#main{
  overflow: auto;
}
</style>
<?php include('connect.php'); ?>

<hr>
  <?php include_once './inc/navbar.php'; ?>
<div id="main">
<div class="container">
    <?php
    if(count($galleryList)){
    foreach ($galleryList as $value) {
        echo '<div class="col-xs-6 col-sm-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
            <img src="galleryImage/'.$value["ImageName"].'" alt="..." class="img-thumbnail">
              <button type="button" class="btn btn-danger btn-xs delete" id="'.$value["ID"].'" data-image_name="'.$value["ImageName"].'">Delete</button>
        </a>

    </div>';
    }
  } else{
    ?>
    <h3>Images Not Uploaded!!</h3>
  <? } ?>
</div>
</div>
<script>
$(document).on('click', '.delete', function(){
 var id = $(this).attr("id");
 var image_name = $(this).data("image_name");
 if(confirm("Are you sure you want to remove this image?"))
 {
  $.ajax({
   url:"gallery_delete_album.php",
   method:"POST",
   data:{id:id, image_name:image_name},
   success:function(data)
   {
    alert("Image removed");
    location.reload();
   }
  });
 }
});
</script>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
