<?php  
	include("../../connect/open.php");
		if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
		$detailbill = mysqli_query($con, "SELECT * FROM detail_bill WHERE id_bill = '$id'");
		$add = 0;
		if($detailbill != null){
			while($row = mysqli_fetch_array($detailbill)){
				$products = mysqli_query($con, "SELECT * FROM products WHERE id_products = ".$row["id_products"]);
				$amount = mysqli_fetch_assoc($products);
				$add = $row["amount"] + $amount["amount"];
				$newAmount = mysqli_query($con, "UPDATE products SET amount = '$add' WHERE id_products = ".$row["id_products"]);
			}
		}
		$update = "UPDATE bill SET status = 2 WHERE id_bill = ".$id;
		$result = mysqli_query($con , $update);
						
	include("../../connect/close.php");
	header("location:order-manage.php");
?>