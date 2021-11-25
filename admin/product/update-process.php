<?php 
	
	if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["id_category"]) && isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["image"]) && isset($_POST["description"]) && isset($_POST["amount"])){

		
			$name = $_POST["name"];
			$id = $_POST["id"];
			$id_category = $_POST["id_category"];
			$brand = $_POST["brand"];

			$price = $_POST["price"];
			$image = $_POST["image"];
			$description = $_POST["description"];
			$amount = $_POST["amount"];

			include("../../connect/open.php");
			// lưu kết quả vào db
			$sql = "UPDATE products SET name = '$name' , id_category = '$id_category' , brand = '$brand',price = '$price' , image = '$image' , description = '$description' , amount = '$amount' WHERE id_products = " .$id;
			$result = mysqli_query($con , $sql);
			// sau khi lưu vào thì chuyển sang trang index
			header("location:indexPro.php");
			include("../../connect/close.php");
		}else{
			header("Location:update.php");
		}
	

 ?>