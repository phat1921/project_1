<?php 
	
	if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["sex"]) && isset($_POST["email"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["role"]) && isset($_POST["status"])){

		
			$name = $_POST["name"];
			$id = $_POST["id"];

			if($_POST["sex"] == 'nữ' || $_POST["sex"] == 'Nữ' || $_POST["sex"] == 'nỮ' || $_POST["sex"] == 'NỮ' ){
				$sex = 0;
			}else{
				$sex = 1;
			}

			$email = $_POST["email"];

			$user = $_POST["user"];
			$pass = $_POST["pass"];

			$phone = $_POST["phone"];
			$address = $_POST["address"];
			
			if($_POST["role"] == 'admin' || $_POST["role"] == 'Admin' || $_POST["role"] == 'aDmin' || $_POST["role"] == 'adMin' || $_POST["role"] == 'admIn' || $_POST["role"] == 'admiM' || $_POST["role"] == 'ADMIN' ){
				$role = 1;
			}else{
				$role = 0;
			}


			if($_POST["status"] == 'on' || $_POST["status"] == 'On' || $_POST["status"] == 'ON' || $_POST["status"] == 'oN' ){
				$status = 0;
			}else{
				$status = 1;
			}

			include("../../connect/open.php");
			// lưu kết quả vào db
			$sql = "UPDATE admin SET name = '$name' , sex = '$sex' , email = '$email', username = '$user' , password = '$pass' , phone_number = '$phone' , address = '$address' , role = '$role' , status = '$status' WHERE id_admin = " .$id;
			$result = mysqli_query($con , $sql);
			// sau khi lưu vào thì chuyển sang trang index
			header("location:admin_manage.php");
			include("../../connect/close.php");
		}else{
			header("Location:update.php");
		}
	

 ?>