<?php session_start();
if($_SESSION["username"]){
?>
<?php include('connect.php'); ?>
<?php
if(isset($_POST["submit"])){
    $albumName=$_POST["albumName"];
    include_once './gallery/galleryClass.php';
    $galleryClass=new galleryClass();
    $galleryClass->addAlbum($albumName);
}
?>
  <?php include('nav1.php'); ?>
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div id="intro">
        <?php include_once './inc/navbar.php'; ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Add an Album</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>
<div class="col-md-6">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Album Name</label>
            <input type="text" name="albumName" id="albumName" value="" class="form-control">
        </div>
        <button id="submit" name="submit" type="Submit" class="btn btn-primary">Add Album</button>
    </form>
</div>
</div>
</main>
<?php } else { ?>
  <script>
  window.location.href="admin_login.php";
  </script>
<? } ?>
