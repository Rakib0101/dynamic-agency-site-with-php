        <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your faq section from here</h2>
                    <div class="section-title">
          <h2>F.A.Q</h2>    
        </div>
        <div class="faq" id="faq">
        <div>
            <a href="add-faq.php" class="bg-black text-white px-2 py-1 rounded">Add New FAQ</a>
        </div>
        <ul class="faq-list">
            <?php 
                                $sql_faq = "SELECT * FROM faq";
                                $result_faq = mysqli_query($conn, $sql_faq) or die("Query Failed.");
                                if(mysqli_num_rows($result_faq) > 0){
                                    while($row = mysqli_fetch_assoc($result_faq)){
                                ?>
          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                <?php echo $row['faq_question']; ?><i class="fa fa-chevron-down icon-show" style="top:2px;"></i><i class="fa fa-chevron-up icon-close" style="top:2px;"></i>
                <a href="update-faq.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="position:static;"></i></a>
                <a href="delete-faq.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="position:static;"></i></a>
            </div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                <?php echo $row['faq_answer']; ?>
              </p>
            </div>
            </li>
            <?php }} ?>
        </ul>
        </div>   
        </div>
    </div>

      <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>