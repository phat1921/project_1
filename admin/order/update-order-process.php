<?php  
session_start();
	if(isset($_SESSION["Sadmin"]) || isset($_SESSION["admin"])){

	}else{
		header("Location:../account/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SnakesShop</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../image/icon.jpg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../../css/css.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">



</head>
<body>
	<?php
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			include("../../connect/open.php");
			$sqlbill = "SELECT * FROM bill WHERE id_bill = $id";
			$resultBill = mysqli_query($con,$sqlbill);
			$bill = mysqli_fetch_array($resultBill);
			$sqlCate = "SELECT * FROM category";
			$resultCate = mysqli_query($con , $sqlCate);

			$detail = "SELECT * FROM detai_bill WHERE id_bill = $id";
			$resultDet = mysqli_query($con,$detail);
			$name = mysqli_fetch_array($resultDet);

			$product = "SELECT * FROM products";
			$resultPro = mysqli_query($con , $product);
			$product_name = mysqli_fetch_array($resultPro);
			include("../../connect/close.php");
		}else{
			header("Location:indexPro.php");
		}
		
		?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
		<div class="content">
		
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="text-center">Sửa Hóa Đơn</h2>
					</div>

					<div class="panel-body">
						<form action="update-process.php"  method="post">

							<input type="hidden" name="id" value="<?php echo $bill["id_bill"]?>">
							<!-- name  -->
							<div class="form-group">
							  <label for="name">Tên người nhận hàng:</label>
							  
							  <input required="true" type="text" class="form-control" id="name" name="name" value="<?php echo $bill["name_user"]?>">
						    </div>

						    <!-- time -->
						    <div class="form-group">
							  <label for="time">Thời gian mua hàng:</label>
							  
							  <input required="true" type="datetime" class="form-control" id="time" name="time" value="<?php echo $bill["time_buy"]?>">
						    </div>



						    <!-- phone -->
						    <div class="form-group">
							  <label for="phone">Số điện thoại:</label>
							  
							  <input required="true" type="text" class="form-control" id="phone" name="phone" value="<?php echo $bill["phone_number_user"]?>">
						    </div>

						    <!-- address -->
						    <div class="form-group">
							  <label for="address">Địa chỉ nhận hàng:</label>
							   <input required="true" type="text" class="form-control" id="address" name="address" value="<?php echo $bill["address_user"]?>">
						    </div>

						     <!-- price -->
						    <div class="form-group">
							  <label for="price">Giá tiền:</label>
							  
							  <input required="true" type="number" class="form-control" id="price" name="price" value="<?php echo $bill["price"]?>">
						    </div>

						    <button class="success">Save</button>
						   <br>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>