<?php
	if(isset($_GET["id_user"])){
		$id = $_GET["id_user"];

        if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["sex"]) && isset($_POST["phone"]) && isset($_POST["address"])){
			$name = $_POST["name"];
			$email = $_POST["email"];
			if($_POST["sex"] == 'nữ' || $_POST["sex"] == 'Nữ' || $_POST["sex"] == 'NỮ' || $_POST["sex"] == 'nỮ' ){
				$sex = 0;
			}else{
				$sex = 1;
			}
			
			$phone = $_POST["phone"];
			$address = $_POST["address"];

			
			include("../../connect/open.php");
	    	 
	    	$sql = "UPDATE customer SET email = '$email' , name = '$name' , sex = '$sex' , phone_number = '$phone', address = '$address' WHERE id_user='$id'";
	    	$result = mysqli_query($con, $sql);
	    	header("location:index.php");
	    	
	    	include("../../connect/close.php");
		}else{
			header("location:index.php");
		}	
    }else{
    	header("location:index.php");
    } 
	
?>