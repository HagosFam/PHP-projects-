<?php

session_start();

include('../includes/connection.php');

if(isset($_POST['login'])){


	$user_name = $_POST['userName'];
	$password = $_POST['password'];

	$sql_check_user = "SELECT * FROM users WHERE userName = '$user_name' AND passWord = '$password'  ";
	$result_check_user = mysqli_query($con,$sql_check_user);

	if(mysqli_num_rows($result_check_user)>=1){

		$row_user = mysqli_fetch_array($result_check_user);

		$_SESSION['userName'] = $row_user['userName'];
		$_SESSION['id'] = $row_user['id'];
		$_SESSION['successMessage'] = "Wel come back ".$user_name."   You have Successfully logged In";



		if($row_user['role'] == 'admin'){

			header("LOCATION:../Admin/index.php");
		}

		if($row_user['role'] == 'dephead'){

		 header("LOCATION:../headdepartment/index.php");		}

		if($row_user['role'] == 'pharmacist'){

			header("LOCATION:../pharmacisit/index.php");
		}



	}else{
		$_SESSION['errorMessage'] = "Incorrect Password Or user Name  or possibly your account is inactive";
	header('LOCATION:../login.php');
	}

}else {
	$_SESSION['errorMessage'] = "Please Login First";
	header('LOCATION:../login.php');
}

?>
