<?php 
    include 'header.php';
    include 'config.php';
?>
        <div class="col-md-10 mainbar">
            <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])){
                $name = mysqli_real_escape_string($conn, $_POST['package_name']);
                $price = mysqli_real_escape_string($conn, $_POST['package_price']);
                $feature = mysqli_real_escape_string($conn, $_POST['feature']);

                $sql = "UPDATE package SET package_name='{$name}', package_price='{$price}', feature='{$feature}' WHERE id ='{$id}'";

                if(mysqli_multi_query($conn, $sql)){
                    header("location: {$hostname}/admin/package-section.php");
                }else{
                echo "<div class='alert alert-danger'>Query Failed.</div>";
                 }
            }
        ?>
            <h2>Update Your project:</h2>
                <?php 
                    
                    $sql = "SELECT * FROM package WHERE id='{$id}'";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row1 = mysqli_fetch_assoc($result)){
                ?>
                  <form class="w-75"  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group mt-2">
                          <label for="post_title">Package Name</label>
                          <input type="text" name="package_name" class="form-control" autocomplete="off" required value="<?php echo $row1['package_name']; ?>">
                      </div>
                      <div class="form-group mt-2">
                          <label for="exampleInputPassword1">Package Price</label>
                          <input name="package_price" class="form-control" required value="<?php echo $row1['package_price']; ?>">
                      </div>
                      <div class="form-group mt-2">
                          <label for="fileToUpload">Features</label>
                          <input type="text" name="feature" required class="form-control" placeholder="add features by separated with comma" value="<?php echo $row1['feature']; ?>">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary mb-3" value="Save" required />
                  </form>
                  <?php }} ?>
                  <!--/Form -->
        </div>
        
    </div>

    
</body>
</html>