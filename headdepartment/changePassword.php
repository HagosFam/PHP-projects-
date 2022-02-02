<?php
error_reporting(0);
include('../includes/connection.php');
if(isset($_POST['update_password'])){

	$new_password = $_POST['new_password'];

	$sql_update_password = "UPDATE users SET passWord= '$new_password' WHERE id = '".$_SESSION['id']."'";
	$result_update_password = mysqli_query($con,$sql_update_password);

	 if($result_update_password){

			$_SESSION['successMessage'] = "You have changed Your password successfully, You have to user the new password from now onwards";
				header('location:changePassword.php');
		}

	else {
		$_SESSION['errorMessage'] = "Some thing goes wrong Please try again";
		header('location:changePassword.php');
	}

}

?>
<div class="col-md-12">
<?php

	$sql_passowrd = "SELECT passWord from users WHERE userName = '".$_SESSION['userName']."'";
	$result_password = mysqli_query($con,$sql_passowrd);

	$row = mysqli_fetch_assoc($result_password);

	$password = $row['passWord'];


	?>

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

	<form action="" method="POST" id="update_password" class="form-horizontal ">

   <br>

<h4 class="text-center text-info">Changing Perosnal Password</h4>
<hr>
<hr>


<input type="hidden" name="hidden" id="hidden" value="<?php echo $password;?>">

<div class="form-group">
			<label class="control-label col-sm-4" for="current_password">Current Password:</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control required" id="current_password" name="current_password"
			placeholder = "Enter your current password">
			</div>
		 </div>

		 <div class="form-group">
			<label class="control-label col-sm-4" for="new_password">New Password:</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control required" id="new_password" name="new_password" placeholder="enter new password" >
			</div>
		 </div>

		 <div class="form-group">
			<label class="control-label col-sm-4" for="confirm_password">Confirm Newpassword:</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control required" id="confirm_password" name="confirm_password"
			  >
			</div>
		 </div>

		 <hr>
<div class="form-group">

        		   <div class="col-md-offset-6">

        			<button class="btn btn-success" type="submit" name="update_password">Update</button>
        		</div>

       			 </div>

	</form>


</div>

<script>

$(document).ready(function(){

	$('#update_password').validate({

rules : {
	confirm_password:
	 {
	equalTo : '#new_password'
	},

			current_password: {
					equalTo : '#hidden'
					}
	       	} ,// end of rules
messages : {

confirm_password : {
				equalTo : "Confirmtion Password is not Equal to the password.",
			    required:"Please fill this field first to continue"


			},

current_password : {
				equalTo : "Your current passward is incorrect.",
			    required:"Please fill this field first to continue"


			},



} // end of messages
}); // end of validate



}); // end of ready function



</script>
