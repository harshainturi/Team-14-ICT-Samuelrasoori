<!DOCTYPE html>
<html lang="en">
<head>
  <title>Samuel Rasoori Photography</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
</head>

<style>
.carousel {
    width: 100%;

}

/* Indicators list style */
.article-slide .carousel-indicators {
    bottom: 0;
    left: 0;
    margin-left: 5px;
    width: 100%;
}
/* Indicators list style */
.article-slide .carousel-indicators li {
    border: medium none;
    border-radius: 0;
    float: left;
    height: 54px;
    margin-bottom: 5px;
    margin-left: 0;
    margin-right: 5px !important;
    margin-top: 0;
    width: 100px;
}
/* Indicators images style */
.article-slide .carousel-indicators img {
    border: 2px solid #FFFFFF;
    float: left;
    height: 54px;
    left: 0;
    width: 100px;
}
/* Indicators active image style */
.article-slide .carousel-indicators .active img {
    border: 2px solid #428BCA;
    opacity: 0.7;
}
</style>
<style>
.span4 img {
    margin-right: 10px;
}
.span4 .img-left {
    float: left;
}
.span4 .img-right {
    float: right;
}
</style>
<script>
$('.carousel').carousel({
  interval: false
});
</script>
<body>
<?php include("navbar.php"); ?>

  <div class="carousel slide article-slide" id="article-photo-carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner cont-slider">

      <div class="item active">
        <img alt="" title=""  src="images/slide0D8A2737 copy.jpg">
      </div>
      <div class="item">
        <img alt="" title=""  src="images/slide_D8A2392.jpg">
      </div>
      <div class="item">
        <img alt="" title=""  src="images/slide231A4327.jpg">
      </div>
      <div class="item">
        <img alt="" title="" src="images/slide0D8A5639-2.jpg">
      </div>
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
        <img alt="" src="images/slide0D8A2737 copy.jpg">
      </li>
      <li class="" data-slide-to="1" data-target="#article-photo-carousel">
        <img alt="" src="images/slide_D8A2392.jpg">
      </li>
      <li class="" data-slide-to="2" data-target="#article-photo-carousel">
        <img alt="" src="images/slide231A4327.jpg">
      </li>
      <li class="" data-slide-to="3" data-target="#article-photo-carousel">
        <img alt="" src="images/slide0D8A5639-2.jpg">
      </li>
    </ol>
  </div>

  <div class="container">
  	<div class="row">
  		<h2>Some Title</h2>
  	</div>

  	<div class="block">

        <div class="jumbotron">
        <div class="row">
          <div class="span4">
            <img class="img-left" style="width:350px; height:250px;"src="images/slide0D8A2737 copy.jpg"/>
            <div class="content-heading"><h3>The Pre-Shoot &nbsp </h3></div>
            <p>Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
          </div>
        </div>
       </div>
       <br/>
         <div class="jumbotron">
        <div class="row">
          <div class="span4">
            <img class="img-right"style="width:350px; height:250px;" src="images/slide_RP_0983 .jpg"/>
            <div class="content-heading"><h3>The Ceremony &nbsp </h3></div>
            <p>Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
          </div>
        </div>
       </div>
       <div class="jumbotron">
       <div class="row">
         <div class="span4">
           <img class="img-left" style="width:350px; height:250px;"src="images/slide_D8A2123.jpg"/>
           <div class="content-heading"><h3>The Group Shots  &nbsp </h3></div>
           <p>Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
         </div>
      </div>
    </div>
      </div>

  </div>
<hr>
<style>

/* footer social icons */
ul.social-network {
  list-style: none;
  display: inline;
  margin-left: 0 !important;
  padding: 0;
}

ul.social-network li {
  display: inline;
  margin: 0 5px;
}
.social-network a.icoFacebook:hover {
  background-color: #3B5998;
}

.social-network a.icoLinkedin:hover {
  background-color: #007bb7;
}

.social-network a.icoFacebook:hover i,
.social-network a.icoLinkedin:hover i {
  color: #fff;
}

.social-network a.socialIcon:hover,
.socialHoverClass {
  color: #44BCDD;
}

.social-circle li a {
  display: inline-block;
  position: relative;
  margin: 0 auto 0 auto;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  text-align: center;
  width: 50px;
  height: 45px;
  font-size: 25px;
}

.social-circle li i {
  margin: 0;
  line-height: 30px;
  text-align: center;
}

.social-circle li a:hover i,
.triggeredHover {
  -moz-transform: rotate(360deg);
  -webkit-transform: rotate(360deg);
  -ms--transform: rotate(360deg);
  transform: rotate(360deg);
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

.social-circle i {
  color: #595959;
  -webkit-transition: all 0.8s;
  -moz-transition: all 0.8s;
  -o-transition: all 0.8s;
  -ms-transition: all 0.8s;
  transition: all 0.8s;
}

.social-network a {
  background-color: #F9F9F9;
}
</style>


  <footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
    <div class="container">
      <div class="row">
        	<div class="col-md-12">
        <div class="col-md-4 col-sm-6">
          <!--Column1-->
          <div class="footer-pad">
            <h4>Get in Touch</h4>
            <ul class="list-unstyled">
              <li><a href="quote.php">Send us an Enquiry</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="footer-pad">
            <h4>Samuel Rasoori Photography</h4>
            <ul class="list-unstyled">
              <li><a href="#">Recent Clicks</a></li>
            </ul>
          </div>
        </div>

      	<div class="col-md-4">
      		<h4>Follow Along</h4>
              <ul class="social-network social-circle">
               <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#" class="icoLinkedin" title="Instagram"><i class="fa fa-instagram"></i></a></li>
               <li><a href="#" class="icoLinkedin" title="Googleplus"><i class="fa fa-google-plus-official"></i></a></li>
              </ul>
  		</div>
      </div>
    </div>
  	<div class="row">
  		<div class="col-md-12 copy">
  			<p class="text-center">&copy; Copyright <?php echo date("Y");?> - Samuel Rasoori Photography.</p>
  		</div>
  	</div>


    </div>
    </div>
  </footer>

</body>
</html>
