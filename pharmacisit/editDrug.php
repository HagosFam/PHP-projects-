
<?php
error_reporting(0);

if (isset($_POST['adddrug']))
{
 $id = $_POST['id'];	
$name = $_POST['name'];
$modelNumber = $_POST['modelNumber'];
$batchNumber = $_POST['batchNumber'];
$measurment = $_POST['measurment'];
$amount = $_POST['amount'];
$productionDate = $_POST['productionDate'];
$expiryDate = $_POST['expiryDate'];

  $sql = "UPDATE  drugs SET  name = '$name',
                             modelNumber  = '$modelNumber',
                             batchNumber  =  '$batchNumber' ,
                             measurment =  '$measurment',
                             amount =  '$amount',
                             productionDate = '$productionDate',   
                             expiryDate = '$expiryDate'   where id ='$id' ";
	
  $res = mysqli_query($con,$sql);

  if ($res)
  {
    $_SESSION['successMessage'] = 'Drug Updated Succesfully, You can check it';
    header('Location:addUsers.php');
  }
  else
  {
    $_SESSION['errorMessage'] = mysqli_error($con);
      header('Location:addUsers.php');
  }

}



 ?>



<div class="">

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

<center>You are Editing Drug</center>
</div>
<hr>

<?php 

if(isset($_GET['id']))
   {
$var = $_GET['id'];

	$query = "SELECT * from drugs where id='".$var."'    ";
	$fetch = mysqli_query($con,$query);
	$ex= mysqli_fetch_assoc($fetch);
	   
   }
?>

<form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="name"> Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $ex['name'] ?>" required id="name" name="name" placeholder="Enter drug Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="modelNumber">Model Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $ex['modelNumber'] ?>" required id="modelNumber" name="modelNumber" placeholder="Enter drug model Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="batchNumber">Batch Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $ex['batchNumber'] ?>" required id="batchNumber" name="batchNumber" placeholder="Enter Batch Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="measurment">Measurment:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $ex['measurment'] ?>" required id="measurment" name="measurment" placeholder="how is measured?">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="amount">Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $ex['amount'] ?>" required id="amount" name="amount" placeholder="Enter enter amount">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="productionDate">Production Date:</label>
                    <div class="col-sm-9">
                      <input type="date" value="<?php echo $ex['productionDate'] ?>" class="form-control" required id="productionDate" name="productionDate" placeholder="Enter
                       Production date of the drug">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="expiryDate">Expiry Date:</label>
                    <div class="col-sm-9">
                      <input type="date" value="<?php echo $ex['expiryDate'] ?>" class="form-control" required id="expiryDate" name="expiryDate" placeholder="Enter Batch Number">
                    </div>
                  </div>



          </div>
	
          <div class="modal-footer">
			  		<input type="hidden" value="<?php echo $ex['id']; ?>" name="id"/>
            <button type="submit" class="btn btn-success" id="adddrug" name="adddrug" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add Drug</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>
