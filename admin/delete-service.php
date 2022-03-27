<?php
  include "config.php";

  $service_id = $_GET['id'];

  $sql = "SELECT * FROM service_list WHERE id = {$service_id}";
  $result = mysqli_query($conn, $sql) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload/".$row['list_icon']);

  $sql = "DELETE FROM service_list WHERE id = {$service_id};";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/service-section.php");
  }else{
    echo "Query Failed";
  }
?>