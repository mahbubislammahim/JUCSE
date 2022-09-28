<?php
  include "config.php";

  $image_id = $_GET['id'];

  $query1 = "SELECT * FROM gallery WHERE imageid = {$image_id}";
  $result = mysqli_query($connection, $query1) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload/".$row['image_url']);


  $query = "DELETE FROM gallery WHERE imageid = {$image_id};";

  if(mysqli_multi_query($connection, $query)){
    header("location: ../admin/gallery.php");
  }else{
    echo "Query Failed";
  }
?>
