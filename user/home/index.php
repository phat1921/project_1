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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style_test.css">

</head>
<body>
	<header>
		<?php include("../../header.php"); ?>
	</header>


<!-- content -->
<?php  
    $con = mysqli_connect("localhost","root","","pj1");
    // Set sẵn số sản phẩm trên 1 trang
    $limit = 4;
    $start = 0;
    // Viết câu sql đếm tổng sản phẩm
    $sqlDemSp = "SELECT COUNT(*) AS tongSoSp FROM products";
    $resultDemSp = mysqli_query($con, $sqlDemSp);
    $demSp = mysqli_fetch_array($resultDemSp);
    // Lấy tổng số trang 
    $tongTrang = ceil($demSp["tongSoSp"] / $limit);
    if (isset($_GET["trang"])) {
      $trang = $_GET["trang"];
      $start = ($trang - 1) * $limit;
    }
    $products = "SELECT * FROM products ORDER BY id_products DESC LIMIT $start,$limit";
    $result = mysqli_query($con , $products);
    mysqli_close($con);
?>
    <div class="banner">
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row" style="height: 100px;">
                        <h2 style="text-align: center; text-transform: uppercase;"> Danh sách sản phẩm</h2>
                    </div>
                    <div class="row">

                        <?php while($products = mysqli_fetch_array($result)) {?>
                            <input type="text" hidden="true" name="id" value="<?php echo $products["id_products"]?>">
                                <div class="col">
                                        <a href="detail.php?id=<?php echo $products["id_products"]?>">
                                            <img src="../../upload/<?php echo $products["image"]?>" id="<?php echo $products["id_products"] ?>">
                                        </a><br>
                                        <a href="detail.php?id=<?php echo $products["id_products"]?>">
                                            <h4 style="text-align: center"><?php echo $products["name"] ?></h4>
                                        </a>
                                        <p style="text-align: center;"><?php echo number_format($products["price"], 0, '.', ',')." VNĐ"; ?></p>
                                        <div class="rating" style="
                                        color: #ff523b; text-align: center;">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <br>

                                </div>
                   
            
                        <?php 
                            } 
                        ?>
                    </div>
            
                </div>
                <div class="page">
                    <?php 
                        // Hiển thị danh sách trang
                        for ($i = 1; $i <= $tongTrang; $i++) {
                    ?>
                        <a href="?trang=<?php echo $i; ?>">
                                <?php echo $i; ?>
                        </a>
                    <?php
                        }
                    ?>    
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