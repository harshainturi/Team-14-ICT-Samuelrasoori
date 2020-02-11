<?php
session_start(); ?>
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

    <div class="row justify-content-center align-items-center h-100">
    <h2>Samuel Rasoori Photography</h2>
    <span><a href="#go">Administartor Login</a></span>
  </div>

<button class="btn btn-dark btn-lg btn-block" type="submit" id="home" >Go Back</button>
      <div id="go" class="container">
        <div class="container-fluid h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

              <div class="form-group">
                  <input _ngcontent-c0="" class="form-control form-control-lg" id="username" placeholder="Username" type="text" required>
              </div>
              <div class="form-group">
                  <input class="form-control form-control-lg" placeholder="Password" id="password" type="Password" required>
              </div>
              <div class="form-group">
                  <button class="btn btn-dark btn-lg btn-block" type="submit" id="login_button" >Enter</button>
              </div>
              <div class="form-group">
                  <span><a href="#forgot">Forgot Password?</a></span>
              </div>

            </div>
        </div>
      </div>
    </div>
    <div id="forgot" class="container">
      <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <div class="form-group">
          <span>Enter Your UserName:</span>
          <input _ngcontent-c0="" class="form-control form-control-lg" id="forgotusr" placeholder="Username" type="text" required>
      </div>
      <div class="form-group">
          <button class="btn btn-dark btn-lg btn-block" type="submit" id="reset_button" >Reset</button>
              <span><a href="#go">Cancel</a></span>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid h-100">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <h4>Please Check Your E-mail, Alternatively Paste The Link In the Browser</h4>
      <a id = "link"></a>
</div>
</div>
</div>
</div>
</body>
<script>
$(document).ready(fuction(){
  $('#link').click(function(){
    var link = $('#link').val();
    window.loction.href=link;
  });
});
</script>
<script>
$("a[href^='#']").click(function(e) {
	e.preventDefault();

	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});
$(document).ready(function(){
     $('#login_button').click(function(){
          var username = $('#username').val();
          var password = $('#password').val();
          if(username != '' && password != '')
          {
               $.ajax({
                    url:"admin_login_action.php",
                    method:"POST",
                    data: {username:username, password:password},
                    success:function(data)
                    {
                         //alert(data);
                         if(data == 'No')
                         {
                              alert("Please Check Your Inputs");
                         }
                         else
                         {
                             // $('#loginModal').hide();
                             window.location.href="admin.php";
                         }
                    }
               });
          }
          else
          {
               alert("Username and Password Required!");
          }
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
$(document).ready(function(){
     $('#reset_button').click(function(){
          var usernameforgot = $('#forgotusr').val();
          if(usernameforgot != '')
          {
               $.ajax({
                    url:"forgot_password_action.php",
                    method:"POST",
                    data: {usernameforgot:usernameforgot},
                    success:function(data)
                    {
                         $("#link").html(data);
                         $("html,body").animate({
         scrollTop: $("#link").offset().top
 }, 2000, function(){
         //scroll complete function
 });


                    }
               });
          }
          else
          {
               alert("Username and Password Required!");
          }
     });
   });
   $(document).ready(function(){
        $('#home').click(function(){
          window.location.href="home.php";
        });
      });
     </script>
