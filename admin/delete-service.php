<?php
include "config.php";

$post_id = $_GET['id'];

$sql = "SELECT * FROM service_list WHERE id = {$post_id}";
$result = mysqli_query($conn, $sql) or die("Query failed: id");
$row = mysqli_fetch_assoc($result);

unlink("upload/".$row['list_icon']);
$sql1 = "DELETE FROM service_list WHERE id = {$post_id}";

 if(mysqli_multi_query($conn, $sql)){
    header("location:{$hostname}/admin/service-section.php");
}else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}
?>