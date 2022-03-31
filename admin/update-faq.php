<?php 
    include 'header.php';
    include 'config.php';
    $faq_id = $_GET['id'];
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
              <h2>Update faq:</h2>
              <?php 
                $sql1 = "SELECT * FROM faq WHERE id = {$faq_id}";
                $result = mysqli_query($conn, $sql1) or die("query failed");
                if(mysqli_num_rows($result) > 0){
                    while($row1 = mysqli_fetch_assoc($result)){

               
              ?>
                    <!-- Form Start -->
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                  <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $row1['id'];?>" >
                  </div>
                  <div class="form-group">
                      <label>FAQ Question</label>
                      <input type="text" name="faq_q" class="form-control"   value="<?php echo $row1['faq_question'];?>" required>
                  </div>
                  <div class="form-group">
                      <label>FAQ Answer</label>
                      <input type="text" name="faq_a" class="form-control"  value="<?php echo $row1['faq_answer'];?>"  required>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary mt-4" value="Submit" />
              </form>
               <!-- Form End-->

        <?php
             }
                }
            if(isset($_POST['submit'])){
               $faq_q = mysqli_real_escape_string($conn, $_POST['faq_q']); 
               $faq_a = mysqli_real_escape_string($conn, $_POST['faq_a']); 

               $sql = "UPDATE faq SET faq_question='{$faq_q}', faq_answer='{$faq_a}' WHERE id= {$faq_id}";
               if(mysqli_query($conn, $sql) or die("query failed")){
                    header("location:{$hostname}/admin/faq.php");
               }else{
                     echo "<div class='alert alert-danger'>Query Failed.</div>";
               }

            }
          ?>
    </div>
</div>
</body>
</html>