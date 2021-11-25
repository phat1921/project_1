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
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/css.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">
</head>
<body>
	<?php
		include("../../connect/open.php");
				if(isset($_GET["id"])){
					$id = $_GET["id"];
				}
				$detailbill = "SELECT detail_bill.id_bill,detail_bill.amount,detail_bill.price,products.image,products.name FROM detail_bill JOIN products ON detail_bill.id_products = products.id_products WHERE id_bill = ".$id;
				$result = mysqli_query($con , $detailbill);
				if($result != null){
					$num = mysqli_num_rows($result);
				}
				$bill = "SELECT * FROM bill WHERE  id_bill =".$id;
				$result_bill = mysqli_query($con , $bill);
				$order = mysqli_fetch_assoc($result_bill);
						
		include("../../connect/close.php");
				
	?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
		<div class="content">
			
			<div class="content_content">
				
				<h2 class="text-center">Chi Tiết Hóa Đơn</h2>
				<table class="info_customer">
					<tr>
						<td>Tên người nhận:</td>
						<td><p><?php echo $order["name_user"];?></p></td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td><p><?php echo $order["phone_number_user"];?></p></td>
					</tr>
					<tr>
						<td>Địa chỉ nhận hàng:</td>
						<td><p><?php echo $order["address_user"];?></p></td>
					</tr>
					<tr>
						<td>Thời gian đặt hàng:</td>
						<td><p><?php echo $order["time_buy"];?></p></td>
					</tr>
					<tr>
						<td>Trạng thái:</td>
						<td>
							<p>
								<?php 
									if($order["status"] == 0){
										echo "Đang xác nhận";
								?>
								<?php  
									}elseif($order["status"] == 1){
								?>
								<span style="color: green;">
									<?php
										echo "Đã xác nhận";
									?>
								</span>
										
								<?php  
									}elseif($order["status"] == 2){
								?>
								<span style="color: red;">
									<?php
										echo "Đã hủy";
									?>
								</span>
										
								<?php  
									}
								?>
							</p>
						</td>
					</tr>

				</table>
				
				<table>
					<tr>
						<th>STT</th>
						<th>Sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
					</tr>
					<tr>
						<td colspan="4"><hr></td>
					</tr>
						
						
					
					<?php  
						$index = 1;
						if($result != null){
					while($detail = mysqli_fetch_array($result) ) { ?>
							<tr>
								<td><?php echo $index++ ?></td>

								<td>
									<?php 
										echo $detail["name"];
									?>
								</td>
								<td>
									<img src="../../upload/<?php echo $detail["image"] ?>" alt="" style="width: 100px; height: 100px">
								</td>

								<td><?php echo $detail["amount"] ?></td>
							</tr>

							<tr>
								<td colspan="4"><hr></td>
							</tr>
							
					<?php } } ?>

					<tr>
						<td>
							<?php if ($order["status"] == 0 ):?>
								<a href="accept.php?id=<?php echo $id; ?>"><button class="success" >Duyệt</button></a>
							<?php endif ?>
							<?php if ($order["status"] != 2 ):?>
								<a href="cancel.php?id=<?php echo $id; ?>"><button class="danger" >Hủy</button></a>
							<?php endif ?>
							
						</td>
					</tr>
							
				</table>
			</div>	
		</div>	
</body>
</html>