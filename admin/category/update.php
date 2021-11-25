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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SnakesShop</title>
	<link rel="shortcut icon" href="../../image/icon.jpg">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/css.css">
	<link rel="stylesheet" href="../../css/side_bar.css">


</head>
<body>
	<?php
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			include("../../connect/open.php");
			$sql = "SELECT * FROM detail_category WHERE id = $id";
			$resultCate = mysqli_query($con,$sql);
			
			$category = mysqli_fetch_array($resultCate);
			$sqlCat = "SELECT * FROM category";
        	$resultCat = mysqli_query($con , $sqlCat);
        	include("../../connect/close.php");
		}else{
			header("Location:indexCate.php");
		}

		?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>
	
	<!-- phần nội dung -->
		<div class="content">
			<div class="content_content">
				<h2 class="text-center">Sửa danh mục</h2>
				<form action="update-process.php" method="post">
					<div class="form-group">
					  	<label for="name"><b>Tên danh mục chi tiết:</b></label>
					  	<input type="text" name="id" value="<?php echo $category["id"]?>" hidden="true">
					  	<input required="true" type="text"id="name" name="name" value="<?php echo $category["name"]?>">
					  	<br>
					  	<br>
					  	<label for="name"><b>Thuộc loại:</b></label>
					  	<input type="text" name="id" value="<?php echo $category["id"]?>" hidden="true">
					  	<select class="form-control" name="id_category" id="id_category" value="<?php echo $products["id_category"]?>">
                            <?php while($category = mysqli_fetch_array($resultCat)) {?>
                                <option value="<?php echo $category["id_category"]?>">
                            <?php echo $category["name"]?>
                                </option>
                            <?php }?>
                        </select>
					  <br>
					  <br>
					  <button class="success">LƯU</button>
				    </div>
					    
				</form>
		
			</div>
		</div>
	</div>
</body>
</html>