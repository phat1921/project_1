<?php
	if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["time"]) && isset($_POST["price"]) && isset($_POST["phone"]) && isset($_POST["address"])){

		
			$name = $_POST["name"];
			$id = $_POST["id"];
			$time = $_POST["time"];
			$price = $_POST["price"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];

			include("../../connect/open.php");
			// lưu kết quả vào db
			$sql = "UPDATE bill SET name_user = '$name' , time_buy = '$time',price = '$price' , phone_number_user = '$phone' , address_user = '$address' WHERE id_bill = " .$id;
			$result = mysqli_query($con , $sql);
			// sau khi lưu vào thì chuyển sang trang index
			header("location:order-manage.php");
			include("../../connect/close.php");
		}else{
			header("Location:update-order.php");
		}

?>