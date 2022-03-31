<?php
  include "config.php";

  $package_id = $_GET['id'];


  $sql = "DELETE FROM package WHERE id = {$package_id};";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/package-section.php");
  }else{
    echo "Query Failed";
  }
?>