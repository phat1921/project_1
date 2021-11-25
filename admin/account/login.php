<?php  
    session_start();
    if(isset($_SESSION["Sadmin"]) || isset($_SESSION["admin"])){
        header("Location:../category/indexCate.php");
    }else{
        $check = false;
        if(isset($_COOKIE["username"]) ){
            $user = $_COOKIE["username"];
            $pass = $_COOKIE["password"];
            $check = true;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập tài khoản</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../image/icon.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/login-css.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../../checkLogin.js"></script>
</head>
<body>
    <div class="login">
        <form action="login-process.php" method="post" onsubmit="return check_admin();">
            <legend>
                <h2 class="text-center">LOGIN </h2>
                <h4 class="text-center">Please enter your username and password:</h4>
            </legend>
                Username:<br>
                <i class="fa fa-user"></i>
                <input type="text" name="user"  placeholder=" Username" value="<?php if($check){ echo $user;}?>" id="user">
                <br><br>
                Password:<br>
                <i class="fa fa-lock"></i>
                <input type="password" name="pass"  placeholder=" Password" value="<?php if($check){ echo $pass;}?>" id="pass"><br>
                                 
                <input type="checkbox" name="remember" <?php if($check){ echo "checked";}?> id="remember"> Remember your user and password <br>
                                    <?php
                                        if(isset($_GET["err"])){
                                            echo "<br>Mật khẩu hoặc tài khoản không đúng!";
                                        }
                                    
                                    ?><br>
                <button type="submit">Login</button><br>
        </form> 
    </div>
</body>
</html>