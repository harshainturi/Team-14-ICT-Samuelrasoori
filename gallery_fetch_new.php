<?php session_start();
if($_SESSION["username"]){
?>
  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
<?php
include('connect.php');
$query = $con->query("SELECT * FROM gallery");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $image = $row['image'];
      $image_src = "galleryImage/".$image;
} }?>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
