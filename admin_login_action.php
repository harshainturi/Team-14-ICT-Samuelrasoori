<?php
 session_start();
 include('connect.php');
 if(isset($_POST["username"]))
 {
	 $email = $con->real_escape_string($_POST["username"]);
	 $password = md5($con->real_escape_string($_POST["password"]));
   $data = $con->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    	if ($data->num_rows > 0) {
        $row = $data->fetch_assoc();
          $_SESSION['username'] = $row['email'];
           echo 'Yes';
      }
      else
      {
           echo 'No';
      }
 }
 if(isset($_POST["action"]))
 {
      unset($_SESSION["username"]);

 }
 ?>
