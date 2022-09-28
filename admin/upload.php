<?php
  include "config.php";
  if(isset($_FILES['fileup'])){
    $errors = array();

    $file_name = $_FILES['fileup']['name'];
    $file_size = $_FILES['fileup']['size'];
    $file_tmp = $_FILES['fileup']['tmp_name'];
    $file_type = $_FILES['fileup']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  session_start();



  $sql = "INSERT INTO gallery(image_url)


          VALUES('{$new_name}');";


  if(mysqli_multi_query($connection, $sql)){
    header("location: gallery.php");
    
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }
