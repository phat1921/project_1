<?php  
session_start();
	if(isset($_SESSION["Sadmin"])){

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
				$search = "";
				if(isset($_GET["search"])){
					$search = $_GET["search"];
				}
				$bill = "SELECT * FROM bill WHERE status = 2 AND ( name_user   LIKE '%$search%' OR phone_number_user   LIKE '%$search%' OR time_buy   LIKE '%$search%')";
				$result = mysqli_query($con , $bill);
				if($result != null){
					$num = mysqli_num_rows($result);
				}
				
		include("../../connect/close.php");
				
	?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
		<div class="content">
			<div class="row">
				<form>
					<input type="text" name="search" placeholder ="Search..." value="<?php if (isset($_GET["search"])) {
	                                              echo $_GET["search"];
	                                            } ?>">
					<button class="btn btn"><i class="fa fa-search"></i></button>

				</form>
				
			</div>
			<div class="content_content">
				<?php  
				if(isset($search) && isset($num)){
					
						if($search != ""){
						echo "Tìm thấy $num kết quả liên qua tới '$search...'";
						}

					
				}
					
				?>
			
				<h2 class="text-center">Xóa Hóa Đơn</h2>
				
				<table>
					<tr>
						<th>STT </th>
						<th>Tên người mua </th>
						<th>Ngày mua hàng </th>
						<th>Số Điện Thoại </th>
						<th>Địa Chỉ Nhận Hàng </th>
						<th style="color: red;">Giá(VNĐ) </th>
						<th width="100px">Xóa</th>
					</tr>
					<tr>
						<td colspan="7"><hr></td>
					</tr>
						
						
					
					<?php  
						$index = 1;
						if($result != null){
					while($bill = mysqli_fetch_array($result) ) { ?>
							
							<tr>
								<td><?php echo $index++ ?></td>

								<td><?php echo $bill["name_user"]; ?></td>

								<td><?php echo $bill["time_buy"]; ?></td>

								<td><?php echo $bill["phone_number_user"]; ?></td>

								<td><?php echo $bill["address_user"]; ?></td>

								<td style="color: red;"><?php echo number_format($bill["price"], 0, '.',','); ?></td>

								<td>
									<a href="delete-order-process.php?id=<?php echo $bill["id_bill"]?>" onclick="return confirm('ARE YOU SURE?')"><button class="danger"><i class="fas fa-trash-alt"></i></button></a>
								</td>

							</tr>
							

					<?php } } ?>
				</table>
			</div>	
		</div>	
</body>
</html>