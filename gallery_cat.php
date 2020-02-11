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
<style>
#gridview {
   text-align:center;
}

.filter-button
{
    font-size: 18px;
    border: 1px solid #4097c9;
    border-radius: 5px;
    text-align: center;
    color: #4097c9;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #4097c9;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #4097c9;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}


</style>
<script>
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show();
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
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
             $query = $con->query("SELECT * FROM landing");

             if($query->num_rows > 0){
                 while($row = $query->fetch_assoc()){
                   $image = $row['land_image'];
                   $image_src = "images/".$image;
             ?>
           <div class="image filter travel">
              <img src="<?php echo $image_src; ?>" alt="" />
           </div>
             <?php }
             } ?>
</div>
