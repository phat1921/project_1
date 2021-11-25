<?php
	session_start();
	if(isset($_SESSION["email"])){
		$email = $_SESSION["email"];
        if(isset($_POST["pass"]) && isset($_POST["newpass"]) && isset($_POST["repass"])){
			$pass = $_POST["pass"];
			$newpass = $_POST["newpass"];
			$repass = $_POST["repass"];

			if($newpass != $repass){
				header("location:index.php?err=1");
			}else{
				include("../../connect/open.php");
		    	 
		    	$sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$pass'";
		    	$result = mysqli_query($con, $sql);
		    	$row = mysqli_num_rows($result);
		    	if($row != 0){
		    		$new = "UPDATE customer SET password = '$newpass' WHERE email = '$email'";
		    		mysqli_query($con , $new);
		    		header("location:index.php");
		    	}
		    	
		    	include("../../connect/close.php");
				
			}

		}else{
		header("location:update_pass.php?err=1");
		}
    }  
	
?>