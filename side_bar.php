
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SnakesShop</title>
	<link rel="shortcut icon" href="../images.png">
	<link rel="stylesheet" href="../css/css.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        
</head>
<body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Snake<span>Shop</span></div>
                    
                    <ul>
                        <li title="Log Out"><a href="../account/logout.php"><i class="fas fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <a href="../account/info.php"><img src="../../image/icon.jpeg" alt=""></a>
                        <p><?php
                            if(isset($_SESSION["Sadmin"])){
                                $Sadmin = $_SESSION["Sadmin"];
                                echo "<b>".$Sadmin."</b>";
                                echo "<br>(Quản Lý)";
                            }elseif (isset($_SESSION["admin"])) {
                                $admin = $_SESSION["admin"];
                                echo "<b>".$admin."</b>";
                                echo "<br>(Nhân Viên)";
                            }
                        ?>
                        </p>
                    </center>
                    <li class="item" id="category">
                        <a href="#category" class="menu-btn">
                            <i class="fas fa-table"></i><span>Quản lý danh mục<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../category/indexCate.php"><i class="fas fa-info-circle"></i><span>Xem thông tin danh mục</span></a>
                            <a href="../category/add.php"><i class="fas fa-plus-circle"></i><span>Thêm danh mục</span></a>
                        </div>
                    </li>

                    <li class="item" id="product">
                        <a href="#product" class="menu-btn">
                            <i class="fab fa-product-hunt"></i><span>Quản lý sản phẩm <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../product/indexPro.php"><i class="far fa-eye"></i><span>Xem sản phẩm</span></a>
                            <a href="../product/add.php"><i class="fas fa-plus-circle"></i><span>Thêm sản phẩm</span></a>
                        </div>
                    </li>

                    <li class="item" id="user">
                        <a href="#user" class="menu-btn">
                            <i class="fas fa-user"></i><span>Quản lý khách hàng <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../user-manage/user_manage.php"><i class="fas fa-info-circle"></i><span>Xem thông tin khách hàng</span></a>
                        </div>
                    </li>
                    <li class="item" id="admin">
                        <?php  
                            if(isset($_SESSION["Sadmin"])){     
                        ?>
                        <a href="#admin" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Quản lý nhân viên <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../admin-manage/admin_manage.php"><i class="far fa-eye"></i><span>Xem thông tin nhân viên</span></a>
                            <a href="../account/registation.php"><i class="fas fa-plus-circle"></i><span>Thêm tài khoản nhân viên</span></a>
                            
                        </div>
                         <?php } ?>
                    </li>

                    <li class="item" id="order">
                        <a href="#order" class="menu-btn">
                            <i class="fas fa-money-bill"></i>
                            <span>Quản lý hóa đơn 
                                <?php  
                                    include("connect/open.php");
                                    $sqlOrder = mysqli_query($con, "SELECT * FROM bill WHERE status = 0");
                                    $row = mysqli_num_rows($sqlOrder);
                                ?>
                                <button class="new_order"><?php echo $row;?></button>
                                <?php include("connect/close.php"); ?>
                                <i class="fas fa-chevron-down drop-down"></i>
                            </span>
                        </a>
                        <div class="sub-menu">
                            <a href="../order/order-manage.php"><i class="far fa-eye"></i><span>Xem hóa đơn</span></a>
                            <a href="../order/update-order.php"><i class="fas fa-pen"></i></i><span>Sửa hóa đơn</span></a>
                            <?php if(isset($_SESSION["Sadmin"])){ ?>
                            <a href="../order/delete-order.php"><i class="fas fa-trash"></i><span>Xóa hóa đơn</span></a>
                            <?php } ?>
                        </div>
                    </li>

                    <li class="item" id="revenue">
                        <a href="#revenue" class="menu-btn">
                            <i class="fas fa-dollar-sign"></i><span>Doanh thu<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="../revenue/revenue.php"><i class="fas fa-money-check"></i><span>Xem doanh thu</span></a>
                        </div>
                        
                    </li>
                </div>
            </div>
            <!--sidebar end-->
        </div>
        <!--wrapper end-->
</body>
</html>