        <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your portfolio section from here</h2>
            <div class="row">
                <div class="col-md-6"><h3>All Projects</h3></div>
                <div class="col-md-6">
                    <a href="add-project.php" class="bg-dark text-light px-4 py-1 rounded text-end">Add New Project</a>
                    <a href="portfolio-category.php" class="bg-dark text-light px-4 py-1 rounded text-end">Project Category</a>
                </div>
            </div>
            <div class="mt-3 overflow-scroll">
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
                                <th scope="col">url</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql_projects = "SELECT * FROM projects";
                                $result_projects = mysqli_query($conn, $sql_projects) or die("Query Failed.");
                                if(mysqli_num_rows($result_projects) > 0){
                                    while($row_project = mysqli_fetch_assoc($result_projects)){
                                ?>
                            <tr>
                                <td><?php echo $row_project['id']; ?></td>
                                <td><?php echo $row_project['project_name']; ?></td>
                                <td><?php echo $row_project['project_desc']; ?></td>
                                <td><?php echo $row_project['project_img']; ?></td>
                                <td><?php echo $row_project['project_cat']; ?></td>
                                <td><?php echo $row_project['project_client']; ?></td>
                                <td><?php echo $row_project['project_date']; ?></td>
                                <td><?php echo $row_project['project_url']; ?></td>
                                <td class='edit'><a href='update-project.php?id=<?php echo $row_project['id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-project.php?id=<?php echo $row_project['id']; ?>'><i class='fa fa-trash'></i></a></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
            </div>
            
        </div>
    </div>

    
</body>
</html>