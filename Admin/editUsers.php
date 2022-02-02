<?php 

$id = $_GET['id'];

$select = "SELECT * from users where id='".$id."'    ";
$done = mysqli_query($con,$select);
$user = mysqli_fetch_assoc($done);


?>
  <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Editing Users</h4>
  

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Full Name:</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $user['fullname'] ?>" required class="form-control" id="name" name="name" placeholder="Enter user full Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="gender">Gender:</label>
                    <div class="col-sm-9">
                       <select name="gender" value="<?php echo $user['gender'] ?>" required id="gender" class="form-control">

                         <option value="">~~Select Gender ~~</option>
                         <option value="f">Female</option>
                         <option value="m">Male</option>

                       </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="phone">Phone:</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $user['phone'] ?>" class="form-control" required id="phone" name="phone" placeholder="Enter phone number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $user['email'] ?>" class="form-control" required id="email" name="email" placeholder="Enter Email Address">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="profession">Profession:</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $user['profession'] ?>" class="form-control" required id="profession" name="profession" placeholder="Enter your profession">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required  name="password" value="12345" readonly  id="password"
                       placeholder="Enter material Quantity">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="role">Role:</label>
                    <div class="col-sm-9">
                       <select name="role" value="<?php echo $user['role'] ?>" required id="role" class="form-control">

                         <option value="">~~Select role ~~</option>
                         <option value="admin">Administrator</option>
                         <option value="pharmacist">Pharmacist</option>
                         <option value="dephead">Head Department</option>
                       </select>
                    </div>
                  </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="addMaterialBtn" name="addUser" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>