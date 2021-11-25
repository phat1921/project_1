<?php  
session_start();
	if(!isset($_SESSION["Sadmin"])){
		header("Location: ../account/login.php");
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
				$admin = "SELECT * FROM admin WHERE  (name LIKE '%$search%' OR email LIKE '%$search%' OR username   LIKE '%$search%') AND role = 1";
				$result = mysqli_query($con , $admin);
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
				
				<h2 class="text-center">Quản Lý Thông Tin Nhân Viên</h2>
				<table >
						
							<tr>
								<th>STT</th>
								<th>Họ và Tên</th>
								<th>Giới Tính</th>
								<th>Email</th>
								<th>Username</th>
								<th>Password</th>
								<th>Số Điện Thoại</th>
								<th>Địa Chỉ</th>
								<th>Role</th>
								<th>Status</th>
								<th width="100px">Sửa</th>
								<th width="100px">Khóa</th>
							</tr>
							<tr>
								<td colspan="12"><hr></td>
							</tr>
					
					<?php  
						$index = 1;
						if($result != null){
					while($admin = mysqli_fetch_array($result) ) { ?>
							<tr>
								<td><?php echo $index++ ?></td>

								<td><?php echo $admin["name"] ?></td>

								<td><?php
										if($admin["sex"] ==1){ 
											echo "Nam";
										}else{ 
											echo "Nữ"; 
										}

										?></td>

								<td><?php echo $admin["email"] ?></td>

								<td><?php echo $admin["username"] ?></td>

								<td><?php echo $admin["password"] ?></td>

								<td><?php echo $admin["phone_number"] ?></td>

								<td><?php echo $admin["address"] ?></td>

								<td><?php 
										if($admin["role"] == 0){
											echo "Quản lý";
										}else{
											echo "Nhân viên";
										} ?></td>

								<td><?php 
										if($admin["status"] == 0){
											echo "On";
										}else{
											echo "Off";
										}
								 ?></td>

								<td>
									<a href="update.php?id=<?php echo $admin["id_admin"]?>"><button class="warning" ><i class="far fa-edit"></i></button></a>
								</td>
								
								<td>
									<?php  
										if($admin["status"] == 0){
									?>
									<a href="delete.php?id=<?php echo $admin["id_admin"]?>" onclick="return confirm('ARE YOU SURE?')"><button class="danger"><i class="fas fa-lock"></i></button></a>
									<?php  
										}else{
											echo "Đã khóa";
										}
									?>
								</td>
								
							</tr>

					<?php } } ?>
				</table>
			</div>
</body>
</html>