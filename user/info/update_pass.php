<?php  
    session_start();
    if(!isset($_SESSION["email"])){
        header("location:../account/login.php");
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
	<link rel="stylesheet" href="../../style_test.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<header>
		<?php include("../../header.php"); ?> 
	</header>


<!-- content -->
<?php  
    include("../../connect/open.php");
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    }

    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($con,$sql);
    if($result != null){
        $password = mysqli_fetch_assoc($result);

    }
    
    
    include("../../connect/close.php");
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <?php include("../nav.php"); ?>
            </div>

            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row" style="height: 100px;">
                        <h2 style="text-align: center; color: red; text-transform: uppercase;">Thay đổi mật khẩu</h2>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="update_pass">
                                <form action="process.php" method="post">
                                <table>
                                    <tr>
                                        <td><h3>Mật khẩu cũ:</h3></td>
                                        <td>
                                            <h4>
                                                <input type="text" value="<?php echo $password["password"]?>" name="pass">
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h3>Mật khẩu mới:</h3></td>
                                        <td>
                                            <h4>
                                                <input type="text" placeholder="Mật khẩu mới" name="newpass">
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h3>Nhập lại mật khẩu mới:</h3></td>
                                        <td>
                                            <h4>
                                                <input type="text" placeholder="Nhập lại mật khẩu mới" name="repass">
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td>
                                           <button class="btn btn">Đổi</button>
                                            <?php  
                                                if(isset($_GET["err"])){
                                                    echo "<br>Nhập lại mật khẩu!<br>";
                                                }
                                            ?> 
                                        </td>
                                        
                                    </tr>
                                </table>
                                </form>
                            </div>
                            
                            
                        </div>
                    </div>
            
                </div>
            </div>

            <div class="col-lg-3"></div>
            
        </div>

        
    </div>

    <!-- footer -->
    <?php  
        include("../../footer.php");
    ?>
 
</body>
</html>