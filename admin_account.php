<?php session_start();
include('connect.php');
if($_SESSION["username"]){
  $e =$_SESSION["username"]
?>
<html lang="en">
  <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

<style>
body,html {
    height: 100%;
}
</style>

<body>
  <?php include('nav1.php'); ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Account Update </h3>
  </div>
</main>

<?php
$data1 = $con->query("SELECT * FROM users WHERE email = '$e'");
if ($data1->num_rows > 0) {
  $row1 = $data1->fetch_assoc();
  $firstname = $row1["fname"];
  $lastname = $row1["lname"];
  $contact = $row1["cnumber"];
  $email = $row1["email"];
  $id = $row1["user_id"];
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div id="intro">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<div class="container">
<div class="container-fluid h-100">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="form-group">
          <span>First Name: </span>
            <input _ngcontent-c0="" class="form-control form-control-lg" id="firstname" placeholder="firstname" value="<?php echo $firstname; ?>"type="text">
        </div>
        <div class="form-group">
        <span>Last Name: </span>
            <input _ngcontent-c0="" class="form-control form-control-lg" id="lastname" placeholder="lastname" value="<?php echo $lastname; ?>"type="text">
        </div>
        <div class="form-group">
          <span>Contact: </span>
            <input _ngcontent-c0="" class="form-control form-control-lg" id="contact" placeholder="contact" value="<?php echo $contact; ?>" type="text">
        </div>
        <div class="form-group">
            <span>UserName: </span>
            <input _ngcontent-c0="" class="form-control form-control-lg" id="username" placeholder="username" value="<?php echo $email; ?>" type="text">
        </div>
        <div class="form-group">
            <input _ngcontent-c0="" class="form-control form-control-lg" id="id" placeholder="id" value="<?php echo $id; ?>" type="hidden">
        </div>
        <div class="form-group">
            <button class="btn btn-dark btn-lg btn-block" type="submit" id="update_button" >Update</button>
        </div>

      </div>
  </div>
</div>
</div>
</div>
</div>
<?php } ?>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<script>

$(document).ready(function(){
     $('#update_button').click(function(){
          var firstname = $('#firstname').val();
          var lastname = $('#lastname').val();
          var username = $('#username').val();
          var contact = $('#contact').val();
          var id = $('#id').val();
               $.ajax({
                    url:"admin_account_action.php",
                    method:"POST",
                    data: {
                      id:id,
                      firstname:firstname,
                      lastname:lastname,
                      username:username,
                      contact:contact
                    },
                    success:function(data)
                    {
                         //alert(data);
                         if(data == 'yes')
                         {
                              alert("Update Successful!");
                         }
                         else
                         {
                             // $('#loginModal').hide();
                            alert("Update UnSuccessful!");
                         }
                    }
               });
     });
     $('#logout').click(function(){
          var action = "logout";
          $.ajax({
               url:"admin_login_action.php",
               method:"POST",
               data:{action:action},
               success:function()
               {
                    location.reload();
               }
          });
     });
});
</script>
<script>
<?php include('admin_account.js'); ?>
</script>
</div>
<? } else { ?>
  <script>
  window.location.href="admin_login.php";
  </script>
<? } ?>
