<?php
include('connect.php');
if(isset($_POST["inquiryid"])){
$id = $con->real_escape_string($_POST["inquiryid"]);

$query = $con->query("UPDATE quote SET view = 1 WHERE quote_id = '$id'");
$query1 = $con->query("SELECT * FROM quote WHERE quote_id = '$id' AND view = 1 ");
if($query1->num_rows >0){
  echo "yes";
}
else{
  echo "no";
}
}
?>
