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
<link rel="stylesheet" type="text/css" href="index.css" media="screen" />
</head>
<script>
$('.carousel').carousel({
  interval: false
});
</script>
<body>
<?php include("navbar.php"); ?>

<div class="carousel slide article-slide" id="article-photo-carousel">
  <div class="carousel-inner cont-slider">
  <?php
  include('connect.php');
  $query = $con->query("SELECT * FROM homepage");
  $rowcount=$query->num_rows;
  for($i=1;$i<=3;$i++)
  {
	  $row=$query->fetch_assoc();
    $image = $row['home_image'];
    $image_src = "images/".$image;
    if($i==1)
    {
      $image_one = $image_src;
    }
    if($i==2)
    {
      $image_two = $image_src;
    }
    if($i==3)
    {
      $image_three = $image_src;
    }
  ?>

  <?php
  if($i==1)
  {
  ?>
  <div class="item active">
    <img alt="" title=""  src="<?php echo $image_src; ?>">
  </div>
  <?php
  }
  else
  {
	?>
  <div class="item">
    <img alt="" title=""  src="<?php echo $image_src; ?>">
  </div>

  <?php
   }
 }
  ?>
  <a class="left carousel-control" data-slide="prev" href="#article-photo-carousel"><span class="icon-prev"></span></a>
  <a class="right carousel-control" data-slide="next" href="#article-photo-carousel"><span class="icon-next"></span></a>
  <ol class="carousel-indicators">
     <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
       <img alt="" src="<?php echo $image_one; ?>">
     </li>
     <li class="" data-slide-to="1" data-target="#article-photo-carousel">
       <img alt="" src="<?php echo $image_two; ?>">
     </li>
     <li class="" data-slide-to="2" data-target="#article-photo-carousel">
       <img alt="" src="<?php echo $image_three; ?>">
     </li>
   </ol>

</div>
</div>

<hr>
  <div class="container">
  	<div class="row">
  		<h2>Photography tips</h2>
  	</div>

    <section>
      <div class="grid-flex">
        <div> <img class="col col-image" src="images/slide0D8A2737 copy.jpg"/>
        </div>
        <div class="col col-text">
          <div class="text-item">
            <p>If your pictures aren't good enough, you're not close enough.;
            </p>
          </div>
        </div>
      </div>
<hr>
      <div class="grid-flex">
        <div> <img class="col col-image" src="images/slide_RP_0983 .jpg"/>
        </div>
        <div class="col col-text col-left">
          <div class="text-item">
            <p>Taking an image, freezing a moment, reveals how rich reality truly is.;
            </p>
          </div>
        </div>
      </div>
<hr>
      <div class="grid-flex">
        <div> <img class="col col-image" src="images/slide_D8A2123.jpg"/>
        </div>
        <div class="col col-text">
          <div class="text-item">
            <p>You don't take a photograph, you make it.;
            </p>
          </div>
        </div>
      </div>
    </section>

  </div>
  <hr>
<?php include('footer.php'); ?>
</body>
</html>
