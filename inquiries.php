<?php session_start();
include('connect.php');
if($_SESSION["username"]){
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('connect.php');?>
        <?php include('nav1.php'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Event</th>
      <th scope="col">Email Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Dates</th>
      <th scope="col">Message</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
    <?php
  $query = $con->query("SELECT * FROM quote ORDER BY quote_id DESC");
  $rowcount=$query->num_rows;
    if ($rowcount>0) {
        $i=0;
        while ($result = $query->fetch_assoc()) {
            if ($i++ % 1 == 0) echo "<tr>";
    ?>
    <td><?php echo $result["quote_id"]; ?></td>
    <td><?php echo $result["name"]; ?></td>
    <td><?php echo $result["event"]; ?></td>
    <td><?php echo $result["email"]; ?></td>
    <td><?php echo $result["phone"]; ?></td>
    <td><?php echo $result["dates"]; ?></td>
    <td><?php echo $result["message"]; ?></td>
    <?php
    $quote_id = $result["quote_id"];
    $check = $con->query("SELECT * FROM quote WHERE view = 1 AND quote_id ='$quote_id' ");
    if($check->num_rows>0){ ?>
        <td><button  type="button" id ="<?php echo $result["quote_id"]; ?>" class="btn btn-danger btn-xs Revert">Revert</button></td>
<? } else {  ?>
    <td><button type="button" id ="<?php echo $result["quote_id"]; ?>" class="btn btn-success btn-xs Check">Mark As Read</button></td>
<? } ?>
    <?php
            if ($i % 1 == 0) echo "</tr>";
        }  }
    ?>

</table>
</div>
</div>
</main>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<!-- <script>
$('.Check').click(function(){
    var inquiryid = ($(this).attr('id'));
    $.ajax({
      url:"inquiries_action.php",
      method:"POST",
      data:{inquiryid:inquiryid},
      success:function(data){
        if(data == "yes"){
        $('#Uncheck').show();
        $('#Check').hide();

      }
      else{
        $('#Uncheck').hide();
      }
    }
    });
});
</script>
<script>
$('.Uncheck').click(function(){
    var inquirydelid = ($(this).attr('id'));
    $.ajax({
      url:"inquiries_delete_action.php",
      method:"POST",
      data:{inquirydelid:inquirydelid},
      success:function(data){
        if(data == "yes"){
        $('#Uncheck').hide();
        $('#Check').show();

      }
      else{
        $('#Uncheck').show();
      }
    }
    });
});
</script> -->
<script>
  $('.Check').click(function(){
    $ths = $(this);
    var inquiryid = ($(this).attr('id'));
    $.ajax({
      type: "POST",
      url: "inquiries_action.php",
      data:{inquiryid:inquiryid},
      success: function(data) {
        if(data == "yes"){
        $ths.html("Revert");
        $ths.toggleClass("btn btn-success btn-xs Check btn btn-danger btn-xs Revert");
      }
    }
  });
});
  </script>
  <script>
  $('.Revert').click(function(){
    $ths = $(this);
    var inquirydelid = ($(this).attr('id'));
    $.ajax({
      type: "POST",
      url: "inquiries_delete_action.php",
      data:{inquirydelid:inquirydelid},
      success: function(data) {
          if(data == "yes"){
          location.reload(true);
        $ths.html("Mark As Read");
        $ths.toggleClass("btn btn-danger btn-xs Revert btn btn-success Check");
      }
    }
  });
  });
</script>
</div>
<? } else { ?>
  <script>
  window.location.href="home.php";
  </script>
<? } ?>
