<?php session_start();
if($_SESSION["username"]){
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Administration Panel</title>
  </head>

  <body>
  <?php include('nav1.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div id="intro">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Hello, Samuel Rasoori</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
                <div class="card-header">
                  <h4 class="text-center">  Manage the content of the website through this pane., Let's get clicking ! </h4>
                  </div>
                  <div class="card text-center">
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Landing Page</h5>
                          <p class="card-text">Do you want to change the Landing Page Image?</p>
                          <a href="landing_page_edit.php" class="btn btn-primary">Click Here</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Gallery</h5>
                          <p class="card-text">Add new images or delete images from the website gallery.</p>
                          <a href="galleryindex.php" class="btn btn-primary">Let's handle that</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>

                  <div class="card text-center">
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Home Page</h5>
                          <p class="card-text">Do you want to Update the Homepage Page Images?</p>
                          <a href="home_edit.php" class="btn btn-primary">Let's get to it</a>
                          <!--  <button type="button" class="btn btn-danger btn-xs homepage">Let's get to it</button> -->
                        </div>
                        </div>
                      </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Inquiries</h5>
                          <p class="card-text">View the enquiries,booking requests made by the users through the website</p>
                          <a href="inquiries.php" class="btn btn-primary">View</a>
                        <!--  <button type="button" class="btn btn-danger btn-xs inquiries">View</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="card-footer text-muted">
                    </div>
                  </div>
                </div>
        </main>
      </div>

        <script>
        $(document).on('click', '.homepage', function(){
         load_image_data();
         function load_image_data()
         {
          $.ajax({
           url:"home_fetch.php",
           method:"POST",
           success:function(data)
           {
            $('#intro').html(data);
           }
          });
         }
         });
         $(document).on('click', '.inquiries', function(){
          load_image_data();
          function load_image_data()
          {
           $.ajax({
            url:"inquiries.php",
            method:"POST",
            success:function(data)
            {
             $('#intro').html(data);
            }
           });
          }
          });
         </script>



        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
          feather.replace()
        </script>
<!--
More to come ;)
-->
  </body>
</html>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
