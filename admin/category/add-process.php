<?php 
	if(isset($_POST["name"]) && isset($_POST["id_category"]) ){
		$name = $_POST["name"];
		$id_category = $_POST["id_category"];
		
		include("../../connect/open.php");
		$sql = "INSERT INTO detail_category(name,id_category) VALUES ('$name','$id_category')";
		$result = mysqli_query($con, $sql);
		// sau khi lưu vào thì chuyển sang trang index
		header("Location:indexCate.php");
		include("../../connect/close.php");
		
	}else{
		header("Location:add.php");
	}

 ?>