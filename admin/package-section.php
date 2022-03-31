        <?php 
            include 'header.php';
            include 'config.php';
        ?>
        <div class="col-md-10 mainbar">
            <h2>You can customize your package section from here</h2>
            <div class="row">
                <div class="col-md-6"><h3>All Packages</h3></div>
                <div class="col-md-6">
                    <a href="add-package.php" class="bg-dark text-light px-4 py-1 rounded text-end">Add New Package</a>
                </div>
            </div>
            <div class="mt-3 overflow-scroll">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Feature</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql_package = "SELECT * FROM package";
                                $result_package = mysqli_query($conn, $sql_package) or die("Query Failed.");
                                if(mysqli_num_rows($result_package) > 0){
                                    while($row_package = mysqli_fetch_assoc($result_package)){
                                ?>
                            <tr>
                                <td><?php echo $row_package['id']; ?></td>
                                <td><?php echo $row_package['package_name']; ?></td>
                                <td>
                                    <?php echo $row_package['package_price']; ?>
                                </td>
                                <td><?php 
                                        $string = $row_package['feature'];
                                        $str_arr = explode (",", $string); 
                                        foreach($str_arr as $str){
                                            echo "<li>{$str}</li>";
                                        }
                                    ?></td>
                                <td class='edit'><a href='update-package.php?id=<?php echo $row_package['id']; ?>'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'>
                                    <a href='delete-package.php?id=<?php echo $row_package["id"];?>'<i class='fa fa-trash'></i></a>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
            </div>
            
        </div>
    </div>

    
</body>
</html>