<?php
  include "config.php";

  $faq_id = $_GET['id'];

  $sql = "DELETE FROM faq WHERE id = {$faq_id};";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/faq-section.php");
  }else{
    echo "Query Failed";
  }
?>