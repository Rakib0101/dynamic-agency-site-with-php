<?php 
    include 'header.php';
    include 'config.php';
?>
    <div class="col-md-10 mainbar">
              <!-- Form -->
                  <div class="mt-3">
                        <h2>Add new team member.</h2>
                        <form action="save-team.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Member Name</label>
                            <input type="text" name="tname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position name</label>
                            <input type="text" name="tpos" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="timg" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Twitter link</label>
                            <input type="text" name="ttwi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fb link</label>
                            <input type="text" name="tfb" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pinterest link</label>
                            <input type="text" name="tpin" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>LinkedIN link</label>
                            <input type="text" name="tlin" class="form-control">
                        </div>
                        <br/>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
    </div>
</div>
</body>
</html>