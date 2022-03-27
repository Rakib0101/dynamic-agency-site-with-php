        <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your hero section from here</h2>
            <div>
            <?php
                if(isset($_POST['submit'])){
                    $welcome_text=mysqli_real_escape_string($conn, $_POST['welcome_text']);
                    $site_title=mysqli_real_escape_string($conn, $_POST['site_title']);
                    $site_desc=mysqli_real_escape_string($conn, $_POST['site_desc']);
                    $sql1 = "UPDATE hero_section SET welcome_text='$welcome_text', site_title='$site_title', site_desc='$site_desc' WHERE id=4 ";

                    if (mysqli_query($conn,$sql1)){
                        echo 'data added successfully';
                        header("location: {$hostname}/admin/hero-section.php");
                    }else{
                        echo 'query failed';
                    }
                }
            ?>
            <?php 
                $sql = "SELECT * FROM hero_section";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <input type="text" name='welcome_text' class="form-control" value="<?php echo $row["welcome_text"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mt-2" name='site_title' value="<?php echo $row['site_title']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control mt-2" rows="5" cols="40" name='site_desc' ><?php echo $row['site_desc']; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input class="px-2 py-1 mt-2"  type="submit" name='submit' value="Update">
                    </div>   
                </form>
            </div>
            <?php }} ?>
            
        </div>
    </div>

    
</body>
</html>