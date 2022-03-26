        <?php 
            include 'header.php';
            if(isset($_POST['submit'])){
                include "config.php";

                $sIntro = mysqli_real_escape_string($conn, $_POST['s_intro']);

                $sql = "UPDATE service_section SET s_sec_intro = '{$sIntro}' WHERE id = 1";
                if(mysqli_query($conn, $sql)){
                    echo "data added successfully";
                    header("Location:{$hostname}/admin/service-section.php");
                }

            }
        ?>
        <div class="col-md-10 mainbar">
            <div class="main-area col-md-8 ">
                <h2>Update Service section Intro.</h2>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <label >About us Intro</label>
                        <input type="text" name="s_intro" class="form-control">
                    </div>
                    <br/>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>