    <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
<!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Frequently Asked <span>Questions</span></h3>
        </div>
         <div class=" mb-5 d-flex justify-content-end">
            <a href="add-faq.php" class="bg-dark  ms-auto text-light px-4 py-1 rounded text-end">Add New Faq</a>
        </div>
        <ul class="faq-list">
        <?php 
           $sql = "SELECT * FROM faq";
           $result = mysqli_query($conn, $sql) or die("query failed");
           if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_assoc($result)){

           
        ?>
          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1"><?php echo $row['faq_question'];?> <i class="fa fa-chevron-up icon-show"></i><i class="fa fa-chevron-down icon-close"></i>
                <a class="ms-4" href="update-faq.php?id=<?php echo $row['id'];?>"><i class='fa fa-edit' style="position:static; "></i></a>
                <a class="ms-1" href="delete-faq.php?id=<?php echo $row['id'];?>"><i class='fa fa-trash' style="position:static; "></i></a>
           </div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
               <?php echo $row['faq_answer'];?>
              </p>
            </div>
          </li>
          <?php
              }
           }

          ?>
        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

        </div>
    </div>

 <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
 
 