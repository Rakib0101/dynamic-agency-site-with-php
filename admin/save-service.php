<?php 
    include "config.php";

    if(isset($_FILES['uploadIcon'])){
        $errors = array();

        $file_name = $_FILES['uploadIcon']['name'];
        $file_size = $_FILES['uploadIcon']['size'];
        $file_tmp = $_FILES['uploadIcon']['tmp_name'];
        $file_type = $_FILES['uploadIcon']['type'];
        $file_ext = strtolower(end(explode('.',$file_name)));

        $extensions = array("jpeg", "jpg", "png", "svg");
        if(in_array($file_ext, $$extensions) === false){
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }
         if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
            }
        if(empty($errors) == true){
            move_uploaded_file($file_tmp, "upload/".$file_name);
        }else{
            print_r($errors);
            die();
        }
    }
        $title = mysqli_real_escape_string($conn, $_POST['stitle']);
        $desc = mysqli_real_escape_string($conn, $_POST['sdesc']);

        $sql = "INSERT INTO service_list(list_icon, list_title, list_desc)
        VALUES('{$file_name}', '{$title}', '{$desc}')";

        if(mysqli_multi_query($conn, $sql)){
            header("location:{$hostname}/admin/service-section.php");
        }else{
            echo "<div class='alert alert-danger'>Query Failed.</div>";
        }

?>