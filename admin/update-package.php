<?php 
    include 'header.php';
    include 'config.php';
    $package_id = $_GET['id'];
    
            
            if(isset($_POST['submit'])){
               $pack_name = mysqli_real_escape_string($conn, $_POST['package_name']); 
               $pack_price = mysqli_real_escape_string($conn, $_POST['package_price']); 
               $feature = mysqli_real_escape_string($conn, $_POST['feature']); 

               $sql = "UPDATE package SET package_name='{$pack_name}', package_price='{$pack_price}', feature='{$feature}' WHERE id= {$package_id}";
               if(mysqli_query($conn, $sql) or die("query failed")){
                    header("location:{$hostname}/admin/package.php");
               }else{
                     echo "<div class='alert alert-danger'>Query Failed.</div>";
               }

            }
       
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
              <h2>Add Your project:</h2>
               <?php 
                    $sql_package = "SELECT * FROM package WHERE id = {$package_id}";
                    $result_package = mysqli_query($conn, $sql_package) or die("Query Failed.");
                    if(mysqli_num_rows($result_package) > 0){
                        while($row_package = mysqli_fetch_assoc($result_package)){
                ?>
                  <form class="w-75"  action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group mt-2">
                          <label>Package Name</label>
                          <input type="text" name="package_name" class="form-control" value="<?php echo $row_package['package_name'];?>" required>
                      </div>
                      <div class="form-group mt-2">
                          <label>Package Price</label>
                          <input name="package_price" class="form-control" value="<?php echo $row_package['package_price'];?>"  required>
                      </div>
                      <div class="form-group mt-2">
                          <label>Features</label>
                          <input type="text" name="feature" required class="form-control" value="<?php echo $row_package['feature'];?>">
                          <p>Example: feature 1,  feature 2, feature 3</p>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary mb-3" value="Save" required />
                  </form>
              <?php 
                        }}
              ?>    <!--/Form -->
    </div>
  
</div>
</body>
</html>