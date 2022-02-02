
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
  Manage Drugs</h5></div>
<div class="panel-body">

<div class="remove-messages"></div>

<div class="div-action pul pull-right">


</div> <!-- end of div-action -->
<h4 class="text-success"><center>Top 10 New Drugs</center></h4>
<hr style="border:groove 1px #79D57E;"/>

<br/>

<table class="table" id="manageMaterialTable">

   <thead>

    <tr>

       <th>NO</th>
       <th>Name</th>
       <th>Model Number</th>
       <th>Batch Number</th>
       <th>Measurment</th>
       <th>Amount</th>
       <th>Production Date</th>
       <th>Expiry Date</th>
     
    </tr>
   </thead>
   <tbody>
 <?php
	
	   $today = date("Y-M-Y");

 $sql ="SELECT * FROM drugs ORDER BY id DESC LIMIT 10 ";	   
$result = mysqli_query($con,$sql);   
$material = mysqli_fetch_assoc($result);
	   

	   
      $counter =0;
 while($material = mysqli_fetch_assoc($result)){
  ?>  <tr>
     <td><?php echo ++$counter;?></td>
     <td><?php echo $material['name'];?></td>
      <td><?php echo $material['modelNumber'];?></td>
       <td><?php echo $material['batchNumber'];?></td>
        <td><?php echo $material['measurment'];?></td>
        <td><?php echo $material['amount'];?></td>
     <td><?php echo $material['productionDate'];?></td>
     <td><?php echo $material['expiryDate'];?></td>
  

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
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Add New Drugs</h4>
      </div>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="name"> Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="name" name="name" placeholder="Enter drug Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="modelNumber">Model Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="modelNumber" name="modelNumber" placeholder="Enter drug model Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="batchNumber">Batch Number:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="batchNumber" name="batchNumber" placeholder="Enter Batch Number">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="measurment">Measurment:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="measurment" name="measurment" placeholder="how is measured?">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="amount">Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" required id="amount" name="amount" placeholder="Enter enter amount">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="productionDate">Production Date:</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" required id="productionDate" name="productionDate" placeholder="Enter
                       Production date of the drug">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="expiryDate">Expiry Date:</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" required id="expiryDate" name="expiryDate" placeholder="Enter Batch Number">
                    </div>
                  </div>



          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="adddrug" name="adddrug" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add Drug</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>  <!-- end modal content -->

  </div> <!-- end dialog -->
</div>  <!-- end modal-->
