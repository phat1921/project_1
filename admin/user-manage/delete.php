<?php  
session_start();
	if(!isset($_SESSION["Sadmin"])){
		header("Location:user_manage.php?err=1");
	}else{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			// mở kết nối database
			include("../../connect/open.php");
			
			$sql = "UPDATE customer SET status = 1 WHERE id_user =".$id;
			$resultCus = mysqli_query($con,$sql);
			header("Location:user_manage.php");
			
			include("../../connect/close.php");

		}else{
			header("Location:user_manage.php");
		}
	}
	
?>