<?php //include('../includes/connection.php'); ?>
<?php
error_reporting(0);
include('../includes/connection.php');
if (isset($_POST['request']))
{
$depname = $_POST['departmentName'];
$material= $_POST['materialName'];
$status = 'noteResponded';


$sql = "INSERT INTO devicerequest(departmentName,deviceName,status) values('$depname','$material','$status') ";
$results = mysqli_query($con,$sql);

if ($results)
 {
   $_SESSION['successMessage'] = 'Device Request Sent!';
   header('Location:requestDevice.php');
}
else {
  $_SESSION['errorMessage'] = mysqli_error($con);
    header('Location:requestDevice.php');
}


}

 ?>

<?php
$username = $_SESSION['userName'];

  $sql = "SELECT * from materials  ";

  $result = mysqli_query($con,$sql);
  ?>
<div class="">
<center>Request Device</center>
</div>
<hr>


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


<form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">

<?php   $sql = "SELECT * from department where  ";

  $result1 = mysqli_query($con,$sql); ?>

  <div class="form-group">
    <label class="control-label col-sm-3" for="departmentName">Department Name:</label>
    <div class="col-sm-9">

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
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button type="submit" class="btn btn-success"
      name="request">Send Device Request</button> </center>
  </div>


</form>
