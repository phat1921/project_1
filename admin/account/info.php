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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SnakesShop</title>
	<link rel="shortcut icon" href="../../image/icon.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/css.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">
</head>
<body>
	<?php
		include("../../connect/open.php");
			if(isset($_SESSION["Sadmin"])){
				$user_sa = $_SESSION["Sadmin"];
				$sql_user = "SELECT * FROM admin WHERE username = '$user_sa'";
				$resultUser = mysqli_query($con,$sql_user);
				if($resultUser != null){
					$user = mysqli_fetch_assoc($resultUser);
				}
			}elseif (isset($_SESSION["admin"])) {
				$user_ad = $_SESSION["admin"];
				$sql_admin = "SELECT * FROM admin WHERE username = '$user_ad'";
				$resultAd = mysqli_query($con,$sql_admin);
				if($resultAd!= null){
					$Ad = mysqli_fetch_assoc($resultAd);
				}

			}
					
		include("../../connect/close.php");
	?>
	<div class="wrapper">
	
		<?php 
			include("../../side_bar.php");
		?>
	
	
		<div class="content">

			<!--  hiện thị nội dung -->
			<div class="content_content">
				<h2 class="text-title">
					Xin chào 
					<span>
						<?php 
						if(isset($_SESSION["Sadmin"])){
                                $Sadmin = $_SESSION["Sadmin"];
                                echo "<b>$Sadmin</b>";
                            }elseif (isset($_SESSION["admin"])) {
                                $admin = $_SESSION["admin"];
                                echo "<b>$admin</b>";
                            }
						?>
					</span>		
				</h2>
				<h4 class="title"><i>Chào mừng bạn đến với trang quản trị thông tin cá nhân</i></h4>
				<table>
					<tr>
						<th>Tên chủ tài khoản</th>
						<th>Gender</th>
						<th>Username</th>
						<th>Password</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Role</th>
					</tr>
					<tr>
						<td colspan="8"><hr></td>
					</tr>
					<?php  
						if(isset($_SESSION["Sadmin"])){
					?>
						<tr>
							<td><?php echo $user["name"]?></td>
							<td>
								<?php 
									if($user["sex"] == 1){
										echo "Nam";
									}else{
										echo "Nữ";
									}
								?>
							</td>
							<td><?php echo $user["username"]?></td>
							<td><?php echo $user["password"]?></td>
							<td><?php echo $user["email"]?></td>
							<td><?php echo $user["phone_number"]?></td>
							<td><?php echo $user["address"]?></td>
							<td>
								<?php 
									if($user["role"] == 1){
										echo "Nhân Viên";
									}else{
										echo "Quản lý";
									}
								?>
							</td>
						</tr>
					<?php		
						}elseif(isset($_SESSION["admin"])){
					?>
						<tr>
							<td><?php echo $Ad["name"]?></td>
							<td>
								<?php 
									if($Ad["sex"] == 1){
										echo "Nam";
									}else{
										echo "Nữ";
									}
								?>
							</td>
							<td><?php echo $Ad["username"]?></td>
							<td><?php echo $Ad["password"]?></td>
							<td><?php echo $Ad["email"]?></td>
							<td><?php echo $Ad["phone_number"]?></td>
							<td><?php echo $Ad["address"]?></td>
							<td>
								<?php 
									if($Ad["role"] == 1){
										echo "Nhân Viên";
									}else{
										echo "Quản lý";
									}
								?>
							</td>
						</tr>
					<?php
						}
					?>
				</table>
				<div class="edit">
					<h2>Chỉnh sửa thông tin cá nhân</h2>
					<table>
						<form action="update_process.php" method="post">
						<?php  
						if(isset($_SESSION["Sadmin"])){
						?>
                        <tr>
                            <td>Tên chủ tài khoản:</td>
                            <td><input type="text" name="name" required="true" value="<?php echo $user["name"]?>"></td>
                        </tr>

                        <tr>
                            <td>Giới tính:</td>
                            <td>
                            	<input required="true" type="text"id="sex" name="sex" value="<?php if($user["sex"] ==1){
						  			echo "Nam";
						  		}else{
						  			echo "Nữ";
						  		}
						  		?>">
						  	</td>
                        </tr>
                        
                        <tr>
                            <td>Mật khẩu:</td>
                            <td><input type="text" name="pass" required="true" value="<?php echo $user["password"]?>"></td>
                        </tr>
                            
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" required="true" value="<?php echo $user["email"]?>"></td>
                        </tr>

                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" name="phone" value="<?php echo $user["phone_number"]?>"></td>
                        </tr>

                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="address" value="<?php echo $user["address"]?>"></td>
                        </tr>
                    

                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <button class="success" type="submit">Update</button>
                            </td>
                            
                        </tr>

                        <!-- nếu tài khoản có chức vụ là nhân viên -->
                    	<?php }elseif(isset($_SESSION["admin"])){
						?>
						<tr>
                            <td>Tên chủ tài khoản:</td>
                            <td><input type="text" name="name" required="true" value="<?php echo $Ad["name"]?>"></td>
                        </tr>

                        <tr>
                            <td>Giới tính:</td>
                            <td>
                            	<input required="true" type="text"id="sex" name="sex" value="<?php if($Ad["sex"] ==1){
						  			echo "Nam";
						  		}else{
						  			echo "Nữ";
						  		}
						  	?>">
                        	</td>
                        </tr>
                        
                        <tr>
                            <td>Mật khẩu:</td>
                            <td><input type="text" name="pass" required="true" value="<?php echo $Ad["password"]?>"></td>
                        </tr>
                            
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" required="true" value="<?php echo $Ad["email"]?>"></td>
                        </tr>

                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" name="phone" value="<?php echo $Ad["phone_number"]?>"></td>
                        </tr>

                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="address" value="<?php echo $Ad["address"]?>"></td>
                        </tr>
                    

                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <button class="success" type="submit">Update</button>
                            </td>
                            
                        </tr>
                        <?php } ?> 
                        </form>    
                    </table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>