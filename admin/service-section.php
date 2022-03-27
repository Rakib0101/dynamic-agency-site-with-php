        <?php 
            include 'header.php';
             include "config.php";
            if(isset($_POST['submit'])){
               

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
                
                <div class="mb-5">
                     <h2>Update Service section Intro.</h2>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <div class="form-group">
                            <label >Service Intro</label>
                            <input type="text" name="s_intro" class="form-control">
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
               
                <div class="mt-3">
                    <h2>Add new services.</h2>
                    <form action="save-service.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Service icon</label>
                            <input type="file" name="uploadIcon" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Service title</label>
                            <input type="text" name="stitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Service description</label>
                            <textarea class="form-control" name="sdesc" rows="7"></textarea>
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                             include "config.php";
                                $sql2 = "SELECT * from service_list";
                                $result2 = mysqli_query($conn, $sql2) or die("query failed: ". mysqli_connect_error());
                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                ?>
                            <tr>
                                <td><?php echo $row2['id']?></td>
                                <td><?php echo $row2['list_title']?></td>
                                <td><?php echo $row2['list_desc']?></td>
                                <td><?php echo $row2['list_icon']?></td>
                                <td class='edit'><a href="update-service.php?id=<?php echo $row2['id']?>"><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href="delete-service.php?id=<?php echo $row2['id']?>"><i class='fa fa-trash'></i></a></td>
                            </tr>
                           <?php }}?> 
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    
</body>
</html>