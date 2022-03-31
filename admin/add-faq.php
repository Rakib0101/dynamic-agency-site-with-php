<?php 
    include 'header.php';
    include 'config.php';
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
              <h2>Add faq:</h2>
                    <!-- Form Start -->
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                  <div class="form-group">
                      <input type="hidden" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>FAQ Question</label>
                      <input type="text" name="faq_q" class="form-control"   placeholder="write question" required>
                  </div>
                  <div class="form-group">
                      <label>FAQ Answer</label>
                      <input type="text" name="faq_a" class="form-control"  placeholder="write answer"  required>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary mt-4" value="Submit" />
              </form>
               <!-- Form End-->
        <?php
            if(isset($_POST['submit'])){
               $faq_q = mysqli_real_escape_string($conn, $_POST['faq_q']); 
               $faq_a = mysqli_real_escape_string($conn, $_POST['faq_a']); 

               $sql = "INSERT INTO faq(faq_question, faq_answer)
                        VALUES('{$faq_q}', '{$faq_a}')";
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