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
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/css.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/side_bar.css">

</head>
<body>
	<?php  
		include("../../connect/open.php");
		$sqldetail = "SELECT * FROM detail_category";
		$resultDET = mysqli_query($con , $sqldetail);
		$detail = mysqli_fetch_array($resultDET);
        $sqlCat = "SELECT * FROM category";
        $resultCat = mysqli_query($con , $sqlCat);
		include("../../connect/close.php");
	?>
	<div class="wrapper">
    
        <?php 

        include("../../side_bar.php");
        ?>

        <div class="content">
        	<div class="content_content">
        		<h2 class="text-center">Thêm danh mục</h2>
              <form action="add-process.php"  method="post">
                  <div class="form-group">
                        <label for="name"><b>Tên danh mục chi tiết:</b></label>
                        <input type="text" name="id" value="<?php echo $category["id"]?>" hidden="true">
                        <input required="true" type="text" class="form-control" id="name" name="name">
                        <br>
                        <br>
                        <label for="id_category"><b>Thuộc loại:</b></label>
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