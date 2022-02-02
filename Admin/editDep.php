<?php 

$id = $_GET['id'];

$select = "SELECT * from department where id='".$id."'    ";
$done = mysqli_query($con,$select);
$user = mysqli_fetch_assoc($done);


?>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-edit"></span>Editing Departments</h4>
      </div>
<?php

  $sql = "SELECT * from users where role='dephead'  ";

  $result = mysqli_query($con,$sql);
  ?>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="departmentName">Department Name:</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $user['departmentName'] ?>" class="form-control" required id="departmentName" name="departmentName" placeholder="Enter department Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="departmentId">Department ID:</label>
                    <div class="col-sm-9">
                      <input type="text" value="<?php echo $user['departmentId'] ?>" class="form-control" required id="departmentId" name="departmentId" placeholder="Enter department ID	 ">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="departmentId">Department Head:</label>
                    <div class="col-sm-9">
                      <select class="form-control" value="<?php echo $user['departmentHead'] ?>" required required name="departmentHead" id="depHead">
                        <option>~Select Head Department~</option>
                           <?php  while($place = mysqli_fetch_assoc($result)){ ?>

                               <option value="<?php echo $place['fullname'];?>"><?php echo $place['fullname'];?></option>

                         <?php } ?>

                      </select>
                          </div>
                  </div>



          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="addMaterialBtn" name="addDepartment" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>