<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
</head>
<?php include('connect.php'); ?>
<?php include("navbar.php"); ?>

<script>
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            $('.filter').show();
        }
        else
        {
            $(".filter").not('.'+value).hide();
            $('.filter').filter('.'+value).show();
        }
    });
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

<div align="center">
  <button class="btn btn-default filter-button" data-filter="all">All</button>
             <button class="btn btn-default filter-button" data-filter="wedding">Wedding</button>
             <button class="btn btn-default filter-button" data-filter="travel">Travel</button>
             <div>
             </div>

<div id="gridview">
<?php
             $query = $con->query("SELECT image FROM collections");

             if($query->num_rows > 0){
                 while($row = $query->fetch_assoc()){
                   $image = $row['image'];
                   $image_src = "collections/".$image;
             ?>

           <div class="image filter wedding">
              <img src="<?php echo $image_src; ?>" alt="" />
           </div>
             <?php }
             } ?>
</div>


<div id="gridview">
  <?php
             $query = $con->query("SELECT * FROM travel");

             if($query->num_rows > 0){
                 while($row = $query->fetch_assoc()){
                   $image = $row['image'];
                   $image_src = "travel/".$image;
             ?>
           <div class="image filter travel">
              <img src="<?php echo $image_src; ?>" alt="" />
           </div>
             <?php }
             } ?>
</div>
