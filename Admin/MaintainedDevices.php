<?php error_reporting(0); ?>
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
<div class="panel-heading"><h5 class="text-success"><span class="glyphicon glyphicon-pencil"></span>Maintenace Requests</h5></div>
<div class="panel-body">

<div class="remove-messages"></div>

<div class="div-action pul pull-right">

</div> <!-- end of div-action -->
<h4 class="text-info"><center>Devices Maintained Sofar </center></h4>
<hr style="border:groove 1px #79D57E;"/>

<br/>

<table class="table" id="manageMaterialTable">

   <thead>

    <tr>

       <th>NO</th>
       <th>Department Name</th>
       <th>Material Name</th>
       <th>Error Type</th>
       <th>Failure Date</th>
       <th>Status</th>

    </tr>

   </thead>

   <tbody>
 <?php

      $sql = "SELECT * FROM maintenance where status='maintained' ";
      $result = mysqli_query($con,$sql);
      $counter =0;
 while($material = mysqli_fetch_assoc($result)){

  ?>

      <tr>

     <td><?php echo ++$counter;?></td>
       <td><?php echo $material['departmentName'];?></td>
        <td><?php echo $material['materialName'];?></td>
         <td><?php echo $material['typeError'];?></td>
         <td><?php echo $material['failureDate'];?></td>
     <td><button class="<?php
           if($material['materialStatus']=="maintained")
         echo 'btn btn-success';
         else
         echo 'btn btn-danger';?>">

    <?php echo $material['status'];?></button></td>



      </tr>
    <?php }?>
    </tbody>

</table>


</div>  <!--  end panel body -->

</div> <!--  end panel default-->

</div>  <!-- end  col-md-12-->

</div> <!-- end row -->
