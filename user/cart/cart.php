<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("location:../home/index.php");
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style_test.css">
    <script src="../../checkLogin.js"></script>

</head>
<body>
	<header>
		<?php include("../../header.php"); ?>
	</header>


<!-- content -->
<?php  
    include("../../connect/open.php");
    // kiểm tra có tồn tại giỏ hàng hay không
        if(!isset($_SESSION["cart"])){
            // nếu không tồn tại giỏ hàng thì khai báo một mảng trống
            $_SESSION["cart"] = array();
        }
    // kiểm tra có dữ liệu gửi đến với biến action không 
        if(isset($_GET["action"])){
            $err = false;
            $success = "";

            // hàm thêm đơn hàng và cập nhật giỏ hàng
            function update($add = false){

                foreach ($_POST["amount"] as $id_products => $amount) {
                    include("../../connect/open.php");
                    $check = mysqli_query($con, "SELECT * FROM products WHERE id_products ='$id_products'");
                    $num_amount = mysqli_fetch_assoc($check);
                    include("../../connect/close.php");
                    if( $amount <= $num_amount["amount"]){

                        // nếu số lượng bằng 0 thì xóa đơn hàng
                        if($amount == 0 || $amount < 0){
                            unset($_SESSION["cart"][$id_products]);
                        }else{
                            
                            // nếu tồn tại biến add thì cộng thêm giá trị biến add vào cho số lượng của đơn hàng
                            if($add){
                                $_SESSION["cart"][$id_products] += $amount;
                            }else{
                            // nếu không thì cập nhật bằng số lượng khác
                                $_SESSION["cart"][$id_products] = $amount;
                            }  
                        }
                    }else{
                        $_SESSION["cart"][$id_products] = $num_amount["amount"];
                    }   
                    
                }
            }
            // câu điền kiện kiểm tra action
            switch ($_GET["action"]) {

                // nếu có giá trị là add thì thực hiện thêm đơn hàng
                case "add":
                    update(true);
                    header("location:../cart/cart.php");
                    break;
                // nếu action bằng delete thì thực hiện lệnh xóa session đối với id được gửi lên 
                case "delete":
                    if(isset($_GET["id_products"])){
                        unset($_SESSION["cart"][$_GET["id_products"]]); 
                    }
                    header("location:cart.php");
                    break;
                // nếu giá trị bằng submit thì thực hiện cập nhật hoặc đặt hàng
                case "submit":
                    // kiểm tra xem nút cập nhập được nhấn không
                    if(isset($_POST["update_click"])){
                        update();
                        header("location:cart.php");
                    // nếu không thì kiểm tra xem nút đặt hàng được nhấn không
                    }elseif($_POST["order_click"]){

                        // kiểm tra thông tin khách hàng nhập vào đủ chưa
                        if(empty($_POST["name"])){
                            echo "Chưa nhập tên người nhận!";
                        }elseif(empty($_POST["phone"])){
                            echo "Chưa nhập số điện thoại người nhận!";
                        }elseif(empty($_POST["address"])){
                            echo "Chưa nhập địa chỉ người nhận!";
                        }else{

                            //start lấy địa chỉ id người dùng từ session xuống
                            if(isset($_SESSION["email"])){
                                date_default_timezone_set("Asia/Ho_Chi_Minh");
                                $email = $_SESSION["email"];
                                $result = mysqli_query($con, "SELECT * FROM customer WHERE email = '$email'");
                                $user = mysqli_fetch_array($result);
                                $id_user = $user["id_user"];
                                $time  = date("Y-m-d H:i:s");

                                //start kiểm tra lỗi và số lượng sản phẩm có tồn tại hay không 
                                if($err == false && !empty($_POST["amount"])){


                                        $products = mysqli_query($con , "SELECT * FROM products WHERE id_products IN (".implode(",",array_keys($_POST["amount"])).")");
                                        $sum = 0;
                                        $minus = 0;
                                        // khai báo một biến được gắn vào mảng để lấy dữ liệu sản phẩm
                                        $orderProduct = array();
                                        while ($row = mysqli_fetch_array($products)){
                                            if($row["amount"] >= $_POST["amount"][$row["id_products"]]){
                                                $orderProduct[] = $row;

                                                // tính tổng tiền của sản phẩm
                                                $sum += $row["price"] * $_POST["amount"][$row["id_products"]];
                                                $minus = ($row["amount"] - $_POST["amount"][$row["id_products"]]);
                                                $amountUpdate = mysqli_query($con, "UPDATE products SET amount = '$minus' WHERE id_products =".$row["id_products"]);
                                            }else{
                                                header("location:cart.php");
                                                die();
                                            }
                                            
                                        }

                                        // đưa thông tin hóa đơn lên database
                                        $insertOrder = "INSERT INTO bill(id_bill, id_user, time_buy, name_user, phone_number_user, address_user, price, status) VALUES (NULL,'".$id_user."','".$time."','".$_POST["name"]."','".$_POST["phone"]."','".$_POST["address"]."','".$sum."',0)";
                                        $resultOrder = mysqli_query($con , $insertOrder);

                                        // lấy địa chỉ id của hóa đơn
                                        $orderID = $con-> insert_id;

                                        // khai báo một chuỗi trống để lưu giá trị của các sản phẩm được mua
                                        $insertString = "";
                                        $updateString = "";
                                        foreach($orderProduct as $key => $product){

                                            // chuỗi giá trị các sản phẩm
                                            $insertString .= "('".$orderID."','".$product["id_products"]."','".$_POST['amount'][$product['id_products']]."','".$product["price"]."')"; 
                                            // kiểm tra nếu $key là số id của sản phẩm khác với số id của sản phẩm cuối thì cộng thêm dấu phẩy vào chuỗi
                                            if($key != count($orderProduct) - 1){
                                                $insertString .= ",";

                                            }

                                        }

                                        // thực hiện thêm chi tiết hóa đơn cho hóa đơn 
                                        $insertOrder = mysqli_query($con ,"INSERT INTO detail_bill(id_bill, id_products, amount, price) VALUES ".$insertString.";");
                                        $success = "Đã đặt hàng thành công. Xin mời mua hàng tiếp!";
                                        unset($_SESSION["cart"]);
                                       
                                }
                                // end kiểm tra lỗi
                                
                            }
                            // end lấy địa chỉ người dùng
                             
                        }
                        // của else
                    }  
                    //end elseif kiểm tra nút mua hàng 
                    break;
            }
            // end switch 
        }
        // end kiểm tra action
        
        // kiểm tra xem giỏ hàng có trống không
        if(!empty($_SESSION["cart"])){
            $products = mysqli_query($con , "SELECT * FROM products WHERE id_products IN (".implode(",",array_keys($_SESSION["cart"])).")");
            
        }

        include("../../connect/close.php");

?>

    <div class="container">
        <?php 
            if(!empty($err)) { 
        ?>
            <div class="notify">
                <?php echo $err;?>
            </div>

        <?php } 
            if(!empty($success)){
        ?>
            <div class="notify">
                <img src="../../image/tich.png" alt=""><br>
                <h4><?php echo $success;?></h4>
                <a href="../home/index.php">Về trang chủ</a>
            </div>

        <?php } 
            elseif(empty($_SESSION["cart"])){
        ?>
            <div class="notify">
                <img src="../../image/unnamed.png" alt=""><br>
                <h4><?php echo "Giỏ hàng hiện chưa có sản phẩm";?></h4>
                <a href="../home/index.php">Về trang chủ</a>
            </div>

        <?php }else{?>

            <div class="row">
            <!-- cot ben trai -->
            <div class="col-lg-1"></div>

            <!-- cot chinh giua de hien thi noi dung -->
            <div class="col-lg-2">
                <!-- start small container -->
                <div class="small-container">


                    <div class="row">
                        <h2 class="h2"> Giỏ hàng</h2>
                    </div>

                    <!-- start row -->
                    <div class="row">
                        
                        <!-- start form -->
                        <form action="cart.php?action=submit" method="post">

                            <!-- start table -->
                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th style="color: red;">Giá tiền(VNĐ)</th>
                                    <th>Số lượng</th>
                                    <th style="color: red;">Thành tiền(VNĐ)</th>
                                    <th width="100px">Xóa</th>
                                </tr>
                                <tr>
                                    <td colspan="7"><hr></td>
                                </tr>

                                <?php  
                                    $sum = 0;
                                    $index = 1;

                                    if($products != null){
                                    while ($row = mysqli_fetch_array($products)) { ?>
                                    <tr>
                                        <td><?php echo $index++?></td>
                                        <td><?php echo $row["name"]?></td>
                                        <td><img src="../../upload/<?php echo $row["image"]?>"></td>
                                        <td style="color: red;"><?php echo number_format($row["price"],0,'.',',')?></td>
                                        <td><input type="text" value="<?php echo $_SESSION["cart"][$row["id_products"]]?>" name="amount[<?php echo $row["id_products"] ?>]"></td>
                                        <td style="color: red;"><?php echo number_format($row["price"] * $_SESSION["cart"][$row["id_products"]],0,'.',',');?></td>
                                        <td><a href="cart.php?action=delete&id_products=<?php echo $row['id_products']?>"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php  
                                        $sum += $row["price"] * $_SESSION["cart"][$row["id_products"]];
                                    } ?>
                                    
                                
                            </table>
                            <!-- end table -->
                            <?php 
                                echo "Tổng tiền = ". number_format($sum,0,'.',',')." VNĐ";
                            }
                            ?>
                            
                            <div class="update_order">
                                <input type="submit" name="update_click" value="Cập nhật">
                            </div>
                            <hr>
                            <?php  
                                include("../../connect/open.php");
                                if(isset($_SESSION["email"])){

                                $email_name = $_SESSION["email"];
                                $resultEmail = mysqli_query($con, "SELECT * FROM customer WHERE email = '$email_name'");
                                $name = mysqli_fetch_array($resultEmail);
                                include("../../connect/close.php");
                            ?>
                            <h3>Thông tin người nhận</h3>
                            <div class="info_order">
                                <label>Tên người nhận:</label>
                                <input type="text" value="<?php echo $name['name'];?>" name="name" >
                            </div>

                            <div class="info_order">
                                <label>Số điện thoại:</label>
                                <input type="number" value="<?php echo $name['phone_number'];?>" name="phone">
                            </div>

                            <div class="info_order">
                                <label>Địa chỉ:</label>
                                <input type="text" value="<?php echo $name['address'];?>" name="address">
                            </div>
                            <?php } ?>
                            
                            <div class="info_order">
                                <label>Phương thức thanh toán:</label>
                                <select name="pay">
                                	<option value="Nhận tiền tại nhà">
	                                	Nhận tiền tại nhà (COD)
	                                </option>
                                </select>
                            </div>
                            <input type="submit" name="order_click" value="Đặt hàng" class="order_click">
                            
                        </form>
                        <!-- end form -->

                        
                        
                    </div>
                    <!-- end row -->
            
                </div>
                <!-- end small container -->

            </div>
            <!-- end cột giữa -->

            <!-- cot ben phai -->
            <div class="col-lg-3"></div>
            
        </div>
        <?php } ?>
        

        
    </div>

    <!-- footer -->
    <?php  
        include("../../footer.php");
    ?>
    
</body>
</html>