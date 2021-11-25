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
    $con = mysqli_connect("localhost","root","","pj1");
    if(isset($_SESSION["email"])) { 
        $email = $_SESSION["email"];
    }
    $id_user = "SELECT * FROM customer WHERE email = '$email'";
    $resultId = mysqli_query($con , $id_user);
    $row = mysqli_fetch_assoc($resultId);
    $id = $row["id_user"];
    $sqlOrder = "SELECT * FROM bill WHERE id_user = '$id' ORDER BY status ASC ";
    $resultOrder = mysqli_query($con, $sqlOrder);
    
    mysqli_close($con);
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-1">
            </div>

            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row" style="height: 100px;">
                        <h2 style="text-align: center; color: red; text-transform: uppercase;">Thông tin hóa đơn</h2>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="update.php" method="post" class="detail_order">
                                <table >
                                    <tr class="title_detail_order">
                                        <th>Mã hóa đơn</th>
                                        <th>Tên người nhận</th>
                                        <th width="300px">Sản phẩm</th>
                                        <th>Thời gian mua</th>
                                        <th>Địa chỉ nhận hàng</th>
                                        <th>Số điện thoại</th>
                                        <th style="color: red;">Giá Bán(VNĐ)</th>
                                        <th width="150px">Trạng thái</th>
                                        <th width="60px">Chi tiết</th>
                                        <th width="60px">Hủy</th>
                                    </tr>
                                    <tr>
                                        <td colspan="10"><hr></td>
                                    </tr>
                                    <?php
                                        if($resultOrder != null){
                                        while ($Order = mysqli_fetch_array($resultOrder)) {         
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $Order['id_bill'];;?>
                                        </td>
                                        <td>
                                            <?php echo $Order['name_user'];?>
                                        </td>
                                        <td>
                                            <?php
                                                include("../../connect/open.php");
                                                $detailbill = "SELECT detail_bill.id_bill,detail_bill.amount,detail_bill.price,products.image,products.name FROM detail_bill JOIN products ON detail_bill.id_products = products.id_products WHERE id_bill = ".$Order["id_bill"];
                                                $result_product = mysqli_query($con , $detailbill);
                                                include("../../connect/close.php");
                                                if($result_product != null){
                                                while($detail = mysqli_fetch_array($result_product) ) { 
                                                    echo $detail["name"]."<br>" ;
                                                } } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $Order['time_buy'];?>
                                        </td>
                                        <td>
                                            <?php echo $Order['address_user'];?>
                                        </td>
                                        <td>
                                            <?php echo $Order['phone_number_user'];?>
                                        </td>
                                        <td style="color: red;">
                                            <?php echo number_format($Order['price'], 0,'.', ',');?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($Order["status"] == 0){
                                                    echo "Chờ xác nhận";
                                                }elseif($Order["status"] == 1){
                                                    echo "Đã xác nhận";
                                                }elseif($Order["status"] == 2){
                                                    echo "Đã hủy";
                                                }
                                            ?>
                                        </td>
                                        
                                        <td>                                          
                                            <a href="detail.php?id=<?php echo $Order['id_bill'];?>" class="success">
                                                <i class="fa fa-info"></i>
                                            </a>
                                        </td>
                                        <?php  
                                            if($Order["status"] == 0){
                                        ?>
                                        <td>                                          
                                            <a href="cancel.php?id=<?php echo $Order['id_bill'];?>" onclick="return confirm('Are You Sure?')" class="danger">
                                                <i class="fa fa-times-circle"></i>
                                            </a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td colspan="10"><hr></td>
                                    </tr>
                                    <?php
                                        } }
                                    ?>
                                </table>
                            
                            </form>
                            
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