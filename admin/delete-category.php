<?php
    include 'config.php';
    if($_SESSION["user_role"] == '0'){
      header("Location: {$hostname}/admin/post.php");
    }
    $cat_id = $_GET["id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM portfolio_category WHERE id ='{$cat_id}'";

    if (mysqli_query($conn, $sql)) {
        header("location:{$hostname}/admin/portfolio-category.php");
    }

    mysqli_close($conn);

?>
