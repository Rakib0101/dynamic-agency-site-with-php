<?php 
    ob_start();
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
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
              </form>
               <!-- Form End-->
        <?php
        if(isset($_POST['submit'])){
                    $question = mysqli_real_escape_string($conn, $_POST['faq_q']);
                    $answer = mysqli_real_escape_string($conn, $_POST['faq_a']);
                    
                    $sql1 = "INSERT INTO faq (faq_question, faq_answer) VALUES('{$question}', '{$answer}') ";

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