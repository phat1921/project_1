<?php  
session_start();
	if(!isset($_SESSION["Sadmin"])){
		header("Location:indexPro.php?err=1");
	}else{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			// mở kết nối database
			include("../../connect/open.php");
			
			$sql = "DELETE FROM products WHERE id_products =".$id;
			$resultPro = mysqli_query($con,$sql);
			header("Location:indexPro.php");
			
			include("../../connect/close.php");

		}else{
			header("Location:indexPro.php");
		}
	}
	
?>