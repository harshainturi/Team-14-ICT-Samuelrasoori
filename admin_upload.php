<?php
//upload.php
include('connect.php');
if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  if(file_already_uploaded($file_name, $con))
  {
   $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
  }
  $location = 'collections/' . $file_name;
  if(move_uploaded_file($tmp_name, $location))
  {
    $query = "insert into collections(image) values('".$file_name."')";
    mysqli_query($con,$query);
  }
 }
}

function file_already_uploaded($file_name, $con)
{

 $query = "SELECT * FROM collections WHERE image = '".$file_name."'";
 mysqli_query($con,$query);
 if($query->num_row > 0)
 {
  return true;
 }
 else
 {
  return false;
 }
}

?>
