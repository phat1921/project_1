<?php  
	session_start();
	if(isset($_SESSION["admin"])){
		unset($_SESSION["admin"]);
	}
	if(isset($_SESSION["Sadmin"])){
		unset($_SESSION["Sadmin"]);
	}
		header("Location:login.php");
?>