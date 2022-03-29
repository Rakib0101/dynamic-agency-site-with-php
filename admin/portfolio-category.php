        <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your portfolio section from here</h2>
            <div class="row">
                <div class="col-md-6"><h3>All Categories</h3></div>
                <div class="col-md-6">
                    <a href="add-category.php" class="bg-dark text-light px-4 py-1 rounded text-end">Add New Category</a>
                </div>
            </div>
            <div class="mt-3 overflow-scroll">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Number of Projects</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql_projects = "SELECT * FROM portfolio_category";
                                $result_projects = mysqli_query($conn, $sql_projects) or die("Query Failed.");
                                if(mysqli_num_rows($result_projects) > 0){
                                    while($row_project = mysqli_fetch_assoc($result_projects)){
                                ?>
                            <tr>
                                <td><?php echo $row_project['id']; ?></td>
                                <td><?php echo $row_project['category_name']; ?></td>
                                <td><?php echo $row_project['projects']; ?></td>
                                <td class='edit'><a href='update-category.php?id=<?php echo $row_project['id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-category.php?id=<?php echo $row_project['id']; ?>'><i class='fa fa-trash'></i></a></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
            </div>
            
        </div>
    </div>

    
</body>
</html>