<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
.gallery {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
-webkit-column-width: 33%;
-moz-column-width: 33%;
column-width: 33%; }
.gallery .pics {
-webkit-transition: all 350ms ease;
transition: all 350ms ease; }
.gallery .animation {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1); }

@media (max-width: 450px) {
.gallery {
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
-webkit-column-width: 100%;
-moz-column-width: 100%;
column-width: 100%;
}
}

@media (max-width: 400px) {
.btn.filter {
padding-left: 1.1rem;
padding-right: 1.1rem;
}
}
</style>
<?php include('nav.php'); ?>
<div class="row">

</div>

<div class="gallery" id="gallery">


  <div class="memories 2">
    <img class="img-fluid" src="images/slide_D8A0543.jpg" alt="Card image cap">
  </div>

  <div class="memories 1">
    <img class="img-fluid" src="images/slide_D8A2384.jpg" alt="Card image cap">
  </div>

  <div class="memories 1">
    <img class="img-fluid" src="images/slide_D8A1966.jpg" alt="Card image cap">
  </div>

  <div class="memories 2">
    <img class="img-fluid" src="images/slide_D8A2392.jpg" alt="Card image cap">
  </div>

  <div class="memories 2">
    <img class="img-fluid" src="images/slide_D8A7152.jpg" alt="Card image cap">
  </div>

  <div class="memories 1">
    <img class="img-fluid" src="images/slide_D8A8485.jpg" alt="Card image cap">
  </div>

</div>
<?php include('footer.php'); ?>
