<?php
include('../includes/connection.php');
 error_reporting(0); ?>
<div class="row">
<div id="satus">


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
<div class="panel-heading"><h5 class="text-success"><span class="glyphicon glyphicon-pencil"></span>List Avaliable Stocks</h5></div>
<div class="panel-body">

<div class="remove-messages"></div>

<div class="div-action pul pull-right">

</div> <!-- end of div-action -->
<h4 class="text-info"><center>List of Avaliable Materials </center></h4>
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
  
      </tr>
    <?php }?>
    </tbody>

</table>



</div>  <!--  end panel body -->

</div> <!--  end panel default-->

</div>  <!-- end  col-md-12-->

</div> <!-- end row -->
