<?php 
    include 'header.php';
    include 'config.php';
?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your service section from here</h2>
            <?php
            if(isset($_FILES['uploadIcon']) AND isset($_POST['submit'])){
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
                if(isset($_POST['submit'])){
                    $title = mysqli_real_escape_string($conn, $_POST['stitle']);
                    $description = mysqli_real_escape_string($conn, $_POST['sdesc']);
                    $service_id = $_GET['id'];

                    $sql = "UPDATE service_list SET list_title='{$title}', list_desc='{$description}', list_icon='{$new_name}' WHERE id ='{$service_id}'";

                    if(mysqli_multi_query($conn, $sql)){
                        header("location: {$hostname}/admin/service-section.php");
                    }else{
                    echo "<div class='alert alert-danger'>Query Failed.</div>";
                    }
                }

        ?>
            <h2>Add new services.</h2>
            <?php 
                $ser_id = $_GET['id'];
                $sql = "SELECT * FROM service_list WHERE id='{$ser_id}'";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Service icon</label>
                        <input type="file" name="uploadIcon" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Service title</label>
                        <input type="text" name="stitle" class="form-control" value="<?php echo $row['list_title']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Service description</label>
                        <textarea class="form-control" name="sdesc" rows="7"><?php echo $row['list_desc']; ?></textarea>
                    </div>
                    <br/>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>  
            <?php }} ?> 
        </div>
        
    </div>

    
</body>
</html>