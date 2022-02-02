<!-- fetching head departments  -->
<?php
error_reporting(0);
include('../includes/connection.php');
if (isset($_POST['Maintenace']))
{
$dep = $_POST['departmentName'];
$material = $_POST['materialName'];
$error = $_POST['errorType'];
$failuredate = $_POST['failureDate'];
$status = 'notmaintained';

$sql = "INSERT INTO maintenance(departmentName,materialName,typeError,failureDate,status)
Values('$dep','$material','$error','$failuredate','$status') ";
$res = mysqli_query($con,$sql);

if ($res)
 {
   $_SESSION['successMessage'] = 'Maintenace Request Sent!';
   header('Location:MaintenaceRequest.php');
}
else {
  $_SESSION['errorMessage'] = mysqli_error($con);
    header('Location:MaintenaceRequest.php');
}



}

 ?>



<?php
$username = $_SESSION['userName'];

  $sql = "SELECT * from materials  ";

  $result = mysqli_query($con,$sql);
  ?>


<div class="well">
<center>Request Device Maintenace</center>
</div>
<hr>
<form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


  <div class="form-group">
    <label class="control-label col-sm-3" for="departmentName">Department Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" required id="departmentName" name="departmentName" placeholder="Enter Department Name">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-3" for="materialName">Material Name:</label>
    <div class="col-sm-9">
      <select class="form-control" required name="materialName" id="materialName">
        <option>~Select Material Name~</option>
           <?php  while($place = mysqli_fetch_assoc($result)){ ?>

               <option value="<?php echo $place['id'];?>"><?php echo $place['materialName'];?></option>

         <?php } ?>

      </select>
          </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="errorType">Type Error:</label>
    <div class="col-sm-9">
      <textarea id="errorType" name="errorType" required placeholder="Enter Error Type" rows="8" cols="75"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="failureDate">Failure Date:</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" required id="failureDate" name="failureDate" placeholder="Enter Department Name">
    </div>
  </div>


  <div class="btn btn-area">
  <center> &nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <button type="submit" class="btn btn-success" name="Maintenace">Send Device Request</button> </center>
  </div>


</form>
