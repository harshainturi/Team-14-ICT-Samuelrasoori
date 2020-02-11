<?php
$id = $_GET["id"];
include_once './gallery/galleryClass.php';
$galleryClass=new galleryClass();
$galleryList=$galleryClass->listGallery("where AlbumId='$id'");
?>
  <link rel="stylesheet" type="text/css" href="gallery.css" media="screen" />
<style>
    body {
    padding: 30px 0px;
}

#lightbox .modal-content {
    display: inline-block;
    text-align: center;
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    z-index:1032;
}
</style>
<?php include('nav1.php'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div id="intro">
      <?php include_once './inc/navbar.php'; ?>
<div class="image">
    <?php
    if(count($galleryList)){
    foreach ($galleryList as $value) {
        echo '<div class="col-xs-6 col-sm-3">
            <img src="galleryImage/'.$value["ImageName"].'" alt="...">
            <button type="button" class="btn btn-danger btn-xs deleteimage" id="'.$value["ID"].'" data-image_name="'.$value["ImageName"].'">Delete</button>
    </div>';
    }
    }
    ?>
</div>
</div>
</main>


<script>
$(document).on('click', '.deleteimage', function(){
 var id = $(this).attr("id");
 var image_name = $(this).data("image_name");
 if(confirm("Are you sure you want to remove this image?"))
 {
  $.ajax({
   url:"gallery_delete_album.php",
   method:"POST",
   data:{id:id, image_name:image_name},
   success:function(data)
   {
    load_image_data();
    alert("Image removed");
   }
  });
 }
});
</script>
