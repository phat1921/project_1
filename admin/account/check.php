<?php  

	if(isset($_POST["name"]) && isset($_POST["sex"])  && isset($_POST["pass"]) && isset($_POST["repass"])  && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["user"]) && isset($_POST["role"])){
			
			$name = $_POST["name"];
			$sex = $_POST["sex"];
			$username = $_POST["user"];
			$pass = $_POST["pass"];
			
			$email = $_POST["email"];
			
			$address = $_POST["address"];
			$repass = $_POST["repass"];
			
			$phone = $_POST["phone"];
			$role = $_POST["role"];

			if( $pass != $repass){

				header("Location: registation.php?err=1");
			}else{
				include("../../connect/open.php");
				$sql = "SELECT * FROM admin WHERE username = '$username'";
				$result = mysqli_query($con, $sql);
				$row = mysqli_num_rows($result);
				if($row != 0){
					header("location: registation.php");
				}else{
					
					$sqlAd = "INSERT INTO admin(name,username,password,email,address,sex,phone_number,role,status) VALUES ('$name','$username','$pass','$email','$address','$sex','$phone','$role',0)";

					mysqli_query($con, $sqlAd);
					header("Location:../admin-manage/admin_manage.php");
					

				}
				
			}
			include("../../connect/close.php");
			
	}else{
		header("location: registation.php");
	}

	
	
?>