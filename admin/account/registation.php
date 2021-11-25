<?php  
    session_start();
    if(!isset($_SESSION["Sadmin"])){
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
    <title>SnakesShop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../image/icon.jpg">
    <link rel="stylesheet" href="../../css/css.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/side_bar.css">

</head>
<body>
    <div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>

    <div class="content">
        <div class="content_content">
            <div id="form_login">
                <h2 class="text-center">Đăng ký thành viên mới </h2>
                    
                    <table>
                        <form action="check.php" method="post">
                            <tr>
                                <td>Tên thành viên:</td>
                                <td><input type="text" name="name" required="true" placeholder="Name"></td>
                            </tr>

                            <tr>
                                <td>Giới tính:</td>
                                <td><select name="sex" value="Giới tính">

                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select></td>
                            </tr>

                            <tr>
                                <td>Tên đăng nhập:</td>
                                <td><input type="text" name="user" required="true" placeholder="Username"></td>
                            </tr>
                            
                            <tr>
                                <td>Mật khẩu:</td>
                                <td><input type="text" name="pass" required="true" placeholder="Password"></td>
                            </tr>

                            <tr>
                                <td>Nhập lại mật khẩu:</td>
                                <td><input type="text" name="repass" required="true" placeholder="Confirmation Password"></td>
                            </tr>
                            <?php if(isset($_GET["err"])){ echo "Nhập lại mật khẩu"; } ?>
                                
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" required="true" placeholder="Email"></td>
                            </tr>

                            <tr>
                                <td>Số điện thoại:</td>
                                <td><input type="number" name="phone" placeholder="Phone Number"></td>
                            </tr>

                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input type="text" name="address" placeholder="Address"></td>
                            </tr>

                            <tr>
                                <td>Chức vụ:</td>
                                <td><select name="role" value="Chức vụ">

                                <option value="1">Nhân viên</option>
                                <option value="0">Quản lý</option>
                            </select></td>
                            </tr>

                            <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    <button class="success"  type="submit">Đăng Ký</button>
                                </td>
                                
                            </tr>
                        </form>      
                    </table>
                    
                </div>
            </div>
    </div>
        
    </div>
</body>
</html>