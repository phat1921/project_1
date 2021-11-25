<?php 
	if(isset($_POST["name"]) && isset($_POST["amount"]) && isset($_POST["brand"]) && isset($_POST["id_category"]) && isset($_POST["price"]) && isset($_FILES["image"]) && isset($_POST["description"]) ){
		
		$name = $_POST["name"];
		
		$amount = $_POST["amount"];

		$brand = $_POST["brand"];

		$id_category = $_POST["id_category"];
		

		$price = $_POST["price"];
		

		$image = $_FILES["image"];
		
		$description = $_POST["description"];
		
		$nameimg = $image["name"];

		$lane = "../../upload/" . $nameimg;

		move_uploaded_file($image["tmp_name"], $lane);
	
		include("../../connect/open.php");

		$sql = "INSERT INTO products(name,id_category,brand,price,amount,image,description) VALUES ('$name','$id_category','$brand','$price','$amount','$nameimg','$description')";
		$result = mysqli_query($con, $sql);
		// sau khi lưu vào thì chuyển sang trang index
		header("Location:indexPro.php");
		include("../../connect/close.php");
		
	}else{
		header("Location:add.php");
	}

 ?>