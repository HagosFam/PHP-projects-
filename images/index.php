<?php

  session_start();

       if(!isset($_SESSION['id'])){
		$_SESSION['errorMessage']="Please Login First";
		header('location:../login.php');
		
		
		
	}
 else {
	 
	 header('LOCATION:../admin/indexAdmin.php');
 }



?>