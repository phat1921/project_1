<?php  
session_start();
	if(!isset($_SESSION["Sadmin"])){
		header("Location:indexCate.php?err=1");
	}else{
		if(isset($_GET["id"])){
		$id = $_GET["id"];
		// mở kết nối database
		include("../../connect/open.php");
		$detailbill = mysqli_query($con,"DELETE FROM detail_bill WHERE id_bill =".$id);
		$sql = "DELETE FROM bill WHERE id_bill =".$id;
		$resultBill = mysqli_query($con,$sql);
		header("Location:delete-order.php");
		
		include("../../connect/close.php");

	}else{
		header("Location:order-manage.php");
	}
	}
 
	
?>