<?php

include('connect.php');
if(isset($_POST["id"])){
$image_id = $_POST["id"];
 $imageName = $_POST["image_name"];
// $sel = $con->query("SELECT AlbumId FROM gallery WHERE ID ='$image_id' ");
// $album = $sel['AlbumID'];

 $file_path = 'galleryImage/' . $_POST["image_name"];
  if(unlink($file_path))
 {
   $query = $con->query("DELETE FROM gallery WHERE ID = '$image_id'");
 }

}
?>
