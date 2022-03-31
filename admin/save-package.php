<?php

    include 'config.php';
    if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['package_name']);
    $price = mysqli_real_escape_string($conn, $_POST['package_price']);
    $feature = mysqli_real_escape_string($conn, $_POST['feature']);

    $sql = "INSERT INTO package(package_name, package_price, feature) VALUES('{$name}', '{$price}', '{$feature}')";

    if(mysqli_multi_query($conn, $sql)){
        header("location: {$hostname}/admin/package.php");
    }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }
    }
?>