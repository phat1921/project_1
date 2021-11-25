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
				$search = "";
				if(isset($_GET["search"])){
					$search = $_GET["search"];
				}
				$customer = "SELECT * FROM customer WHERE  name   LIKE '%$search%' ";
				$result = mysqli_query($con , $customer);
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
			
				<h2 class="text-center">Quản Lý Thông Tin Khách Hàng</h2>
				
				<table>
					<tr>
						<th>STT </th>
						<th>Họ và Tên </th>
						<th>Giới Tính </th>
						<th>Email </th>
						<th>Password </th>
						<th>Số Điện Thoại </th>
						<th>Địa Chỉ </th>
						<th width="100px">Khóa</th>
					</tr>
					<tr>
						<td colspan="8"><hr></td>
					</tr>
						
						
					
					<?php  
						$index = 1;
						if($result != null){
					while($customer = mysqli_fetch_array($result) ) { ?>
							
							<tr>
								<td><?php echo $index++ ?></td>

								<td><?php echo $customer["name"] ?></td>

								<td><?php
										if($customer["sex"] ==1){ 
											echo "Nam";
										}else{ 
											echo "Nữ"; 
										}

										?></td>

								<td><?php echo $customer["email"] ?></td>

								<td><?php echo $customer["password"] ?></td>

								<td><?php echo $customer["phone_number"] ?></td>

								<td><?php echo $customer["address"] ?></td>

								<td>
									<?php  
										if($customer["status"] == 0){
									?>
									<a href="delete.php?id=<?php echo $customer["id_user"]?>" onclick="return confirm('ARE YOU SURE?')"><button class="danger"><i class="fas fa-lock"></i></button></a>
									<?php }else{
										echo "Đã khóa";
									} ?>
								</td>

							</tr>
							

					<?php } } ?>
				</table>
			</div>
		</div>		
</body>
</html>