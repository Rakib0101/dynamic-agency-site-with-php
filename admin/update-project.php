<?php 
    include 'header.php';
    include 'config.php';
    $id = $_GET['id'];
               if(isset($_FILES['project_img']) AND isset($_POST['submit'])){
                    $errors = array();

                    $file_name = $_FILES['project_img']['name'];
                    $file_size = $_FILES['project_img']['size'];
                    $file_tmp = $_FILES['project_img']['tmp_name'];
                    $file_type = $_FILES['project_img']['type'];
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
                $pname = mysqli_real_escape_string($conn, $_POST['project_name']);
                $desc = mysqli_real_escape_string($conn, $_POST['project_desc']);
                $pcat = mysqli_real_escape_string($conn, $_POST['project_cat']);
                $pclient = mysqli_real_escape_string($conn, $_POST['project_client']);
                $pdate = date("d M, Y");
                $purl = mysqli_real_escape_string($conn, $_POST['project_url']);

                $sql1 = "UPDATE projects SET project_name ='{$pname}', project_desc='{$desc}', project_cat={$pcat}, project_img ='{$new_name}' , project_client='{$pclient}', project_date='{$pdate}', project_url='{$purl}' WHERE id = {$id};";
                 
                    
                    
                    if(mysqli_multi_query($conn, $sql1)){
                        header("location:{$hostname}/admin/portfolio-section.php");
                    }else{
                        echo "<div class='alert alert-danger'>Query Failed.</div>";
                    }
                }
               
?>
        <div class="col-md-10 mainbar">
            <h2>Update Your project:</h2>
                <?php 
                    $project_id = $_GET['id'];
                    $sql = "SELECT * FROM projects WHERE id='{$project_id}'";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row1 = mysqli_fetch_assoc($result)){
                ?>
                  <form class="w-75"  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group mt-2">
                          <label for="post_title">Title</label>
                          <input type="text" name="project_name" class="form-control" autocomplete="off" value="<?php echo $row1['project_name']; ?>" required>
                      </div>
                      <div class="form-group mt-2">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="project_desc" class="form-control" rows="5"  required><?php echo $row1['project_desc']; ?></textarea>
                      </div>
                      <div class="form-group mt-2">
                          <label for="category">Category</label>
                          <select name="project_cat" class="form-control">
                              <option disabled selected> Select Category</option>
                              <?php
                                $sql_cat = "SELECT * FROM portfolio_category";

                                $result_cat = mysqli_query($conn, $sql_cat) or die("Query Failed.");

                                if(mysqli_num_rows($result_cat) > 0){
                                  while($row = mysqli_fetch_assoc($result_cat)){
                                    echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                                  }
                                }
                              ?>
                          </select>
                      </div>
                      <div class="form-group mt-2">
                          <label for="fileToUpload" >Project Client</label>
                          <input type="text" name="project_client" value="<?php echo $row1['project_client']; ?>" class="form-control" required>
                      </div>
                      <div class="form-group mt-2">
                          <label for="fileToUpload">Project Link</label>
                          <input type="text" name="project_url" value="<?php echo $row1['project_url']; ?>" required class="form-control">
                      </div>
                      <div class="form-group mt-2" >
                          <label for="fileToUpload">Project Date</label>
                          <input type="date" name="project_date" required class="form-control" value="<?php echo $row1['project_date']; ?>">
                      </div>
                      <div class="form-group mt-2">
                          <label for="project_img" >Project image</label>
                          <input type="file" name="project_img" required class="form-control">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary mb-3" value="Save" required />
                  </form>
                  <?php }} ?>
                  <!--/Form -->
        </div>
        
    </div>

    
</body>
</html>