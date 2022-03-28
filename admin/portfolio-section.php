        <?php 
            include 'header.php';
             include "config.php";
          
        ?>
        <div class="col-md-10 mainbar">
            <div class="main-area col-md-8 ">
                <div class="mb-5">
                     <h2>Portfolios</h2>
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
                                <td class='delete'><a href="delete-project.php?id=<?php echo $row_p['id']?>"><i class='fa fa-trash'></i></a></td>
                            </tr>
                           <?php }}?> 
                        </tbody>
                    </table>

                     <div class="mt-3">
                        <h2>Add new services.</h2>
                        <form action="save-portfolio.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>project Name</label>
                            <input type="text" name="pname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Project description</label>
                            <textarea class="form-control" name="pdesc" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Project Image</label>
                            <input type="file" name="pimg" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Category</label>
                            <select name="pcat"  class="form-control">
                               <option disabled>Select Category</option>
                               <?php 
                               $sql = "SELECT * FROM portfolio_category";
                               
                               $result = mysqli_query($conn, $sql) or die('query failed');
                               if(mysqli_num_rows($result) > 0){
                                   while($row = mysqli_fetch_assoc($result)){
                                       echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                                   }
                               }
                               
                               ?>        
                            </select>
                        </div>
                        <div class="form-group">
                            <label>project Client</label>
                            <input type="text" name="pclient" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>project Url</label>
                            <input type="text" name="purl" class="form-control">
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>