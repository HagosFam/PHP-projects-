<?php session_start();


if(!isset($_SESSION['id'])){

	 include("../session_control/no_login_no_access_level_1.php");
 }

$userId = $_SESSION['id'];
?>
<?php $username = $_SESSION['userName']; ?>
<?php //include("../includes/connection.php"); ?>
<?php if(isset($_GET['page']))
{
	$page = $_GET['page'];

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fitsum Birhan SMS</title>

<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../CSS/united.css">
<link rel="stylesheet" type="text/css" href="../CSS/jquery.dataTables.css">
<script src="../js/jquery-1.11.2.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/jquery.dataTables.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>



<script>

	$(document).ready(function(){

		$('.forms').validate();
		$('.table').dataTable();
	});

	</script>

<style>


	.error{
		color:#E7060A;
	}


</style>

<style media="print">

	.noPrint{

		display: none;
	}


</style>
</head>
<body style="background-color: white;">

<!-- begins the navigation -->

<!-- begins the navigation -->
<?php include ("../includes/headerphar.php");?>


<!-- here ends the navigation part -->

<div class="container">

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

  <div class="col-md-4 noPrint">


          <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingFive">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
								 aria-expanded="true" aria-controls="collapseFive"><span class="glyphicon glyphicon-user">
								 </span>Pharmacist Activities</a>
              </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse in  well" role="tabpanel" aria-labelledby="headingFive">
              <div class="panel-body">

      <a href="index.php?page=manageDrug">Manage Drugs</a>  <br>
      <a href="index.php?page=expiredDrugs">Expired Drugs</a>  <br>
      <a href="index.php?page=newDrug">New Drugs</a>  <br>

  </div>
</div>
</div>





          <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingFivee">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFivee"
								 aria-expanded="true" aria-controls="collapseFivee"><span class="glyphicon glyphicon-user">
								 </span>Manage Notifications</a>
              </h4>
            </div>
            <div id="collapseFivee" class="panel-collapse collapse in  well" role="tabpanel" aria-labelledby="headingFivee">
              <div class="panel-body">

      <a href="index.php?page=sendNotification">Send Notifications</a>  <br>
  </div>
</div>
</div>

              <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="heading2">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2"><span class="glyphicon glyphicon-user"></span>Account Setting</a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse in  well" role="tabpanel" aria-labelledby="headingFive">
              <div class="panel-body">

      <a href="index.php?page=editProfile">Edit Profile</a>  <br>
      <a href="index.php?page=changePassword">Change Password</a>  <br>
  </div>
</div>
</div>




  </div>



<div class="col-md-8">

               <?php  if(isset($_GET['page'])&& file_exists($page .'.php'))
	             include($page .'.php');
				?>




</div>


 </div>

 </div>



<nav class=" navbar well navbar-fixied-bottom">
    <div class="container-fluid">

      <p class=" text-center " style="padding-top:10px; font-size:18px;">&copy;<?php echo date("Y");?> &nbsp;
         <span  class="text-success" style="padding-top:10px; font-size:18px;">
          All rights Reserved. BY Stock Management development Group</span>
      </p>

    </div>
    <!-- /.container -->

</nav>


</body>
</html>
