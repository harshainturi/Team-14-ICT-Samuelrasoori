<?php

$host = "localhost";
$user = "ictatjcu_ps";
$password = "123zxc";
$dbname = "ictatjcu_ps";

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['upload'])){

  $name = $_FILES['file']['name'];
$target_dir = "collections/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
if( in_array($imageFileType,$extensions_arr) ){

   // Insert record
   $query = "insert into collections(image) values('".$name."')";
   mysqli_query($con,$query);

   // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

}

}
?>

<form method="post" action="" enctype='multipart/form-data'>
<input type='file' name='file' />
<input type='submit' value='Save image' name='upload'>
</form>

<?php

 $sql = "select image from images where id=1";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

 $image_src2 = $row['image'];

?>
<img src='<?php echo $image_src2; ?>' >
