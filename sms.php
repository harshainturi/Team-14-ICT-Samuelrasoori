<?php
$to = urlencode("61401489585");
$message = urlencode("Thank You For Your Inquiry! We will get back to You Shortly!");


$ch = curl_init("https://platform.clickatell.com/messages/http/send?apiKey=qENSdk3SR1GHfuTxHDwR2A==&to=$to&content=$message");

$resultmessage = curl_exec($ch);

//close connection
curl_close($ch);
?>
