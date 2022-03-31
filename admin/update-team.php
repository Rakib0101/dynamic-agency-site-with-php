<?php 
    include 'header.php';
    include 'config.php';
    $t_id = $_GET['id'];
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

    $sql = "UPDATE team SET tname ='{$tname}', position = '{$tpos}', img='{$new_name}', tw='{$ttwi}', fb='{$tfb}', pin='{$tpin}', lin='{$tlin}' WHERE id={$t_id}";
                
        
        
        if(mysqli_query($conn, $sql)){
            header("location:{$hostname}/admin/team.php");
        }else{
            echo "<div class='alert alert-danger'>Query Failed.</div>";
        }
 
    }
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
                  <div class="mt-3">
                        <h2>update team member.</h2>
                       
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <?php 
                        $t_sql = "SELECT * FROM team WHERE id = {$t_id}";
                        $result_t = mysqli_query($conn, $t_sql) or die("query failed");
                        if(mysqli_num_rows($result_t) > 0){
                            while($t_row = mysqli_fetch_assoc($result_t)){
                                ?>
                        <div class="form-group">
                            <label>Member Name</label>
                            <input type="text" name="tname" class="form-control" value=<?php echo $t_row['tname']?>>
                        </div>
                        <div class="form-group">
                            <label>Position name</label>
                            <input type="text" name="tpos" class="form-control" value=<?php echo $t_row['position']?>>
                            
                        </div>
                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="timg" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Twitter link</label>
                            <input type="text" name="ttwi" class="form-control" value=<?php echo $t_row['tw']?>>
                        </div>
                        <div class="form-group">
                            <label>Fb link</label>
                            <input type="text" name="tfb" class="form-control" value=<?php echo $t_row['fb']?>>
                        </div>
                        <div class="form-group">
                            <label>Pinterest link</label>
                            <input type="text" name="tpin" class="form-control" value=<?php echo $t_row['pin']?>>
                        </div>
                        <div class="form-group">
                            <label>LinkedIN link</label>
                            <input type="text" name="tlin" class="form-control" value=<?php echo $t_row['lin']?>>
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                            }}
                    ?>
                </div>
    </div>
</div>
</body>
</html>