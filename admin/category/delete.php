<?php  
session_start();
	if(!isset($_SESSION["Sadmin"])){
		header("Location:indexCate.php?err=1");
	}else{
		if(isset($_GET["id"])){
		$id = $_GET["id"];
		// mở kết nối database
		include("../../connect/open.php");
		
		$sql = "DELETE FROM detail_category WHERE id =".$id;
		$resultCate = mysqli_query($con,$sql);
		header("Location:indexCate.php");
		
		include("../../connect/close.php");

	}else{
		header("Location:indexCate.php");
	}
	}
 
	
?>