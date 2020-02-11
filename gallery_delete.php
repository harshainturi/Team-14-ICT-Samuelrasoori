<?php
//delete.php

include('connect.php');

if(isset($_POST["id"]))
$image_id = $_POST["id"];

{
 $file_path = 'collections/' . $_POST["image_name"];
 if(unlink($file_path))
 {
   $query = $con->query("DELETE FROM collections WHERE id =".$image_id);
 }
}

?>
