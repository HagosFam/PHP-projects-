<?php 
error_reporting(0);

if(isset($_GET['id'])){

   $sql = "DELETE FROM drugs WHERE id ='".$_GET['id']."'";
   $result = mysqli_query($con,$sql);
   
   if($result){
	   $_SESSION['successMessage'] = "successfully removed";
	    header('Location:manageDrug.php');
   }else{
	   
	   $_SESSION['errorMessage'] =mysqli_error($con);
	  header('Location:manageDrug.php');
   
   }

}else{
	
	$_SESSION['errorMessage'] =" sorry for the incovinence please try again";
  header('Location:../index.php');


}  // end if


?>