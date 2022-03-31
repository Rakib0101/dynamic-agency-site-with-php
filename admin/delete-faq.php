<?php
    include "config.php";
    $faq_id = $_GET['id'];
    $sql = "DELETE FROM faq WHERE id = {$faq_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/admin/faq.php");
    }else{
        echo "query failed";
    }
?>