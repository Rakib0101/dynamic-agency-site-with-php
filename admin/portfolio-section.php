        <?php 
            include 'header.php';
             include "config.php";
          
        ?>
        <div class="col-md-10 mainbar">
            <div class="main-area col-md-8 ">
              <div class="row">
                <div class="col-md-6"><h3>All Projects</h3></div>
                <div class="col-md-6">
                    <a href="add-project.php" class="bg-dark text-light px-4 py-1 rounded text-end">Add New Project</a>
                    <a href="portfolio-category.php" class="bg-dark text-light px-4 py-1 rounded text-end">Project Category</a>
              </div>
            </div>
                <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Client</th>
                                <th scope="col">Date</th>
                                <th scope="col">Url</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                             include "config.php";
                                $sql_p = "SELECT * from projects";
                                $result_p = mysqli_query($conn, $sql_p) or die("query failed: ". mysqli_connect_error());
                                if(mysqli_num_rows($result_p) > 0){
                                    while($row_p = mysqli_fetch_assoc($result_p)){
                                ?>
                            <tr>
                                <td><?php echo $row_p['id']?></td>
                                <td><?php echo $row_p['project_name']?></td>
                                <td><?php echo $row_p['project_desc']?></td>
                                <td><?php echo $row_p['project_img']?></td>
                                <td><?php echo $row_p['project_cat']?></td>
                                <td><?php echo $row_p['project_client']?></td>
                                <td><?php echo $row_p['project_date']?></td>
                                <td><?php echo $row_p['project_url']?></td>
                                <td class='edit'><a href="update-project.php?id=<?php echo $row_p['id']?>"><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-project.php?id=<?php echo $row_p['id']."&cat=".$row_p['project_cat']; ?>'><i class='fa fa-trash'></i></a></td>
                            </tr>
                           <?php }}?> 
                        </tbody>
                    </table>

                 
            </div>
        </div>
    </div>

    
</body>
</html>