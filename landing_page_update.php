<?php

require_once ('connect.php');

$get_id=$_REQUEST['image_id'];

move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
$location1=$_FILES["image"]["name"];

$new = $con->query("UPDATE landing SET land_image ='$location1' WHERE land_id = '$get_id' ");

echo "<script>alert('Successfully Updated!!!'); window.location='landing_page_edit.php'</script>";
?>
