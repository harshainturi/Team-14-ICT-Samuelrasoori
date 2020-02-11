<?php
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
<style>
body,html {
    height: 100%;
}

</style>
<?php
include('connect.php');
	if (isset($_GET["token"]) && isset($_GET["email"])) {
		$email = $con->real_escape_string($_GET["email"]);
		$token = $con->real_escape_string($_GET["token"]);

		$data = $con->query("SELECT user_id FROM users WHERE email='$email' AND token='$token' AND token <> '' AND expire > NOW()");
		if ($data->num_rows > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 15);

			$password = $str;

			$con->query("UPDATE users SET password = '$password', token = '' WHERE email='$email'");

 ?>
			<div class="container-fluid h-100">
				<div class="row justify-content-center align-items-center h-100">
					<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

						<div class="form-group">
							<!-- <span>Password:</span> -->
								<input _ngcontent-c0="" class="form-control form-control-lg" id="email" value="<?php echo $email; ?> " type="hidden" required>
						</div>
            <div class="form-group">
              <span>New Password:</span>
                <input class="form-control form-control-lg" placeholder="Password" id="newpassword" type="Password" required>
            </div>
            <div class="form-group">
          <span>Confirm Password:</span>
                <input class="form-control form-control-lg" placeholder="Password" id="confirmpassword" type="Password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-dark btn-lg btn-block" type="submit" id="reset_password" >Enter</button>
            </div>
						<!-- <div class="form-group">
								<button onclick="myFunction()" class="btn btn-dark btn-lg btn-block" id="reset_button" >Copy</button>
						</div> -->
					</div>
				</div>
			</div>
			<!-- <script>
				function myFunction() {
var copyText = document.getElementById("password");
copyText.select();
copyText.setSelectionRange(0, 99999); /*For mobile devices*/
document.execCommand("copy");
alert("Copied the text: " + copyText.value);
window.location.href="admin_login.php";
}
			</script> -->
      <script>
      $(document).ready(function(){
           $('#reset_password').click(function(){
                var newpassword = $('#newpassword').val();
                var confirmpassword = $('#confirmpassword').val();
                var email = $('#email').val();
                if((newpassword == confirmpassword) && newpassword!='' )
                {
                     $.ajax({
                          url:"new_password.php",
                          method:"POST",
                          data: {newpassword:newpassword, confirmpassword:confirmpassword, email:email },
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
                                     alert("Password Updated!");
                                   window.location.href="admin_login.php";
                               }
                          }
                     });
                }
                else
                {
                     alert(" Passwords Do Not Match!!");
                }
           });
         });
      </script>
		<? } else{
			echo "<script>alert('Your Token is Expired,Please Try Again'); window.location='admin_login.php'</script>";
		} } ?>
