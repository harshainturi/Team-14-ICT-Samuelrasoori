<?php
include_once './gallery/galleryClass.php';
$galleryClass=new galleryClass();
$albumList=$galleryClass->listAlbum();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<style>
    body {
    padding: 30px 0px;
}
html,body{
  height:100%
}
#gridview {
   text-align:center;
}

div.image {
    margin: 10px;
    display: inline-block;
}

div.image img {
    width: 100%;
    height: auto;
    border: 1px solid #ccc;
}
div.image img:hover {
    box-shadow: 0 5px 5px 0 rgba(0,0,0,0.32), 0 0 0 0px rgba(0,0,0,0.16);
}
</style>
<?php include('navbar.php'); ?>
<hr>
<div id="gridview">
<div class="container">
  <?php
include('connect.php');
    if(count($albumList)){
      echo '<div class="row">';
    foreach ($albumList as $value) {
      $aid = $value["AlbumId"];
      $sel = $con->query("SELECT * FROM gallery WHERE AlbumId= $aid ORDER BY RAND() LIMIT 1");
      $ran = $sel->fetch_assoc();
      $img = $ran["ImageName"];
        echo '<div class="col-lg-4 col-xs-6 col-sm-3">
        <div class="image">
        <img class="image" src="galleryImage/'.$img.'">
        <h3>
        <a href="view_gallery.php?id='.$value["AlbumId"].'">'.$value["AlbumName"].'</a>
        </h3>
        </div>
        </div>
      ';
    }
    echo '
    </div>';
    }
    ?>
</div>
</div>
<br><br><br><br><br><br>
<hr>
<?php include('footer.php'); ?>
