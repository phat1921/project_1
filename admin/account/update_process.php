<?php  
	session_start();
	include("../../connect/open.php");
	if(isset($_SESSION["Sadmin"])){
		$user = $_SESSION["Sadmin"];
		$check = mysqli_query($con , "SELECT * FROM admin WHERE username = '$user'");
		if($check != null){
			$row = mysqli_fetch_array($check);
			$id_admin = $row["id_admin"];

		}
		
		if(isset($_POST["name"]) && isset($_POST["sex"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) ){
		$name = $_POST["name"] ;
		if($_POST["sex"] == 'nữ' || $_POST["sex"] == 'Nữ' || $_POST["sex"] == 'NỮ' || $_POST["sex"] == 'nỮ' ){
				$sex = 0;
			}else{
				$sex = 1;
			}
		$pass = $_POST["pass"] ;
		$email = $_POST["email"] ;
		$phone = $_POST["phone"] ;
		$address = $_POST["address"] ;

			
			$updateSA = mysqli_query($con, "UPDATE admin SET name = '$name', email = '$email',  password = '$pass', phone_number = '$phone', sex = '$sex', address = '$address' WHERE id_admin = '$id_admin' ");
			header("location:info.php");

			
		}




	}elseif(isset($_SESSION["admin"])){
		$user = $_SESSION["admin"];
		$check = mysqli_query($con , "SELECT * FROM admin WHERE username = '$user'");
		if($check != null){
			$row = mysqli_fetch_array($check);
			$id_admin = $row["id_admin"];

		}
		
		if(isset($_POST["name"]) && isset($_POST["sex"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) ){
		$name = $_POST["name"] ;
		if($_POST["sex"] == 'nữ' || $_POST["sex"] == 'Nữ' || $_POST["sex"] == 'NỮ' || $_POST["sex"] == 'nỮ' ){
				$sex = 0;
			}else{
				$sex = 1;
			}
		$pass = $_POST["pass"] ;
		$email = $_POST["email"] ;
		$phone = $_POST["phone"] ;
		$address = $_POST["address"] ;

			
			$updateSA = mysqli_query($con, "UPDATE admin SET name = '$name', email = '$email',  password = '$pass', phone_number = '$phone', sex = '$sex', address = '$address' WHERE id_admin = '$id_admin' ");
			header("location:info.php");

			
		}




	}else{
		header("location:info.php");
	}
	include("../../connect/close.php");
?>