<?php 
    include 'header.php';
    include 'config.php';
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
              <h2>Add Your project:</h2>
                  <form class="w-75"  action="save-package.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group mt-2">
                          <label for="post_title">Package Name</label>
                          <input type="text" name="package_name" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group mt-2">
                          <label>Package Price</label>
                          <input name="package_price" class="form-control" required>
                      </div>
                      <div class="form-group mt-2">
                          <label>Features</label>
                          <input type="text" name="feature" required class="form-control" placeholder="add features by separated with comma">
                          <p>Example: feature 1,  feature 2, feature 3</p>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary mb-3" value="Save" required />
                  </form>
                  <!--/Form -->
    </div>
</div>
</body>
</html>