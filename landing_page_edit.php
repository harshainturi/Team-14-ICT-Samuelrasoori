<?php session_start();
if($_SESSION["username"]){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Landing Page Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
</head>

<?php include('connect.php'); ?>
  <?php include('nav1.php'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h3>Change The Landing Page Image</h3>
  </div>
</main>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <div id="loading" style="display:none">Uploading...</div>
    <div id ="landingpage">
    </div>
  </div>
</main>


<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"landing_page_fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#landingpage').html(data);
   }
  });
 }
 });
</script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
