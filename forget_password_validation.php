<?php
session_start();
include ("includes/connection.php");
if(isset($_POST['recover'])){
  $useremName = $_POST['email'];
  $sql = "select * from account where email = '".$_POST['email']."'";
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result)){
  	$row = mysqli_fetch_assoc($result);
  	$_SESSION['yourPassword'] =$row['no_hash'];
  	$_SESSION['successMessage'] = "you have recovered your password please try to login with that password";
  	header("LOCATION:login.php");
  }
  else{
  	$_SESSION['errorMessage']="no user found with that Email";
    header("LOCATION:forget_password.php");
  }

}


?>