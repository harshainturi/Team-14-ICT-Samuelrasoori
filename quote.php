<head>
  <title>Get a Quote</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="quote.css" media="screen" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


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
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="name" type="text" name="name" class="form-control" placeholder="Your Name *" value="" required />
                        </div>
												<div class="form-group">
													<select class="form-control" name="event" required>
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
                          <div class="form-inline">
                              <div class="form-group">
                            <select class ="form-control" id="con" name="countries">
                              <option selected="true" disabled="disabled">Country</option>
                                <option value="+61">🇦🇺&emsp;Australia</option>
                                <option value="+91">🇮🇳&emsp;India</option>
                            </select>
                          </div>
                              <div class="form-group">
                              <input id="phone" type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" required />
                            </div>
                          </div>
                        </div>
												<div class="form-group" >
												<input type="text" class="form-control" name="daterange" />
											</div>
                      <div class="form-group">
                          <textarea id="message" name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                      </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnContact" value="Send" />
                        </div>
                    </div>
                </div>
            </form>

            <script>
            <?php include('quote.js'); ?>
            </script>
</div>
<hr>
<?php include('footer.php'); ?>
