<?php
include "config.php";

$post_id = $_GET['id'];

$sql = "SELECT * FROM team WHERE id = {$post_id}";
$result = mysqli_query($conn, $sql) or die("Query failed: id");
$row = mysqli_fetch_assoc($result);

unlink("upload/".$row['img']);
$sql = "DELETE FROM team WHERE id = {$post_id}";

 if(mysqli_multi_query($conn, $sql)){
    header("location:{$hostname}/admin/team.php");
}else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}
?>