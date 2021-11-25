<?php  
	include("../../connect/open.php");
				if(isset($_GET["id"])){
					$id = $_GET["id"];
				}
				$update = "UPDATE bill SET status = 1 WHERE id_bill = ".$id;
				$result = mysqli_query($con , $update);
						
	include("../../connect/close.php");
	header("location:order-manage.php");
?>