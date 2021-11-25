<?php  
    session_start();
    
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

    $id = "";
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $product = "SELECT * FROM products WHERE id_products = '$id'";
    $result = mysqli_query($con , $product);
    mysqli_close($con);
        }else{
            header("location:pageHome.php");
        }
?>
    <div class="container">
        <div class="row">
            <!-- cot ben trai -->
            <div class="col-lg-1"></div>

            <!-- cot chinh giua de hien thi noi dung -->
            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row" style="width: 1350px; height: 100px;">
                        <h2 style="text-align: center; color: red; text-transform: uppercase;"> Detail Product</h2>
                    </div>
                    <div class="row">
                        <div class="small-container single-product">
                            <div class="row">
                            <?php   if($result != null){
                                 while($products = mysqli_fetch_array($result)){
                                    ?>
                                <div class="col">
                                  
                                    <img src="../../upload/<?php echo $products["image"]?>" width="400px" height="500px">
                                    

                                </div>

                                

                                <div class="col">
                                    
                                    <h1><?php echo $products["name"]?></h1>
                                    
                                    <h3>Thương hiệu: <?php echo $products["brand"]?></h3>
                                    <br>
                                    <p>Trạng thái: 
                                        <?php 
                                            if($products["amount"] > 0){
                                        ?>
                                            <span style="color: blue;">
                                                <?php 
                                                    echo "Còn hàng " . "( ".$products["amount"]." sản phẩm )";
                                                ?>
                                            </span>
                                        <?php
                                        }else{
                                        ?>
                                            <span style="color: red;">
                                                <?php 
                                                    echo "Hết hàng";
                                                ?>
                                            </span>
                                        <?php
                                            
                                        }?>
                                    </p>
                                    <br>
                                    <?php if( $products["amount"] > 0){ ?>
                                    <h3><?php echo number_format($products["price"],0,'.',',')?> VNĐ</h3>
                                     <br>
                                    
                                    
                                    <select style="width: 100px ; height: 30px;border-radius: 10px 10px 10px 10px " name="size">
                                        <option name="">Size Null</option>
                                                             
                                    </select><br> <br>
                                    <form action="../cart/cart.php?action=add" method="post">
                                    
                                    <input type="number" name="amount[<?php echo $products["id_products"]?>]" value="1" style="text-align:center;outline:none;width: 200px ; height: 30px;border-radius: 15px 15px 15px 15px " class="amount_product"><br> <br>
                                    
                                    
                                    <button class="btn">Add To Cart</button> 
                                    <?php } ?>
                                    
                                    </form>
                                     <br>
                                    <h3>Products Details <i class="fa fa-indent"></i> </h3>
                                    <br>
                                    
                                

                            </div>

                            <?php }} ?>
                            </div>
                        </div>
                    </div>
            
                </div>

            </div>

            <!-- cot ben phai -->
            <div class="col-lg-3"></div>
            
        </div>

        
    </div>

    <!-- footer -->
    <?php  
        include("../../footer.php");
    ?>
</body>
</html>