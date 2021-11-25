<?php  
		if(isset($_GET["id"])){
		$id = $_GET["id"];
		// mở kết nối database
		include("../../connect/open.php");
		
		$sql = "UPDATE admin SET status = 1 WHERE id_admin =".$id;
		mysqli_query($con,$sql);
		header("Location:admin_manage.php");
		
		include("../../connect/close.php");

	}else{
		header("Location:admin_manage.php");
	}
	
 
	
?>