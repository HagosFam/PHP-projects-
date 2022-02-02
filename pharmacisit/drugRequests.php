<div class="row">

<div id="status">

             <?php
            if(isset($_SESSION['errorMessage'])){
        include ("../../includes/displayErrorMessage.php");
        unset($_SESSION['errorMessage']);

            }


            // success message

            if(isset($_SESSION['successMessage'])){
             include ("../../includes/displaySuccessMessage.php");
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

<button class="btn btn-info" data-toggle="modal" data-target="#addMaterialodal">
    <span class="glyphicon glyphicon-plus-sign"></span>Add Drugs
</button>

</div> <!-- end of div-action -->
<h4 class="text-success"><center>List of Drugs</center></h4>
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
      <td><?php echo $material['materialName'];?></td>
       <td><?php echo $material['materialName'];?></td>
        <td><?php echo $material['materialName'];?></td>
        <td><?php echo $material['materialName'];?></td>

     <td><button class="<?php
           if($material['materialStatus']=="avaliable")
         echo 'btn btn-success';
         else
         echo 'btn btn-danger';?>">

    <?php echo $material['materialStatus'];?></button></td>
     <td><?php echo $material['materialQuantity'];?></td>

      <td>
           <a href="<?php echo'editMaterial.php?materialId='.$material["materialId"];?>"

                style="text-decoration:none;">

           <button class="btn btn-info ">

               <span class="glyphicon glyphicon-edit"></span>

              &nbsp;

       Edit</button></a>

       </td>

      <td>
   <a href="<?php echo'deleteMaterial.php?materialId='.$material["materialId"];?>"

        style="text-decoration:none;">

   <button class="btn btn-danger ">

       <span class="glyphicon glyphicon-remove-sign"></span>

      &nbsp;
       Delete</button></a></td>

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
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>Add New Material</h4>
      </div>

      <form class="form-horizontal" role="form" id="addMaterialForm" method="post" action="">


          <div class="modal-body">
            <!-- the form content goes here -->

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="materialName">Material Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="materialName" name="materialName" placeholder="Enter material Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="materialStatus">Material Status:</label>
                    <div class="col-sm-9">
                       <select name="materialStatus" id="materialStatus" class="form-control">

                         <option value="">~~Select Status ~~</option>
                         <option value="avaliable">Avaliable</option>
                         <option value="notAvaliable">Not Avaliable</option>

                       </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="materialQuantity">material Quantity:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="materialQuantity"  id="materialQuantity" placeholder="Enter material Quantity">
                    </div>
                  </div>



          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="addMaterialBtn" name="addMaterialBtn" data-loading-text="Loading.." >
            <span class="glyphicon glyphicon-plus-sign"></span>Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>  <!-- end modal content -->

  </div> <!-- end dialog -->
</div>  <!-- end modal-->
