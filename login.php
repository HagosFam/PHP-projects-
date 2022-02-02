<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
	   <link rel="stylesheet" type="text/css" href="CSS/united.css">
      <link rel="stylesheet" type="text/css" href="CSS/stylee.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.2.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
  <script src="js/jquery.validate.min.js"></script>        
<script>
	
	$(document).ready(function(){
		
		$('.forms').validate();
	});
	
	</script>

<style>
	
	
	.error{
		color:#E7060A;
	}	
	
	
</style>
  </head>
  <body>
  


<nav class="navbar  navbar-inverse" style="padding-bottom:30px;">
  <div class="container" style="margin-top:20px;">
    <!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
        
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

</button>
	<img src="images/microlink.jpg" alt="">
<a class="navbar-brand" href="#">Stock Management System (SMS) For Fitsum Birhan Eye Clinic</a>
</div>
 
   <!-- Collect the nav links, forms, and other content for toggling -->

</div>
</nav>

<!--  here ends the naviagaion part  -->

<div class="container" id="body" style="margin-top:50px; "> 
<div class="row">    
<div id="satus">   

<?php 
if(isset($_SESSION['errorMessage']))
              {
					include ("includes/displayErrorMessage.php");                        
					unset($_SESSION['errorMessage']);
					  
              }

              // success message
              
              if(isset($_SESSION['successMessage'])){
               include ("includes/displaySuccessMessage.php");
			      unset($_SESSION['successMessage']);
              }

         if(isset($_SESSION['yourPassword'])){
                echo '<h5> your forgotted Passowrd = '.$_SESSION['yourPassword'].'</h5>';
                unset($_SESSION['yourPassword']);
              }?>

              
              
          </div>
     
      <div class="col-md-6 col-xs-offset-3" style="border-radius:10px;">

        <div class="panel panel-success">
        
         <div class="panel-heading lead"
          style="font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana,  sans-serif;"><center>
           Sign In
         </center></div>
 			 <div class="panel-body">




           <!-- the log in form starts -->
		<form action="validations/login_validation.php" method="POST" class="form-horizontal forms">
    
     		 <div class="form-group">
                 <label class="control-label col-sm-4" for="userName">User Name:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control required"  id="userName" placeholder="Enter user name" name="userName"> <br>
					</div>
                
               </div>
    
			 <div class="form-group">
				<label class="control-label col-sm-4" for="pwd">Password:</label>
				<div class="col-sm-8"> 
				  <input type="password" class="form-control required"  id="pwd" placeholder="Enter password" name="password"> <br>
				</div>
			  </div>

		 
			 <div class="form-group"> 
				<div class="col-sm-offset-4 col-sm-10">
				  <button type="submit" class="btn btn-success btn" name="login">Log in</button>
				</div>
			  </div>
    </form>
    <hr>
   <button class="btn btn-success"> <a href="forget_password.php" class="text-danger" style="text-decoration: none; color: white;">Forgot Password</a></button>
  
 			 </div>
          
  	 </div>          

  </div>
          



</div>  

 
    <div class="container-fluid well navbar-fixed-bottom">
     
      <p class=" text-center " style="padding-top:10px; font-size:18px;">&copy;<?php echo date("Y");?> &nbsp;
         <span  class="text-success" style="padding-top:10px; font-size:18px;">
          All rights Reserved. BY SMS-Development Microlink Group</span>
      </p>
     
    </div>
       

  </body>
</html>