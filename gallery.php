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
</head>
<?php include("navbar.php"); ?>
<style>
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


#grid{
    margin-bottom:30px;
}

/* Responsive Styles */

@media screen and (min-width: 1224px) {
    div.image {
        width: 300px;
    }
}

@media screen and (min-width: 1044px) and (max-width: 1224px) {
    div.image {
        width: 250px;
    }
}

@media screen and (min-width: 845px) and (max-width: 1044px) {
    div.image {
        width: 200px;
    }
}
</style>

<div id="gridview">
    <?php
    $host = "localhost";
    $user = "ictatjcu_ps";
    $password = "123zxc";
    $dbname = "ictatjcu_ps";

    $con = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }


    // Retrieve images from the database
    $query = $con->query("SELECT image FROM collections");

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
          $image = $row['image'];
          $image_src = "collections/".$image;
    ?>
  <div class="image">
			<img src="<?php echo $image_src; ?>" alt="" />
  </div>
    <?php }
    } ?>
</div>
