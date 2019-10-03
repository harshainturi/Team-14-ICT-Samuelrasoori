<head>
  <title>Get a Quote</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!------ Include the above in your HEAD tag ---------->
<style>
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:0.5rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 10rem;
    width: 11%;
    margin-top: -50px;
    transform: rotate(30deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: black;

}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: Black;
    background-color: Grey;
    border: none;
    cursor: pointer;
}
</style>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    minDate: moment(),
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

<?php include("navbar.php"); ?>
<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.flaticon.com/icons/svg/1187/1187584.svg" alt=""/>
            </div>
            <form id="quote" name="quote" method="post" action="enquiry.php">
                <h3>Get a Quote</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="name" type="text" name="name" class="form-control" placeholder="Your Name *" value="" required />
                        </div>
												<div class="form-group">
													<select class="form-control" name="event">
														   	<option  selected="true" value="empty" disabled>Event Type</option>
																<option value="Wedding">Wedding</option>
																<option value="Reception">Reception</option>
																<option value="Theme">Theme related</option>
																<option value="Other">Other</option>

													</select>
                        </div>
                        <div class="form-group">
                            <input id="email" type="text" name="email" class="form-control" placeholder="Your Email *" value="" required />
                        </div>
                        <div class="form-group">
                            <input id="phone" type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" required />
                        </div>
												<div class="form-group" >
												<input type="text" class="form-control" name="daterange" />
											</div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <script>
            $(document).on('keypress', '#name', function (event) {
                var regex = new RegExp("^[a-zA-Z ]+$");
                var name = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(name)) {
                    event.preventDefault();
                    alert('Please Use Alphabets in Your Name');
                    return false;
                }
            });

                </script>
                <script>
                $("#email").change(function(){
                  var email = document.getElementById("email").value;
                  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                  if (!expr.test(email)) {
                        alert('Invalid Email');
                        document.getElementById("email").focus();
                        document.getElementById('email').value='';
                        return false;
                    }
                });
                </script>
                <script>
                $("#phone").change(function(){
                  var phone = document.getElementById("phone").value;
                  var phoneexp = /^[0-9]+$/;
                  if (!phoneexp.test(phone)) {
                        alert('Invalid Phone Number');
                        document.getElementById('phone').value='';
                        document.getElementById("phone").focus();
                        return false;
                    }
                });
                </script>

                <script>
                $(document).on('keypress', '#message', function (event) {
                    var msg = /^[a-zA-Z0-9,.!? ]*$/;
                    var message = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                    if (!msg.test(message)) {
                        event.preventDefault();
                        alert('No Special Characters allowed');
                        return false;
                    }
                });
                </script>
</div>
