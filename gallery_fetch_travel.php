<?php session_start();
if($_SESSION["username"]){
?>
  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />

<?php
include('connect.php');
$query = $con->query("SELECT * FROM travel");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $image = $row['image'];
      $image_src = "travel/".$image;
?>
<div class="image">
  <img src="<?php echo $image_src; ?>" alt="" />
  <button type="button" class="btn btn-danger btn-xs deleteimage" id="<?php echo $row["id"]; ?>" data-image_name="<?php echo $row["image"]; ?>">Delete</button>
</div>
<?php } }?>
<?php } else { ?>
  <script>
  window.location.href="admin_login.php";
  </script>
<? } ?>
