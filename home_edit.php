<?php session_start();
if($_SESSION["username"]){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
</head>

<?php include('connect.php'); ?>
<?php include('nav1.php'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h3>Refresh Your Homepage Slideshow!</h3>
  </div>
</main>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <div id ="homepage">
    </div>
  </div>
  <div id="loading" style="display:none">Uploading...</div>
</main>



<!-- <script>
$(document).on('click', '.edit', function(){
 $('#image_id').val($(this).attr("id"));
 $('#action').val("update");
 $('#imageModal').modal("show");
 $.ajax({
  url:"edit.php",
  method:"POST",
  data:{image_id:image_id},
  success:function(data)
  {
   $('#homepage').html(data);
  }
 });
});
</script> -->
<!-- <script>
$(document).on('click', '.update', function(){
  var id = document.getElementsByName("identify");
   var files = $('#multiple_images')[0].files;
 if(confirm("Are you sure you want to Update this image?"))
 {
  $.ajax({
   url:"editpdo.php",
   method:"POST",
   data:{id:id, files:files},
   success:function(data)
   {
    load_image_data();
    alert("Image Updated");
   }
  });
 }
});
</script> -->
<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"home_fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#homepage').html(data);
   }
  });
 }
 });
</script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
</div>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
