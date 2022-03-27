<?php 
            include 'header.php';
            if(isset($_POST['submit'])){
                include "config.php";

                $abIntro = mysqli_real_escape_string($conn, $_POST['ab_intro']);
                $liIntro = mysqli_real_escape_string($conn, $_POST['li_intro']);
                $liDesc = mysqli_real_escape_string($conn, $_POST['li_desc']);
                $abDesc = mysqli_real_escape_string($conn, $_POST['ab_desc']);

                $sql = "UPDATE about_us SET about_us_intro = '{$abIntro}', list_intro = '{$liIntro}', list_desc = '{$liDesc}', about_us_desc='{$abDesc}' WHERE id = 1";
                if(mysqli_query($conn, $sql)){
                    echo "data added successfully";
                    header("Location:{$hostname}/admin/about-section.php");
                }

            }
        ?>
        <div class="col-md-10 mainbar">
            <div class="main-area col-md-8 ">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <label >About us Intro</label>
                        <input type="text" name="ab_intro" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label >List Intro</label>
                        <input type="text" name="li_intro" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label >List description</label>
                        <input type="text" name="li_desc" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label >About Us description</label> <br/>
                        <textarea name="ab_desc" rows="10" cols="50"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>