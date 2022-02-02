<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV|Forget Password</title>
    <!-- styles -->
	 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/united.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet">
    <!--  favucib for different medias -->
    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>

   
   
    <!-- jQuery for some effects -->
    <script type="text/javascript">
    $(document).ready(function() {
         $('.alert').click(function(){
		   
		   $(this).hide(500);
		    
		 }); //end onclick 

       $('#userName').focus(); // end of foucs
  

       }); // end of create accounte click


    }); // end ready
    </script>

  </head>
  <body >
  
  <!-- Main Navigation ends here -->
  <?php include('includes/header.php')?>

 <!-- Main Navigation ends -->

		
  <!-- Content Area Wrapper Starts -->
  
  <div class="container">  
 
 
<!--   Status Message display block ,like errorMessage,successMessage --> 
  
   <?php 
  if(isset($_SESSION['errorMessage'])){
         include('includes/displayErrorMessage.php');
		  unset($_SESSION['errorMessage']);
  }
  
  // success message
  
  if(isset($_SESSION['successMessage'])){
         include('includes/displaySuccessMessage.php');
         unset($_SESSION['successMessage']);
  }?>
  
  
     <div class="row ">
        <div class="col-md-6 col-xs-offset-3" style="border-radius:10px;">

        <div class="panel panel-success">
        
         <div class="panel-heading lead"
          style="font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana,  sans-serif;"><center>
           please enter your email to recover your passowrd
         </center></div>
 			 <div class="panel-body">
           <!-- the log in form starts -->
			 <form class="form-horizontal forms" action="forget_password_validation.php" method="post">
    
     			 <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email:</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required="required">
                </div>
      </div>
     
     		<div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-10">
          <button type="submit" class="btn btn-success btn" name="recover">Recover</button>
          
        </div>
      </div>
      
      
    </form>
  
 			 </div>
  	 </div>          

  </div>
      
  </div> 
</div>  <!-- Content Area wrapper ends -- >


<!-- modal for registration --->




 

  <div>
    
  


  </div>

<!--footer starts -->
<?php include('includes/footer.php')?>
<!-- footer Ends -->


</body>
</html>