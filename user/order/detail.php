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
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    $bill = "SELECT * FROM bill WHERE id_bill = ".$id;
    $resultBill = mysqli_query($con , $bill);
    if($resultBill != null){
        $info = mysqli_fetch_assoc($resultBill);
    }
    
    $detailbill = "SELECT detail_bill.id_bill,detail_bill.amount,detail_bill.price,products.image,products.name FROM detail_bill JOIN products ON detail_bill.id_products = products.id_products WHERE id_bill = ".$id;
    $result = mysqli_query($con , $detailbill);
    
    mysqli_close($con);
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <?php include("../nav.php"); ?>
            </div>

            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row" style="height: 100px;">
                        <h2 style="text-align: center; color: red; text-transform: uppercase;">Thông tin hóa đơn</h2>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="detail_bill">
                                <table class="info_cus_bill">
                                    <tr>
                                        <td><h3>Tên người nhận:</h3></td>
                                        <td><h4><?php echo $info["name_user"]; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Địa chỉ nhận hàng:</h3></td>
                                        <td><h4><?php echo $info["address_user"]; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Số điện thoại người nhận:</h3></td>
                                        <td><h4><?php echo $info["phone_number_user"]; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Thời gian đặt hàng:</h3></td>
                                        <td><h4><?php echo $info["time_buy"]; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Trạng thái đơn hàng:</h3></td>
                                        <td>
                                            <h4>
                                                <?php 
                                                    if($info["status"] == 0){
                                                        echo "Đang xác nhận";
                                                ?> 

                                                <?php 
                                                    }elseif($info["status"] == 1){
                                                        echo "Đã xác nhận";
                                                ?>

                                                <?php  
                                                    }elseif($info["status"] == 2){
                                                        echo "Đã hủy";
                                                ?>

                                                <?php  
                                                    }
                                                ?>
                                            </h4>
                                        </td>
                                    </tr>
                                </table>
                                <table class="note_bill">
                                    <tr style="color: red;">
                                        <th>Chi tiết:</th>
                                    </tr>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><hr></td>
                                    </tr>
                                    <?php  
                                        $index = 1;
                                        if($result != null){
                                    while($detail = mysqli_fetch_array($result) ) { ?>
                                            <tr>
                                                <td><?php echo $index++ ?></td>

                                                <td>
                                                    <?php 
                                                        echo $detail["name"];
                                                    ?>
                                                </td>
                                                <td>
                                                    <img src="../../upload/<?php echo $detail["image"] ?>" alt="" style="width: 100px; height: 100px">
                                                </td>

                                                <td><?php echo $detail["amount"] ?></td>
                                            </tr>

                                            <tr>
                                                <td colspan="4"><hr></td>
                                            </tr>
                                            
                                    <?php } } ?>
                                            
                                </table>
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