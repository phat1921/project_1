<?php 
	if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["id_category"]) ){
		$id = $_POST["id"];
		$name = $_POST["name"];
		$id_category = $_POST["id_category"];
		

		include("../../connect/open.php");
		$sql = "UPDATE detail_category SET name = '$name' , id_category = '$id_category' WHERE id = '$id'";
		$resultCate = mysqli_query($con,$sql);
		include("../../connect/close.php");
		header("Location:indexCate.php");

	}else{
		header("Location:update.php");
	}
 ?>