<?php  
	session_start();
	if(isset($_POST["user"]) && isset($_POST["pass"])){
		$user = $_POST["user"];
		$pass = $_POST["pass"];

		
			
		include("../../connect/open.php");
		$sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_num_rows($result);
		
			if($row == 0){
				header("Location:login.php?err=1");
				
			}else{
				while($admin = mysqli_fetch_array($result))	{
					if($admin["status"] == 0){
						if($admin["role"] == 0){
							$_SESSION["Sadmin"] = $user;
							if(isset($_POST["remember"])){
								setcookie("username",$user,time() + 84600*7);
								setcookie("password",$pass,time() + 84600*7);
							}else{
								setcookie("username",$user,time() - 84600);
								setcookie("password",$pass,time() - 84600);
							}
							header("location:../category/indexCate.php");
								
						}else if($admin["role"] == 1){
							$_SESSION["admin"] = $user;
							if(isset($_POST["remember"])){
								setcookie("username",$user,time() + 84600*7);
								setcookie("password",$pass,time() + 84600*7);
							}else{
								setcookie("username",$user,time() - 84600);
								setcookie("password",$pass,time() - 84600);
							}
							header("location:../category/indexCate.php");			
						}
					}	
				
			}
		}
		

		include("../../connect/close.php");
				
	}else{
		header("location: login.php");
	}


	
?>