<?php 
    include 'header.php';
    include 'config.php';
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
              <h2>Add Your project:</h2>
                  <form class="w-75"  action="save-project.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group mt-2">
                          <label for="post_title">Title</label>
                          <input type="text" name="project_name" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group mt-2">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="project_desc" class="form-control" rows="5"  required></textarea>
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
                          <input type="text" name="project_client" class="form-control" required>
                      </div>
                      <div class="form-group mt-2">
                          <label for="fileToUpload">Project Link</label>
                          <input type="text" name="project_url" required class="form-control">
                      </div>
                      <div class="form-group mt-2" >
                          <label for="fileToUpload">Project Date</label>
                          <input type="date" name="project_date" required class="form-control">
                      </div>
                      <div class="form-group mt-2">
                          <label for="fileToUpload" >Project image</label>
                          <input type="file" name="fileToUpload" required class="form-control">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary mb-3" value="Save" required />
                  </form>
                  <!--/Form -->
    </div>
</div>
</body>
</html>