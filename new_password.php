<?php
 session_start();
 include('connect.php');
 if(isset($_POST["email"]))
 {
	 $password = md5($con->real_escape_string($_POST["newpassword"]));
	 	 $email = $con->real_escape_string($_POST["email"]);
   	$con->query("UPDATE users SET password = '$password' WHERE email='$email'");
           echo 'Yes';
      }
      else
      {
           echo 'No';
      }
 ?>
