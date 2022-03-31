<?php

    include 'config.php';
    if(isset($_FILES['uploadImg'])){

        $errors = array();

        $file_name = $_FILES['uploadImg']['name'];
        $file_size = $_FILES['uploadImg']['size'];
        $file_tmp = $_FILES['uploadImg']['tmp_name'];
        $file_type = $_FILES['uploadImg']['type'];
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
    $name = mysqli_real_escape_string($conn, $_POST['member_name']);
    $position= mysqli_real_escape_string($conn, $_POST['member_position']);
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $linkedIn = mysqli_real_escape_string($conn, $_POST['linkedIn']);

    $sql = "INSERT INTO team(member_name, member_position, member_img, twitter, facebook, instagram, linkedIn) VALUES('{$name}', '{$position}', '{$new_name}', '{$twitter}', '{facebook}', '{$instagram}', '{$linkedIn}')";

    if(mysqli_multi_query($conn, $sql)){
        header("location: {$hostname}/admin/team-section.php");
    }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>