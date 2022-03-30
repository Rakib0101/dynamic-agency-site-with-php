<?php 
    ob_start();
    include 'header.php';
    include 'config.php';
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
              <h2>Update faq:</h2>
                <?php
                
                $faq_id = $_GET['id'];
                /* query record for modify*/
                $sql = "SELECT * FROM faq WHERE id ='{$faq_id}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_assoc($result)) { ?>
                    <!-- Form Start -->
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                  <div class="form-group">
                      <input type="hidden"  class="form-control" value="<?php echo $row['id']; ?>">
                  </div>
                  <div class="form-group">
                      <label>FAQ Question</label>
                      <input type="text" name="faq_q" class="form-control" value="<?php echo $row['faq_question']; ?>"  placeholder="" required>
                  </div>
                  <div class="form-group">
                      <label>FAQ Answer</label>
                      <input type="text" name="faq_a" class="form-control" value="<?php echo $row['faq_answer']; ?>"  placeholder="" required>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary" value="Update" />
              </form>
               <!-- Form End-->
              <?php
              }
          }
        ?>
        <?php
        if(isset($_POST['submit'])){
                    $question = mysqli_real_escape_string($conn, $_POST['faq_q']);
                    $answer = mysqli_real_escape_string($conn, $_POST['faq_a']);
                    
                    $sql1 = "UPDATE faq SET faq_question='{$question}', faq_answer='{$answer}' WHERE id ='{$faq_id}'";

                    if(mysqli_multi_query($conn, $sql1)){
                        header("location: {$hostname}/admin/faq-section.php");
                    }else{
                    echo "<div class='alert alert-danger'>Query Failed.</div>";
                    }
                }
          ?>
    </div>
</div>
</body>
</html>