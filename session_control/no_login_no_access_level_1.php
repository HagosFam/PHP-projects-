<?php 
   // session_start();

	if(!isset($_SESSION['id'])){
	
	$_SESSION['errorMessage'] = "Please Login First";
	header('LOCATION:../login.php');
}
