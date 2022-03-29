<?php 
    include "config.php";

    if(isset($_FILES['pimg'])){
        $errors = array();

        $file_name = $_FILES['pimg']['name'];
        $file_size = $_FILES['pimg']['size'];
        $file_tmp = $_FILES['pimg']['tmp_name'];
        $file_type = $_FILES['pimg']['type'];
        $file_ext = end(explode('.',$file_name));

        $extensions = array("jpeg", "jpg", "png", "svg");
        $new_name = time(). "-".basename($file_name);
        $target = "upload/".$new_name;

        if(in_array($file_ext, $$extensions) === false){
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
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
    }

    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $desc = mysqli_real_escape_string($conn, $_POST['pdesc']);
    $pcat = mysqli_real_escape_string($conn, $_POST['pcat']);
    $pclient = mysqli_real_escape_string($conn, $_POST['pclient']);
    $pdate = date("d M, Y");
    $purl = mysqli_real_escape_string($conn, $_POST['purl']);

        $sql = "INSERT INTO projects(project_name, project_desc, project_cat, project_img, project_client, project_date, project_url)
                 VALUES('{$pname}', '{$desc}', '{$pcat}','{$new_name}','{$pclient}','{$pdate}', '{$purl}');";
        $sql .="UPDATE portfolio_category SET projects = projects + 1 WHERE id = {$pcat}";
        
        
        if(mysqli_multi_query($conn, $sql)){
            header("location:{$hostname}/admin/portfolio-section.php");
        }else{
            echo "<div class='alert alert-danger'>Query Failed.</div>";
        }
 
        

?>