<?php 
    include 'header.php';
    include 'config.php';
    $post_id = $_GET['id'];
               if(isset($_FILES['pimg']) AND isset($_POST['submit'])){
                    $errors = array();

                    $file_name = $_FILES['pimg']['name'];
                    $file_size = $_FILES['pimg']['size'];
                    $file_tmp = $_FILES['pimg']['tmp_name'];
                    $file_type = $_FILES['pimg']['type'];
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
                $pname = mysqli_real_escape_string($conn, $_POST['pname']);
                $desc = mysqli_real_escape_string($conn, $_POST['pdesc']);
                $pcat = mysqli_real_escape_string($conn, $_POST['pcat']);
                $pclient = mysqli_real_escape_string($conn, $_POST['pclient']);
                $pdate = date("d M, Y");
                $purl = mysqli_real_escape_string($conn, $_POST['purl']);

                $sql1 = "UPDATE projects SET project_name ='{$pname}', project_desc='{$desc}', project_cat={$pcat}, project_img ='{$new_name}' , project_client='{$pclient}', project_date='{$pdate}', project_url='{$purl}' WHERE id = {$post_id};";
                 
                    
                    
                    if(mysqli_multi_query($conn, $sql1)){
                        header("location:{$hostname}/admin/portfolio-section.php");
                    }else{
                        echo "<div class='alert alert-danger'>Query Failed.</div>";
                    }
                }
               
?>

    <div class="col-md-10 mainbar">
              <!-- Form -->
                  <div class="mt-3">
                        <h2>Add new project.</h2>
                         <?php 
                        $post_id = $_GET['id'];
                        $sql = "SELECT * FROM projects WHERE id = {$post_id}";
                        $result = mysqli_query($conn, $sql) or die("query failed");
                        if(mysqli_num_rows($result) > 0){
                            while($row1= mysqli_fetch_assoc($result)){
                                ?>
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>project Name</label>
                            <input type="text" name="pname" class="form-control" value="<?php echo $row1['project_name'];?>">
                        </div>
                        <div class="form-group">
                            <label>Project description</label>
                            <textarea class="form-control" name="pdesc" rows="7"><?php echo $row1['project_desc'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Project Image</label>
                            <input type="file" name="pimg" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Category</label>
                            <select name="pcat"  class="form-control">
                               <option disabled>Select Category</option>
                               <?php 
                               $sql = "SELECT * FROM portfolio_category";
                               $result = mysqli_query($conn, $sql) or die('query failed');
                               if(mysqli_num_rows($result) > 0){
                                   while($row = mysqli_fetch_assoc($result)){
                                       echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                                   }
                               }
                               ?>        
                            </select>
                        </div>
                        <div class="form-group">
                            <label>project Client</label>
                            <input type="text" name="pclient" class="form-control" value="<?php echo $row1['project_client'];?>">
                        </div>
                        <div class="form-group">
                            <label>project Url</label>
                            <input type="text" name="purl" class="form-control" value="<?php echo $row1['project_url'];?>">
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