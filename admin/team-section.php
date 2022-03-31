        <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your service section from here</h2>
            <div>
                <?php
                    if(isset($_POST['submit'])){
                        $s_sec_intro=mysqli_real_escape_string($conn, $_POST['s_sec_intro']);
                        $sql1 = "UPDATE service_section SET s_sec_intro='$s_sec_intro' WHERE id=1";

                        if (mysqli_query($conn,$sql1)){
                            echo 'data added successfully';
                            header("location: {$hostname}/admin/service-section.php");
                        }else{
                            echo 'query failed';
                        }
                    }
                ?>
                <?php

                    $sql = "SELECT * FROM service_section";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                ?>

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    
                    <div class="form-group">
                        <label for="intro">Service Section Intro</label>
                        <input type="text" class="form-control" name='s_sec_intro' id="intro" value="<?php echo $row['s_sec_intro']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mt-2" value="Update" />
                </form>
            </div>
            <?php }} ?>
                <div class="mt-3">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Image</th>
                                <th scope="col">twitter</th>
                                <th scope="col">facebook</th>
                                <th scope="col">instagram</th>
                                <th scope="col">linkedin</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                        $sql1 = "SELECT * FROM team";
                        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                        if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){
                    ?>
                    
                            <tr>
                                <td><?php echo $row1['id']; ?></td>
                                <td><?php echo $row1['member_name']; ?></td>
                                <td><?php echo $row1['member_position']; ?></td>
                                <td><?php echo $row1['member_img']; ?></td>
                                <td><?php echo $row1['twitter']; ?></td>
                                <td><?php echo $row1['facebook']; ?></td>
                                <td><?php echo $row1['instagram']; ?></td>
                                <td><?php echo $row1['linkedIn']; ?></td>
                                <td class='edit'><a href='update-member.php?id=<?php echo $row1['id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-member.php?id=<?php echo $row1['id']; ?>'><i class='fa fa-trash'></i></a></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                    
                    <h2>Add new member.</h2>
                    <form action="save-member.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Member Image</label>
                            <input type="file" name="uploadImg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Member Name</label>
                            <input type="text" name="member_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Member Position</label>
                            <input type="text" name="member_position" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Twitter url</label>
                            <input type="text" name="twitter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Facebook url</label>
                            <input type="text" name="facebook" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Instagram url</label>
                            <input type="text" name="instagram" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LinkendIn url</label>
                            <input type="text" name="linkedIn" class="form-control">
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
        </div>
    </div>

    
</body>
</html>