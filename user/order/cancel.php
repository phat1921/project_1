<?php  
session_start();
		if(isset($_GET["id"])){
		$id = $_GET["id"];
		// mở kết nối database
		include("../../connect/open.php");
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
		$sql = "UPDATE bill SET status = 2 WHERE id_bill =".$id;
		$resultBill = mysqli_query($con,$sql);
		header("Location:index.php");
		
		include("../../connect/close.php");

	}else{
		header("Location:index.php");
	}
 
?>