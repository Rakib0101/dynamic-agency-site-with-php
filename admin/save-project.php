<?php
  include "config.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
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
    $target = "./admin/upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }
  $name= mysqli_real_escape_string($conn, $_POST['project_name']);
  $description = mysqli_real_escape_string($conn, $_POST['project_desc']);
  $category = mysqli_real_escape_string($conn, $_POST['project_cat']);
  $client = mysqli_real_escape_string($conn, $_POST['project_client']);
  $url = mysqli_real_escape_string($conn, $_POST['project_url']);
  $date = mysqli_real_escape_string($conn, $_POST['project_date']);

  $sql = "INSERT INTO projects(project_name, project_desc, project_cat, project_date, project_url, project_client, project_img)
          VALUES('{$name}','{$description}',{$category},'{$date}','{$url}', '{$client}','{$new_name}');";
  $sql .= "UPDATE portfolio_category SET projects = projects + 1 WHERE id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    
    header("location: {$hostname}/admin/add-project.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
