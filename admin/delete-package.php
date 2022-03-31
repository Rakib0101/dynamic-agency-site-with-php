<?php
    include "config.php";
    $pack_id = $_GET['id'];
    $sql = "DELETE FROM package WHERE id = {$pack_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/admin/package.php");
    }else{
        echo "query failed";
    }
?>