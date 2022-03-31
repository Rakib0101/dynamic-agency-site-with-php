<?php 
    include "config.php";

    if(isset($_FILES['timg']) AND isset($_POST['submit'])){
        $errors = array();

        $file_name = $_FILES['timg']['name'];
        $file_size = $_FILES['timg']['size'];
        $file_tmp = $_FILES['timg']['tmp_name'];
        $file_type = $_FILES['timg']['type'];
        $file_ext = end(explode('.',$file_name));

        $extensions = array("jpeg", "jpg", "png", "svg");
        $new_name = time(). "-".basename($file_name);
        $target = "upload/".$new_name;

        if(in_array($file_ext, $extensions) === false){
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            die("This extension file not allowed");
        }
         if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
            }
        if(empty($errors) == true){
            move_uploaded_file($file_tmp, $target);
        }else{
            print_r($errors);
            die();
        }

    $tname = mysqli_real_escape_string($conn, $_POST['tname']);
    $tpos = mysqli_real_escape_string($conn, $_POST['tpos']);
    $ttwi = mysqli_real_escape_string($conn, $_POST['ttwi']);
    $tfb = mysqli_real_escape_string($conn, $_POST['tfb']);
    $tpin = mysqli_real_escape_string($conn, $_POST['tpin']);
    $tlin = mysqli_real_escape_string($conn, $_POST['tlin']);

        $sql = "INSERT INTO team(tname, position, img, tw, fb, pin, lin)
                 VALUES('{$tname}', '{$tpos}', '{$new_name}', '{$ttwi}', '{$tfb}', '{$tpin}', '{$tlin}')";
        
        
        if(mysqli_query($conn, $sql)){
            header("location:{$hostname}/admin/team.php");
        }else{
            echo "<div class='alert alert-danger'>Query Failed.</div>";
        }
 
    }

    
        

?>