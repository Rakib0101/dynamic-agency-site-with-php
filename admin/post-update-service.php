<?php 
    include "config.php";
    $post_id = $_GET['id'];
    echo $post_id;
    if(empty($_FILES['uploadNewIcon']['name'])){
        $new_name = $_POST['uploadIcon'];
    }else{
        $errors = array();

        $file_name = $_FILES['uploadNewIcon']['name'];
        $file_size = $_FILES['uploadNewIcon']['size'];
        $file_tmp = $_FILES['uploadNewIcon']['tmp_name'];
        $file_type = $_FILES['uploadNewIcon']['type'];
        $file_ext = end(explode('.',$file_name));
        $extensions = array("jpeg","jpg","png","svg");
        if(in_array($file_ext,$extensions) === false)
  {
    $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
  }

  if($file_size > 2097152){
    $errors[] = "File size must be 2mb or lower.";
  }
  $new_name = time(). "-".basename($file_name);
  $target = "upload/".$new_name;
  $image_name = $new_name;
  if(empty($errors) == true){
    move_uploaded_file($file_tmp,$target);
  }else{
    print_r($errors);
    die();
  }
    }

    $sql = "UPDATE service_list SET list_title='{$_POST["stitle"]}',list_desc='{$_POST["sdesc"]}',list_icon='{$image_name}'
        WHERE id={$post_id}";


$result = mysqli_multi_query($conn,$sql);

if($result){
  header("location: {$hostname}/admin/service-section.php");
}else{
  echo "Query Failed";
}

?>