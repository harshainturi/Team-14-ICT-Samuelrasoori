<?php
 session_start();
 include('connect.php');
 if(isset($_POST["username"]))
 {
   ;
   $data = $con->query("SELECT * FROM users
      WHERE email = '".$_POST["username"]."'
      AND password = '".$_POST["password"]."'
      ");
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
