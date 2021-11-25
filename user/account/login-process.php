<?php  
	session_start();
	if(isset($_POST["email"]) && isset($_POST["pass"])){
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		
			
		$con = mysqli_connect("localhost" , "root" , "" , "pj1");
		$sql = "SELECT * FROM customer WHERE email = '$email'"	;
		$result 	= mysqli_query($con, $sql);
		$row = mysqli_num_rows($result);
		$password = mysqli_fetch_array($result);
				
		if( $row > 0){
			if($pass == $password["password"] ){

				if($password["status"] == 0){
					$_SESSION["email"] = $email;
					if(isset($_POST["remember"])){
						setcookie("email",$email,time() + 84600*7);
						setcookie("password",$pass,time() + 84600*7);
					}else{
						setcookie("email",$email,time() - 84600);
						setcookie("password",$pass,time() - 84600);
					}
					header("Location: ../home/index.php");
				}else{
					header("location:login.php");
				}
				
					
			}else{
				header("location:login.php?err=1");
			}
					
		}else{
			header("location: login.php");			
		}
		mysqli_close($con);
				
	}else{
		header("location: login.php");
	}


	
?>