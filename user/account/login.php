<?php  
    session_start();
    if(isset($_SESSION["email"])){
        header("Location:../home/index.php");
    }else{
        $check = false;
        if(isset($_COOKIE["email"]) ){
            $email = $_COOKIE["email"];
            $pass = $_COOKIE["password"];
            $check = true;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SnakesShop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../image/images.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../style_test.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../../checkLogin.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="header">
            <?php include("../../header.php"); ?>           
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row">
                        <div class="form_dang_nhap">
				
            				<form action="login-process.php" method="post" id="login-form" onsubmit="return check_user();">
            					<h2 class="text-center">Hãy Nhập Thông Tin </h2>
                                    <i class="fa fa-user"></i>
            						<input type="text" name="email" id="email"  placeholder="Your Email" value="<?php if($check){ echo $email;}?>"><br>
                                    <i class="fa fa-lock"></i>
            						<input type="password" name="pass" id="pass" placeholder="Password" value="<?php if($check){ echo $pass;}?>"><br>
                                    <input type="checkbox" name="remember" <?php if($check){ echo "checked";}?>><br>Remember<br>
                                    <?php  
                                        if(isset($_GET["err"])){
                                            echo "Email hoặc password không đúng!";
                                        }
                                    ?><br>
                                    

            						<button class="btn"  type="submit" >Login</button>
            						<button class="btn" type="reset" ><a href="registation.php">Đăng ký</a></button>
            				</form>
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