<?php  

	if(isset($_POST["name"]) && isset($_POST["gt"])  && isset($_POST["pass"]) && isset($_POST["repass"])  && isset($_POST["email"]) && isset($_POST["sdt"]) && isset($_POST["address"]) ){
			
			$name = $_POST["name"];
			$gt = $_POST["gt"];
			$pass = $_POST["pass"];
			
			$email = $_POST["email"];
			$address = $_POST["address"];
			$repass = $_POST["repass"];
			
			$sdt = $_POST["sdt"];
			

			if( $pass != $repass){

				header("Location: registation.php?err=1");
			}else{
				$con = mysqli_connect("localhost" , "root" , "" , "pj1");
				$sql = "SELECT * FROM customer WHERE email = '$email'"	;
				$result = mysqli_query($con, $sql);
				$row = mysqli_num_rows($result);
				if( $row != 0){
					header("location: registation.php?error=1");
				}else{
					
					$user = " INSERT INTO customer(name,password,email,address,sex,phone_number,status) VALUES ('$name','$pass','$email','$address','$gt','$sdt',0)";
					mysqli_query($con, $user);
					header("Location:login.php");

				}
				
			}
			mysqli_close($con);
			
	}else{
		header("location: registation.php");
	}

	
	
?>