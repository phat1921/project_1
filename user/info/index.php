<?php  
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: ../account/login.php");
    }else{
    	include("../../connect/open.php");
    	$email = $_SESSION["email"]; 
    	$sql = "SELECT * FROM customer WHERE email = '$email'";
    	$result = mysqli_query($con, $sql);
        
    	include("../../connect/close.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Infomation</title>
	<link rel="shortcut icon" href="../../image/icon.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../style_test.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php  
    include("../../header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-1">
            <?php include("../nav.php"); ?>
        </div>
        <div class="col-lg-2">
        <div class="small-container">
            <h1>Thông tin tài khoản</h1>
            <i>Xin chào, 
                <b>
                <?php 
                    echo $email;?>
                    
                </b>
            </i>
            <br>
            <a href="update.php?email=<?php echo $email;?>"><i class="fa fa-edit"></i><span>Chỉnh sửa</span></a>
        	<table class="table_info">
        		<tr>
        			<th>Tên người dùng</th>
        			<th>Email</th>
        			<th>Mật khẩu</th>
        			<th>Giới tính</th>
        			<th>Số điện thoại</th>
        			<th>Địa chỉ</th>
        		</tr>
        		<tr>
        			<td colspan="6"><hr></td>
        		</tr>
        		<?php  
        		while ($user = mysqli_fetch_array($result)) {?>
        			<tr>
        				<td><?php echo $user["name"]?></td>
        				<td><?php echo $user["email"]?></td>
        				<td><?php echo $user["password"]?></td>
        				<td>
        					<?php 
        					    if($user["sex"] == 1){
        					    	echo "nam";
        					    }else{
        					    	echo "nữ";
        					    }
        					?>
        						
        				</td>
        				<td><?php echo $user["phone_number"]?></td>
        				<td><?php echo $user["address"]?></td>
        			</tr>
        		<?php
                $name = $user["name"];
                $id = $user["id_user"];
        		}
        		?>
        	</table>
            <div class="check_order">
                <h2>Thông tin đơn hàng</h2>
                    <h4>Tên khách hàng:
                        <?php
                            echo $name;
                        ?>
                    </h4>

                    <h4>Đơn hàng:
                        <?php 
                            include("../../connect/open.php");
                                $order = mysqli_query($con , "SELECT * FROM bill WHERE id_user='$id'");
                                $num = mysqli_num_rows($order);
                                echo $num;
                            include("../../connect/close.php"); 
                        
                        ?>
                    </h4>
                    <a href="../order/index.php"><button>Xem đơn hàng</button></a>
            </div>
        	
        </div>
        </div>
        
    </div>
</div>
    

    <!-- footer -->
    <?php  
        include("../../footer.php");
    ?>
</body>
</html>