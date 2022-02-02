<?php error_reporting(0);

if(isset($_GET['id'])){

   $sql = "DELETE FROM materials WHERE id ='".$_GET['id']."'";
   $result = mysqli_query($con,$sql);
   
   if($result){
	   $_SESSION['successMessage'] = "Material successfully removed";
	    header('Location:manageerrrrrrrDrug.php');
   }else{
	   
	   $_SESSION['errorMessage'] =mysqli_error($con);
	  header('Location:managefDfgsrug.php');
   
   }

}


?>







<?php
//error_reporting(0);

if (isset($_POST['addDevice']))
{
$name = $_POST['materialName'];
$modelNumber = $_POST['modelNumber'];
$serialNumber = $_POST['serialNumber'];
$measurment = $_POST['measurment'];
$amount = $_POST['amount'];
$productionDate = $_POST['productiondate'];
$expiryDate = $_POST['expirydate'];

$sql = "INSERT INTO materials(materialName,modelNumber,serialNumber,measurment,amount,productionDate,expiryDate)
Values('$name','$modelNumber','$serialNumber','$measurment','$amount','$productionDate','$expiryDate')   ";
$beka  = mysqli_query($con,$sql);

if ($beka)
 {
   $_SESSION['successMessage'] = 'Material Created!';
   header('Location:addDevice.php');
}
else {
  $_SESSION['errorMessage'] = mysqli_error($con);
    header('Location:addDevice.php');
}




}

 ?>

<div class="row">
<div id="satus">
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
<div class="panel-heading"><h5 class="text-success"><span class="glyphicon glyphicon-pencil"></span>Manage Devices</h5></div>
<div class="panel-body">

<div class="remove-messages"></div>

<div class="div-action pul pull-right">

<button class="btn btn-info" data-toggle="modal" data-target="#addMaterialodal">
    <span class="glyphicon glyphicon-plus-sign"></span>Add New Devices
</button>

</div> <!-- end of div-action -->
<h4 class="text-info"><center>List of Materials </center></h4>
<hr style="border:groove 1px #79D57E;"/>

<br/>



<table class="table" id="manageMaterialTable">

   <thead>

    <tr>

       <th>NO</th>
       <th>Material Name</th>
       <th>Model Number</th>
       <th>Serial Number</th>
       <th>Measurment</th>
       <th>Amount</th>
       <th>Production Date</th>
       <th>Expiry Date</th>
       <th style="width:15%;">Options</th>
     <th></th>
    </tr>

   </thead>

   <tbody>
 <?php

      $sql = "SELECT * FROM materials";
      $result = mysqli_query($con,$sql);
      $counter =0;
 while($material = mysqli_fetch_assoc($result)){

  ?>

      <tr>

     <td><?php echo ++$counter;?></td>
     <td><?php echo $material['materialName'];?></td>
      <td><?php echo $material['modelNumber'];?></td>
       <td><?php echo $material['serialNumber'];?></td>
        <td><?php echo $material['measurment'];?></td>
         <td><?php echo $material['amount'];?></td>
         <td><?php echo $material['productionDate'];?></td>
          <td><?php echo $material['expiryDate'];?></td>

	    <td>
 <a href="<?php echo'index.php?page=editDevice&id='.$material['id'];?>" style="text-decoration:none;"><button class="btn btn-info ">Edit </button></a>

       </td>

      <td>
  <a href="<?php echo'index.php?page=addDevices&id='.$material['id'];?>" style="text-decoration:none;"><button class="btn btn-danger">Delete </button></a>
	   
	   </td>

      </tr>
    <?php }?>
    </tbody>

</table>


</div>  <!--  end panel body -->

</div> <!--  end panel default-->

</div>  <!-- end  col-md-12-->

</div> <!-- end row -->


<div id="addMaterialodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Add New Device</h4>
      </div>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="materialName">Material Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="materialName" name="materialName" placeholder="Enter material Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="modelNumber">Model Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="modelNumber" name="modelNumber" placeholder="Enter model number ">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="serialNumber">Serial Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="serialNumber" name="serialNumber" placeholder="Enter serial Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="measurment">Measurment:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="measurment" name="measurment" placeholder="how is measured like number etc">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="amount">Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="amount" name="amount" placeholder="Enter material Name">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-sm-3" for="productiondate">Production Date:</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" required name="productiondate"   id="productiondate"
                       placeholder="Enter material Quantity">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="expirydate">Expiry Date:</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control"  required name="expirydate"   id="expirydate"
                       placeholder="Enter material Quantity">
                    </div>
                  </div>




          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="addMaterialBtn" name="addDevice" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>  <!-- end modal content -->

  </div> <!-- end dialog -->
</div>  <!-- end modal-->
