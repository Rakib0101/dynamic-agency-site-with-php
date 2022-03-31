<?php 
    include 'header.php';
    include 'config.php';
    $id = $_GET['id'];
               if(isset($_FILES['member_img']) AND isset($_POST['submit'])){
                    
                $errors = array();

                $file_name = $_FILES['member_img']['name'];
                $file_size = $_FILES['member_img']['size'];
                $file_tmp = $_FILES['member_img']['tmp_name'];
                $file_type = $_FILES['member_img']['type'];
                $file_ext = @end(explode('.',$file_name));

                $extensions = array("jpeg","jpg","png");

                if(in_array($file_ext,$extensions) === false)
                {
                    $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
                }

                if($file_size > 2097152){
                    $errors[] = "File size must be 2mb or lower.";
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

                $name = mysqli_real_escape_string($conn, $_POST['member_name']);
                $position = mysqli_real_escape_string($conn, $_POST['member_position']);
                $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
                $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
                $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
                $linkedIn = mysqli_real_escape_string($conn, $_POST['linkedIn']);

                $sql1 = "UPDATE team SET member_name ='{$name}', member_position='{$position}', twitter='{$twitter}', member_img ='{$new_name}' , facebook='{$facebook}', instagram='{$instagram}', linkedIn='{$linkedIn}' WHERE id = {$id}";
                 
                    
                    
                    if(mysqli_multi_query($conn, $sql1)){
                        header("location:{$hostname}/admin/team-section.php");
                    }else{
                        echo "<div class='alert alert-danger'>Query Failed.</div>";
                    }
                }
               
?>
        <div class="col-md-10 mainbar">
            <h2>Update Your project:</h2>
                <?php 
                    $sql = "SELECT * FROM team WHERE id='{$id}'";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row1 = mysqli_fetch_assoc($result)){
                ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Member Image</label>
                            <input type="file" name="member_img" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label>Member Name</label>
                            <input type="text" name="member_name" value="<?php echo $row1['member_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Member Position</label>
                            <input type="text" name="member_position" value="<?php echo $row1['member_position']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Twitter url</label>
                            <input type="text" name="twitter" value="<?php echo $row1['twitter']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Facebook url</label>
                            <input type="text" name="facebook" value="<?php echo $row1['facebook']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Instagram url</label>
                            <input type="text" name="instagram" value="<?php echo $row1['instagram']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LinkendIn url</label>
                            <input type="text" name="linkedIn" value="<?php echo $row1['linkedIn']; ?>" class="form-control">
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                  <?php }} ?>
                  <!--/Form -->
        </div>
        
    </div>

    
</body>
</html>