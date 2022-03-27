<?php

    include 'config.php';
    if(isset($_FILES['uploadIcon'])){

        $errors = array();

        $file_name = $_FILES['uploadIcon']['name'];
        $file_size = $_FILES['uploadIcon']['size'];
        $file_tmp = $_FILES['uploadIcon']['tmp_name'];
        $file_type = $_FILES['uploadIcon']['type'];
        $file_ext = end(explode('.', $file_name));

        $extensions = array("jpeg", "jpg", "png", "svg");

        if(in_array($file_ext, $extensions) === false){
            $errors[] = "This extension file not allowed, please choose a jpg, png or svg file.";
        }

        if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
        }

        $new_name = time(). "-".basename($file_name);
        $target = "upload/".$new_name;

        if(empty($errors) == true){
            move_uploaded_file($file_tmp,$target);
        }else{
            print_r($errors);
            die();
        }

    }
    $title = mysqli_real_escape_string($conn, $_POST['stitle']);
    $description = mysqli_real_escape_string($conn, $_POST['sdesc']);

    $sql = "INSERT INTO service_list(list_title, list_desc, list_icon) VALUES('{$title}', '{$description}', '{$new_name}')";

    if(mysqli_multi_query($conn, $sql)){
        header("location: {$hostname}/admin/service-section.php");
    }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>