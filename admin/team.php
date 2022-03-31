        <?php 
            include 'header.php';
             include "config.php";
          
        ?>
        <div class="col-md-10 mainbar">
            <div class="main-area col-md-8 ">
              <div class="row">
                <div class="col-md-6"><h3>All Team Members</h3></div>
                <div class="col-md-6">
                    <a href="add-team.php" class="bg-dark text-light px-4 py-1 rounded text-end">Add New team member</a>
              </div>
            </div>
                <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">position</th>
                                <th scope="col">Image</th>
                                <th scope="col">Twitter</th>
                                <th scope="col">Fb</th>
                                <th scope="col">Pinterest</th>
                                <th scope="col">Linkedin</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                             include "config.php";
                                $sql_t = "SELECT * from team";
                                $result_t = mysqli_query($conn, $sql_t) or die("query failed: ". mysqli_connect_error());
                                if(mysqli_num_rows($result_t) > 0){
                                    while($row_t = mysqli_fetch_assoc($result_t)){
                                ?>
                            <tr>
                                <td><?php echo $row_t['id'];?></td>
                                <td><?php echo $row_t['tname'];?></td>
                                <td><?php echo $row_t['position'];?></td>
                                <td><?php echo $row_t['img'];?></td>
                                <td><?php echo $row_t['tw'];?></td>
                                <td><?php echo $row_t['fb'];?></td>
                                <td><?php echo $row_t['pin'];?></td>
                                <td><?php echo $row_t['lin'];?></td>
                                <td class='edit'><a href="update-team.php?id=<?php echo $row_t['id']?>"><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-team.php?id=<?php echo $row_t['id'];?>'><i class='fa fa-trash'></i></a></td>
                            </tr>
                           <?php }}?> 
                        </tbody>
                    </table>

                 
            </div>
        </div>
    </div>

    
</body>
</html>