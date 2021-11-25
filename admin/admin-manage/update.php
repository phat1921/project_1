<?php  
session_start();
	if(!isset($_SESSION["Sadmin"])){
		header("Location: ../account/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SnakesShop</title>
	<link rel="shortcut icon" href="../../image/icon.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">
	<link rel="stylesheet" href="../../css/css.css">


</head>
<body>
	<?php
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			include("../../connect/open.php");
			$sql = "SELECT * FROM admin WHERE id_admin = $id";
			$resultAd = mysqli_query($con,$sql);
			include("../../connect/close.php");
			$admin = mysqli_fetch_array($resultAd);
		}else{
			header("Location:admin_manage.php");
		}

		?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
		<!-- phần nội dung -->
		<div class="content">
			<div class="content_content">
				<h2 class="text-center">Sửa Thông Tin Nhân Viên</h2>
				<form action="update-process.php" method="post">

						<input type="text" name="id" value="<?php echo $admin["id_admin"]?>" hidden="true">

						<div class="form-group">
						  <label for="name">Họ Và Tên:</label><br>
						  <input required="true" type="text"id="name" name="name" value="<?php echo $admin["name"]?>">
						  <br>
						  <br>
						  
					    </div>

					    <div class="form-group">
						  <label for="sex">Giới Tính:</label><br>
						  <input required="true" type="text"id="sex" name="sex" value="<?php if($admin["sex"] ==1){
						  			echo "Nam";
						  		}else{
						  			echo "Nữ";
						  		}
						  	?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="email">Email:</label><br>
						  <input required="true" type="text"id="email" name="email" value="<?php echo $admin["email"]?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="username">Username:</label><br>
						  <input required="true" type="text"id="user" name="user" value="<?php echo $admin["username"]?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="password">Password:</label><br>
						 <input required="true" type="text"id="pass" name="pass" value="<?php echo $admin["password"]?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="phone">Số Điện Thoại:</label><br>
						  <input required="true" type="text"id="phone" name="phone" value="<?php echo $admin["phone_number"]?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="address">Địa Chỉ:</label><br>
						  <input required="true" type="text"id="address" name="address" value="<?php echo $admin["address"]?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="role">Quyền:</label><br>
						 	<input required="true" type="text"id="role" name="role" value="<?php if($admin["role"] == 1){
						  			echo "Admin";
						  		}else{
						  			echo "Super Admin";
						  		}
						  	?>">
						  <br>
						  <br>
					    </div>

					    <div class="form-group">
						  <label for="status">Trạng Thái:</label><br>
						  <input required="true" type="text"id="status" name="status" value="<?php if($admin["status"] ==1){
						  			echo "Off";
						  		}else{
						  			echo "On";
						  		}
						  	?>">
						  <br>
						  <br>

						  <button class="success">LƯU</button>
					    </div>
					    
					    
				</form>
		
			</div>
		</div>
	</div>
</body>
</html>