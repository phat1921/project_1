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
	<title>SnakesShop</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../../image/icon.jpg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<link rel="stylesheet" href="../../css/css.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">



</head>
<body>
	<?php
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			include("../../connect/open.php");
			$sqlPro = "SELECT * FROM products WHERE id_products = $id";
			$resultPro = mysqli_query($con,$sqlPro);
			$products = mysqli_fetch_array($resultPro);
			$sqlCate = "SELECT * FROM detail_category";
			$resultCate = mysqli_query($con , $sqlCate);
			include("../../connect/close.php");
		}else{
			header("Location:indexPro.php");
		}
		
		?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
			<div class="content">
			
				<div class="container">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2 class="text-center">Sửa Sản Phẩm</h2>
						</div>

						<div class="panel-body">
							<form action="update-process.php"  method="post">

								<input type="hidden" name="id" value="<?php echo $products["id_products"]?>">
								<!-- name  -->
								<div class="form-group">
								  <label for="name">Tên Sản Phẩm:</label>
								  
								  <input required="true" type="text" class="form-control" id="name" name="name" value="<?php echo $products["name"]?>">
							    </div>


							    <!-- id_category -->
							    <div class="form-group">
								  <label for="id_category">Danh Mục:</label>
								  <select class="form-control" name="id_category" id="id_category" value="<?php echo $products["id_category"]?>">
								<?php while($category = mysqli_fetch_array($resultCate)) {?>
											<option value="<?php echo $category["id"]?>"
												<?php
													if($category["id"] == $products["id_category"]){
													echo "selected";
												}
												?>
												>
												<?php echo $category["name"]?>
													
											</option>
								<?php }?>


								  </select>
							    </div>

							    <!-- brand -->
							    <div class="form-group">
								  <label for="brand">Thương Hiệu:</label>
								  
								  <input required="true" type="text" class="form-control" id="brand" name="brand" value="<?php echo $products["brand"]?>">
							    </div>



							    <!-- price -->
							    <div class="form-group">
								  <label for="price">Giá Bán:</label>
								  
								  <input required="true" type="number" class="form-control" id="price" name="price" value="<?php echo $products["price"]?>">
							    </div>

							     <!-- price -->
							    <div class="form-group">
								  <label for="amount">Số Lượng:</label>
								  
								  <input required="true" type="number" class="form-control" id="amount" name="amount" value="<?php echo $products["amount"]?>">
							    </div>



							    <!-- thumbnail -->
							    <div class="form-group">
								  <label for="image">Hình Ảnh:</label>
								 
								  <input required="true" type="file" class="form-control" id="image" name="image" value="<?php echo $products["image"]?>" onchange="updateImage()">
								  <img src="../../upload/<?php echo $products["image"]?>" alt="" width="150px">
							    </div>



							    <!-- Content -->
							    <div class="form-group">
								  <label for="description">Nội Dung:</label>
								  <textarea class="form-control" rows="5" name="description" id="description" >
								  	<?php echo $products["description"]?>
								  </textarea>
							    </div>


							    <button class="success">Save</button>
							   <br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script>
		function updateImage(){
			$('#img_image').attr('src' , $('#image').val())

		}
		$(function(){
			$('#description').summernote();
			 
			})
	</script>

	
</body>
</html>