<?php
 session_start();
 include('connect.php');
 if($_POST["username"])
 {
   $id = $con->real_escape_string($_POST["id"]);
	 $email = $con->real_escape_string($_POST["username"]);
	 $firstname = $con->real_escape_string($_POST["firstname"]);
   $lastname = $con->real_escape_string($_POST["lastname"]);
   $contact = $con->real_escape_string($_POST["contact"]);
   $query = $con->query("UPDATE users SET  fname ='$firstname',lname = '$lastname',email='$email',cnumber='$contact'
   WHERE user_id = '$id'");
   $check = mysql_affected_rows();
    	if ($check) {
           echo 'Yes';
      }
      else
      {
           echo 'No';
      }
 }
 ?>
