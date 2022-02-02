<?php 
error_reporting(0);

if(isset($_GET['id'])){

   $sql = "DELETE FROM department WHERE id ='".$_GET['id']."'";
   $result = mysqli_query($con,$sql);
   
   if($result){
	   $_SESSION['successMessage'] = "material successfully removed";
	    header('Location:manageDrug.php');
   }else{
	   
	   $_SESSION['errorMessage'] =mysqli_error($con);
	  header('Location:manageDrug.php');
   
   }

}


?>


<?php
//error_reporting(0);
if (isset($_POST['addDepartment']))
{
  $depid = $_POST['departmentId'];
  $depname = $_POST['departmentName'];
  $dephead = $_POST['departmentHead'];

  $sql = "INSERT INTO department(departmentId,departmentName,departmentHead)
                          values('$depid','$depname','$dephead')";
  $res = mysqli_query($con,$sql);

  if ($res)
  {
    $_SESSION['successMessage'] = 'Department Created! Head Department Assigned';
    header('Location:addDepartment.php');
  }
  else
   {
    $_SESSION['errorMessage'] = mysqli_error($con);
      header('Location:addDepartment.php');
  }

}
?>
<div class="row">
<div id="status">
             <?php

            if(isset($_SESSION['errorMessage'])){
        include ("../includes/displayErrorMessage.php");
        unset($_SESSION['errorMessage']);
            }
            // success message
            if(isset($_SESSION['successMessage'])){
             include ("../includes/displaySuccessMessage.php");
          unset($_SESSION['successMessage']);
            }?>
        </div>

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5 class="text-success"><span class="glyphicon glyphicon-pencil"></span>
  Manage Departments</h5></div>
<div class="panel-body">
<div class="remove-messages"></div>

<div class="div-action pul pull-right">

<button class="btn btn-info" data-toggle="modal" data-target="#addMaterialodal">
    <span class="glyphicon glyphicon-plus-sign"></span>Add Department
</button>

</div> <!-- end of div-action -->
<h4 class="text-success"><center>List of Departments</center></h4>
<hr style="border:groove 1px #79D57E;"/>

<br/>

<table class="table" id="manageMaterialTable">

   <thead>

    <tr>

       <th>NO</th>
       <th>Department Name</th>
       <th>Department ID</th>
       <th>Department Head</th>
       <th style="width:15%;">Options</th>
     <th></th>
    </tr>

   </thead>

   <tbody>
 <?php

      $sql = "SELECT * FROM department";
      $result = mysqli_query($con,$sql);
      $counter =0;
 while($material = mysqli_fetch_assoc($result)){

  ?>

      <tr>

     <td><?php echo ++$counter;?></td>
     <td><?php echo $material['departmentId'];?></td>
     <td><?php echo $material['departmentName'];?></td>
     <td><?php echo $material['departmentHead'];?></td>


     <td>
 <a href="<?php echo'index.php?page=editDep&id='.$material['id'];?>" style="text-decoration:none;"><button class="btn btn-info ">Edit </button></a>

       </td>

      <td>
  <a href="<?php echo'index.php?page=addDepartment&id='.$material['id'];?>" style="text-decoration:none;"><button class="btn btn-danger ">Delete </button></a>
	   
	   </td>

      </tr>
    <?php }?>
    </tbody>

</table>


</div>  <!--  end panel body -->

</div> <!--  end panel default-->

</div>  <!-- end  col-md-12-->

</div> <!-- end row -->

<!-- fetching head departments  -->
<?php

  $sql = "SELECT * from users where role='dephead'  ";

  $result = mysqli_query($con,$sql);
  ?>


<div id="addMaterialodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Add New Department</h4>
      </div>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="departmentName">Department Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="departmentName" name="departmentName" placeholder="Enter department Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="departmentId">Department ID:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="departmentId" name="departmentId" placeholder="Enter department ID	 ">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="departmentId">Department Head:</label>
                    <div class="col-sm-9">
                      <select class="form-control" required required name="departmentHead" id="depHead">
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
    </div>  <!-- end modal content -->

  </div> <!-- end dialog -->
</div>  <!-- end modal-->
