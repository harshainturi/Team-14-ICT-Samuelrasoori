<?php session_start();
if($_SESSION["username"]){
?>
<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gallery</title>
  <meta charset="utf-8">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
  <link rel="stylesheet" type="text/css" href="navbar-admin.css" media="screen" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
</head>
<!-- <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Samuel Rasoori Photography</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <?php if($_SESSION["username"]) {?>
        <a class="nav-link" href="" id="logout">Sign Out</a>
      </ul>
    </li>
    <? } else {?>
    <? } ?>
  </ul>
</nav>
<br>
<br>
    <div id="mySidenav" class="sidenav">
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


        <a class="nav-link" href="gallery_edit.php">
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

    </div> -->
    <div id="main">
      <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Dashboard Menu</span>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Upload Images</h1>

    <div align="right">
     <input type="file" name="multiple_images" id="multiple_images" multiple />
     <span class="text-muted">Only .jpg, png, .gif file allowed</span>
     <span id="error_multiple_images"></span>
    </div>
</div>
</main>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <div id ="gallery">
    </div>
  </div>
</main>
</div>
<!-- <script>
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
</script> -->

<script>
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
   setInterval(sendRequest, 2000);
 }
});
};
});
</script>

<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"gallery_fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#gallery').html(data);
   }
  });
 }
 $('#multiple_images').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_images')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_images").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var imagecheck = new FileReader();
    imagecheck.readAsDataURL(document.getElementById("multiple_images").files[i]);
     form_data.append("file[]", document.getElementById('multiple_images').files[i]);
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"admin_upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_images').html('<br /><label class="text-primary">Please Wait,Uploading...</label>');
    },
    success:function(data)
    {
     $('#error_multiple_images').html('<br /><label class="text-success">Uploaded</label>');
     $( "#multiple_images" ).val("")
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_images').val('');
   $('#error_multiple_images').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove this image?"))
  {
   $.ajax({
    url:"gallery_delete.php",
    method:"POST",
    data:{id:id, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     alert("Image removed");
    }
   });
  }
 });
});
</script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<?php } else { ?>
  <script>
  window.location.href="admin_login.php";
  </script>
<? } ?>
