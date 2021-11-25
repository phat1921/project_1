<?php  
session_start();
	if(isset($_SESSION["Sadmin"]) || isset($_SESSION["admin"])){

	}else{
		header("Location:../account/login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý Sản Phẩm</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../image/icon.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/css.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">


	
</head>
<body>
	<?php
		include("../../connect/open.php");
			$search = "";
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
			$search = "";
			if(isset($_GET["search"])){
				$search = $_GET["search"];
			}
			$products = "SELECT * FROM products  WHERE name LIKE '%$search%' OR brand LIKE '%$search%' OR name LIKE '%$search%' LIMIT $start,$limit ";
			$resultsql = mysqli_query($con , $products);
			if($resultsql != null){
				$num = mysqli_num_rows($resultsql);
			}
			$category = "SELECT * FROM detail_category";
			$resultCate = mysqli_query($con , $category);
				
		include("../../connect/close.php");
				
	?>

	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
	<div class="content">
	
		<div class="row">
			<form>
				<input type="text" name="search" placeholder ="Search..." value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
				<button class="btn btn"><i class="fa fa-search"></i></button>

			</form>
			
		</div>

		<div class="content_content">
			<?php  
			if(isset($search) && isset($num)){
					if($search != ""){
						echo "Tìm thấy $num kết quả liên qua tới '$search...'";
					}	
			}
			if(isset($_GET["err"])){
				echo "<strong>Bạn không được cấp quyền thực hiện thao tác này!</strong>";
			}		
			?>
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
				
				<table>
						<tr>
							<th>STT</th>
							<th>Mã sản phẩm</th>
							<th width="130px">Hình ảnh</th>
							<th>Tên Sản Phẩm</th>
							<th>Danh Mục</th>
							<th>Thương Hiệu</th>
							<th style="color: red;">Giá Bán(VNĐ)</th>
							<th>Số Lượng</th>
							<th width="100px">Sửa</th>
							<?php if(isset($_SESSION["Sadmin"])){ ?>
							<th width="100px">Xóa</th>
							<?php } ?>
						</tr>
						<tr>
							<td colspan="10"><hr></td>
						</tr>
				
				<?php  
					$index = 1;
					if($resultsql != null){
				while($products = mysqli_fetch_array($resultsql) ) { ?>
						<tr>
							<td><?php echo $index++; ?></td>

							<td><?php echo $products["id_products"]; ?></td>

							<td><img src="../../upload/<?php echo $products["image"]; ?>" style="width : 100px; height: 100px"></td>

							<td><?php echo $products["name"]; ?></td>

							<td>

								<?php
									include("../../connect/open.php");
										$category = "SELECT detail_category.id_category,detail_category.name, products.id_category FROM detail_category JOIN products ON  detail_category.id = products.id_category WHERE detail_category.id = ".$products["id_category"];
										
										$result_cate = mysqli_query($con , $category);
										
										if($result_cate != null){
										while($category = mysqli_fetch_array($result_cate) ) { 
											echo $category["name"]."<br>" ;
											break;
										} }
									include("../../connect/close.php");
								?>

							</td>

							<td><?php echo $products["brand"] ?></td>

							<td style="color: red;"><?php echo number_format($products["price"], 0, '.',','); ?></td>

							<td><?php echo $products["amount"] ?></td>

							<td>
								<a href="update.php?id=<?php echo $products['id_products']?>">
									<button class="warning"><i class="far fa-edit"></i></button>
								</a>
							</td>
							<?php if(isset($_SESSION["Sadmin"])){ ?>
							<td>
								<a href="delete.php?id=<?php echo $products['id_products']?>" onclick="return confirm('ARE YOU SURE?')">
									<button class="danger"><i class="fas fa-trash-alt"></i></button>
								</a>
							</td>
							<?php } ?>
						</tr>

				<?php } } ?>
				</table>
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
	</div>
	</div>
</body>
</html>