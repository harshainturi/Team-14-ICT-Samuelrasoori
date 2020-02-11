<?php session_start();
if($_SESSION["username"]){
?>
<link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
<?php
include('connect.php');
$query = $con->query("SELECT * FROM landing");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $id=$row['land_id'];
      $image = $row['land_image'];
      $image_src = "images/".$image;
?>
<div class="image">
  <img style = "width="100" height="100"" src="<?php echo $image_src; ?>" alt="" />
  <form onsubmit="$('#loading').show();" action="landing_page_update.php<?php echo '?image_id='.$id; ?>" method="post" enctype="multipart/form-data" >
    <span>Please Choose An Image</span>
    <input required type="file" name="image" style="margin-top:-115px;">
  <button type="submit" name="submit" class="btn btn-danger">Update</button>
  <div id="loading" style="display:none">Uploading...</div>
  </form>
</div>
<?php } }?>
<? } ?>
