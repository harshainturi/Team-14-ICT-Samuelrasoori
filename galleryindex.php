<?php session_start();
if($_SESSION["username"]){
?>
<?php include('nav1.php'); ?>
<?php
include_once './gallery/galleryClass.php';
$galleryClass=new galleryClass();
$albumList=$galleryClass->listAlbum();
$classfoid = new galleryClass();
$albumId=$classfoid->listAlbum();
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div id="intro">
      <?php include_once './inc/navbar.php'; ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Albums</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
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
        <div class="card">
        <img class="card-img-top" src="galleryImage/'.$img.'">
        <h3>
        <a href="gallery_edit_album.php?id='.$value["AlbumId"].'">'.$value["AlbumName"].'</a>
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
</main>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
