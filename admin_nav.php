<?php
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
<link rel="stylesheet" type="text/css" href="admin_nav.css" media="screen" />

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Samuel Rasoori Photography</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <?php if($_SESSION["username"]) {?>
        <a class="nav-link" href="" id="logout">Sign Out</a>
      </ul>
    </li>
      <!-- <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">
            <span data-feather="users"></span>
          Account
        </a>
        </li>
      </ul> -->
    <? } else {?>
    <? } ?>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">

      <div class="sidebar-sticky">
        <ul class="collapsible nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="admin.php">
              <span data-feather="settings"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="landing_page_edit.php">
              <span data-feather="monitor"></span>
              Landing
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home_edit.php">
              <span data-feather="home"></span>
              Homepage
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery_edit.php">
              <span data-feather="image"></span>
              Gallery
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inquiries.php">
              <span data-feather="bar-chart-2"></span>
              Inquiries
              <!-- <span class="badge" > 17 </span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_account.php">
                <span data-feather="users"></span>
              Account
            </a>
          </li>
        </ul>
      </div>
    </nav>
</div>
</div>
<script>
$('.collapsible').collapsible();
</script>
<script>
$('#logout').click(function(){
     var action = "logout";
     $.ajax({
          url:"home.php",
          method:"POST",
          data:{action:action},
          success:function()
          {
               location.reload();
          }
     });
});
</script>
