
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
		<?php include("../../header.php"); ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row">
					<div class="form_dang_nhap">
                        <form action="regis-check.php" method="post" id="regis-form" onsubmit="return check_regis();">
                        <h2 class="text-center">Hãy Nhập Thông Tin </h2>

                            <input type="text" name="name"  placeholder="Name" id="name"><br>

                            Giới tính:
                            <select name="gt" value="Giới tính" id="sex">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select><br>

                            <input type="password" name="pass"  placeholder="Password" id="pass"><br>

                            <input type="password" name="repass"  placeholder="Confirmation Password" id="repass">
                             <br>

                            <input type="text" name="email"  placeholder="Email" id="email"><br>

                            <input type="number" name="sdt" placeholder="Phone Number" id="sdt"><br>

                            <input type="text" name="address" placeholder="Address" id="address"><br>
                            <?php  
                                if(isset($_GET["err"])){
                                    echo "Mật khẩu không khớp!";
                                }elseif(isset($_GET["error"])){
                                    echo "Emai đã tồn tại!";
                                }
                            ?>
                            <br>
                            <button class="btn"  type="submit">Đăng Ký</button>
                            <button class="btn" type="reset" >Reset</button>
                        </form>
                    </div>
				</div>

            </div>
        </div>
    
     </div>
    </div> 
	

	<!-- content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-2"></div>
			<div class="col-lg-3"></div>
			
		</div>

		
	</div>

	<!-- footer -->
    <footer>
        <div class="footer">
        <div class="container">
        <div class="row">
            <div class="footer-col-3">
                <h3>ĐỊA CHỈ</h3>
                <p>A17 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội</p>
                <p> vanyyy2001@gmail.com</p>
                <p> <b>0123.654.789</b></p>
            </div>
            <div class="footer-col-3">
                <h3>HỖ TRỢ</h3><br>
                        <p>Kiểm tra đơn hàng</p>
                        <p>Đăng nhập</p>
                        <p>Đăng ký</p>
                        <p>Giỏ hàng</p>
            </div>
            <div class="footer-col-3">
                <h3>CHÍNH SÁCH</h3><br>
                <p>Chính sách bảo mật</p>
                <p>Chính sách vận chuyển</p>
                <p>Chính sách đổi trả</p>
                <p>Quy định sử dụng</p>
            </div>
            <div class="footer-col-3">
                <h3>Gửi Email</h3><br>
                <p>Gửi email nhận khuyến mãi</p>
                <input type="text" name="email" placeholder="  Email của bạn" size="15px" class="input_one">
            </div>
            <div class="footer-col-3">
                <h3>KẾT NỐI</h3><br>
            </div>

        </div>
        <hr>
        <p class="Copy"> &copy; Copyright 2020 - ST & DP</p>
    </div>
</div>
    </footer>

</body>
</html>