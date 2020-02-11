<?php session_start();
if($_SESSION["username"]){
?>
<?php include('connect.php'); ?>
<?php
include_once './gallery/galleryClass.php';
$galleryClass=new galleryClass();

if(isset($_POST["submit"])){
    $albumId = $_POST["AlbumId"];
    $getImage=  basename($_FILES["Image"]["name"]);
    if($getImage==""){
      echo '<script language="javascript">';
echo 'alert("Please choose an Image")';
echo '</script>';
    }
    else
    {
      $target="galleryImage/";
      $ran=time();
      $target=$target.$ran.$getImage;
      $imageName=$ran.$getImage;

      if($_FILES["Image"]["type"]=="image/jpg"||$_FILES["Image"]["type"]=="image/jpeg"){
          move_uploaded_file($_FILES["Image"]["tmp_name"], $target);
          if(move_uploaded_file){
              include_once './gallery/galleryClass.php';
              $galleryClass=new GalleryClass();
              $galleryClass->uploadGallery($imageName,$albumId);
          }
          else
          {
            echo '<script language="javascript">';
      echo 'alert("File is not uploaded")';
      echo '</script>';
          }
      }
      else
      {
        echo '<script language="javascript">';
  echo 'alert("Please choose Image")';
  echo '</script>';
      }
    }
}
$listAlbum=$galleryClass->listAlbum();
?>
<?php include('nav1.php'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div id="intro">
      <?php include_once './inc/navbar.php'; ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Upload Images</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
<div class="col-md-6">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Choose Album</label>
            <select id="AlbumId" name="AlbumId" class="form-control">
            <?php
              if(count($listAlbum)){
                  foreach ($listAlbum as $value) {
                      echo "<option value='$value[AlbumId]'>$value[AlbumName]</option>";
                  }
              }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label>Choose Image</label>
            <input type="file" name="Image" id="Image" value="" class="form-control">
        </div>
        <button id="submit" name="submit" type="Submit" class="btn btn-primary">Upload Image</button>
    </form>
</div>
</div>
</main>
<?php } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
