<?php  
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products of Snake</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../image/icon.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../style_test.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .input{
          border-radius: 20px 20px 20px 20px;
          width: 200px;
          height: 30px;
          outline: none;
          
        }
    </style>
</head>
<body>
	<header>
		<?php include("../../header.php"); ?> 
	</header>


<!-- content -->
<?php  
    include("../../connect/open.php");
    $search = "";
    $limit = 4;
    $start = 0;
    // Viết câu sql đếm tổng sản phẩm
    $sqlDemSp = "SELECT COUNT(*) AS tongSoSp FROM products  ";
    $resultDemSp = mysqli_query($con, $sqlDemSp);
    $demSp = mysqli_fetch_array($resultDemSp);
    // Lấy tổng số trang 
    $tongTrang = ceil($demSp["tongSoSp"] / $limit);
    if (isset($_GET["trang"])) {
      $trang = $_GET["trang"];
      $start = ($trang - 1) * $limit;
    }
    if(isset($_GET["search"])){
        $search = $_GET["search"];
    }
    $product = "SELECT products.id_products, products.image, products.name, products.id_category, products.brand, products.price, products.amount FROM products LEFT JOIN detail_category ON products.id_category = detail_category.id  WHERE products.name LIKE '%$search%' OR products.brand LIKE '%$search%' OR detail_category.name LIKE '%$search%' LIMIT $start,$limit";
    $resultsql = mysqli_query($con , $product);
    if($resultsql != null){
        $num = mysqli_num_rows($resultsql);
    }
    include("../../connect/close.php");
?>

    <div class="container">
         <?php  
            if(isset($search) && isset($num)){
                
                    if($search != ""){
                    echo "<br>Tìm thấy $num kết quả liên qua tới '$search...'";
                    }

                
            }
                
            ?>
        <div class="row">

            <div class="col-lg-1">
            </div>
            <div class="col-lg-2">
                <div class="small-container">
                    <div class="row" style="height: 100px;">
                        <h2 style="text-align: center; color: red; text-transform: uppercase;"> Product in the my shop</h2>
                    </div>
                    <div class="row">
                        <?php
                            if($resultsql != null){ 
                            while($products = mysqli_fetch_array($resultsql)) {
                        ?>  
                            <input type="text" hidden="true" name="id" value="<?php echo $products["id_products"]?>">
                            <div class="col">
                                <a href="detail.php?id=<?php echo $products["id_products"]?>"><img src="../../upload/<?php echo $products["image"]?>" width="400px" height="450px" id="<?php echo $products["id_products"] ?>"></a><br>
                                <a href="detail.php?id=<?php echo $products["id_products"]?>"><h4 style="text-align: center"><?php echo $products["name"]?></h4></a>
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
                        <?php }} ?>
                    </div>
            
                </div>
                <div class="page">
                    <?php 
                        // Hiển thị danh sách trang
                        for ($i = 1; $i <= $tongTrang; $i++) {
                            if(isset($search)){
                    ?>
                            <a href="?search=<?php echo $search; ?>&trang=<?php echo $i; ?>">
                            <?php echo $i; ?>
                            </a>
                    <?php
                        }}
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