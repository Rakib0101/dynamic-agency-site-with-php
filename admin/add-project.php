<?php 
    include 'header.php';
    include 'config.php';
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
                  <div class="mt-3">
                        <h2>Add new project.</h2>
                        <form action="save-portfolio.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>project Name</label>
                            <input type="text" name="pname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Project description</label>
                            <textarea class="form-control" name="pdesc" rows="7"></textarea>
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
                            <input type="text" name="pclient" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>project Url</label>
                            <input type="text" name="purl" class="form-control">
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
    </div>
</div>
</body>
</html>