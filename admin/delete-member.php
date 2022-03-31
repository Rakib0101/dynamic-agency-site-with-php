<?php
  include "config.php";

  $id = $_GET['id'];


  $sql = "DELETE FROM team WHERE id = {$id};";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/team-section.php");
  }else{
    echo "Query Failed";
  }
?>