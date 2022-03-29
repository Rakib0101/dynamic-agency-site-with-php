<?php
  include "config.php";

  $project_id = $_GET['id'];
  echo $_GET['cat'];
  $project_category = $_GET['cat'];
  $sql = "SELECT * FROM projects WHERE id = {$project_id}";
  $result = mysqli_query($conn, $sql) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);


  unlink("./admin/upload/".$row['project_img']);

  $sql = "DELETE FROM projects WHERE id = {$project_id};";
  $sql .= "UPDATE portfolio_category SET projects = projects - 1 WHERE id = {$project_category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/portfolio-section.php");
  }else{
    echo "Query Failed";
  }
?>