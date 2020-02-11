<?php
include('connect.php');
$result = $con->query("SELECT COUNT(*) count FROM quote WHERE view = 0 ORDER BY name DESC");
$span =  $result->fetch_assoc();
$count = $span['count'];
echo $count;
?>
