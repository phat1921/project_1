<?php  
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login.php");
    }else{
    	include("../../connect/open.php");
        if(isset($_GET["email"]))
    	$email = $_GET["email"]; 
    	$sql = "SELECT * FROM customer WHERE email = '$email'";
    	$result = mysqli_query($con, $sql);
        $user = mysqli_fetch_array($result);
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
            <?php 
                    include("../nav.php"); 
            ?>
        </div>
        <div class="col-lg-2">
        <div class="small-container">
            <div class="row">
                
                <div class="table_info_main">
                    <h1>Chỉnh sửa thông tin cá nhân</h1>
                
                    <table class="update_info">
                        <form action="update_process.php?id_user=<?php echo $user["id_user"]; ?>" method="post"me>
                        <tr>
                            <th>Tên người dùng:</th>
                            <td>
                                <input type="text" name="name" value="<?php echo $user["name"]; ?>">    
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                <input type="text" name="email" value="<?php echo $user["email"]; ?>">    
                            </td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td>
                                <input type="text" name="sex" value="<?php 
                                    if($user["sex"] == 1){
                                        echo "Nam";
                                    }else{
                                        echo "Nữ";
                                    }
                                ?>">    
                            </td>
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <td>
                                <input type="text" name="phone" value="<?php echo $user["phone_number"]; ?>">    
                            </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ:</th>
                            <td>
                                <input type="text" name="address" value="<?php echo $user["address"]; ?>">    
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button>Chỉnh sửa</button></td>
                        </tr>
                        </form>
                    </table>
                </div>
                
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