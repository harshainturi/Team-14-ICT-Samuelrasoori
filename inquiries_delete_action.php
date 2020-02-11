<?php
include('connect.php');
if(isset($_POST["inquirydelid"])){
$id = $con->real_escape_string($_POST["inquirydelid"]);

$query = $con->query("UPDATE quote SET view = 0 WHERE quote_id = '$id'");
$query1 = $con->query("SELECT * FROM quote WHERE quote_id = '$id' AND view = 0 ");
if($query1->num_rows >0){
  echo "yes";
}
else{
  echo "no";
}
}
?>
