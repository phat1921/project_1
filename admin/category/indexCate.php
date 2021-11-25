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
	<link rel="stylesheet" href="../../css/css.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/side_bar.css">
</head>
<body>
	<?php
		include("../../connect/open.php");
					$search = "";
					if(isset($_GET["search"])){
						$search = $_GET["search"];
					}
					$sql = "SELECT * FROM detail_category WHERE name LIKE '%$search%'";
					$resultCate = mysqli_query($con,$sql);
					$num = mysqli_num_rows($resultCate);
		include("../../connect/close.php");
	?>
	<div class="wrapper">
	
		<?php 
			include("../../side_bar.php");
		?>
	
	
		<div class="content">

			<!--  tìm kiếm -->
			<div class="row">
				<form>
					<input type="text" name="search" placeholder ="Search..." value="<?php if (isset($_GET["search"])) {
	                                              echo $_GET["search"];
	                                            } ?>" >
					<button><i class="fa fa-search"></i></button>

				</form>
				
			</div>

			<!--  hiện thị nội dung -->
			<div class="content_content">
				<?php  if(isset($search)){
				if( $search != ""){
					echo "Tìm thấy $num kết quả liên qua tới '$search...'";
					}
				}
				if(isset($_GET["err"])){
					echo "<strong>Bạn không được cấp quyền thực hiện thao tác này!</strong>";
				}
				?>
				<h2 class="text-center">Quản Lý Danh Mục</h2>
				<table>
					<tr>
						<th>STT</th>
						<th width="300px">TÊN DANH MỤC</th>
						<th width="100px">Sửa</th>
						<?php if(isset($_SESSION["Sadmin"])){ ?>
						<th width="100px">Xóa</th>
						<?php } ?>
					</tr>
					<tr>
						<td colspan="4"><hr></td>
					</tr>
					<?php
						$index = 1;
						if($resultCate != null){
						while($category = mysqli_fetch_array($resultCate)){
							
					?>
						
					<tr>
						<td><?php echo $index++ ?></td>

						<td><?php echo $category["name"] ?></td>

						<td>
							<a href="update.php?id=<?php echo $category["id"]?>"><button class="warning" ><i class="far fa-edit"></i></button></a>
						</td>
						<?php 
							if(isset($_SESSION["Sadmin"])){
								include("../../connect/open.php");
									$sqlCheck = mysqli_query($con, "SELECT amount FROM products WHERE id_category =".$category["id"]);
									$amountPro = 0;
									if($sqlCheck != null){
										while ($num = mysqli_fetch_array($sqlCheck)) {
											$amountPro += $num["amount"];
										}
									}
									if($amountPro == null){
								include("../../connect/close.php");
						?>
						<td>
							<a href="delete.php?id=<?php echo $category["id"]?>" onclick=" return confirm('ARE YOU SURE ?')"><button class="danger"><i class="fas fa-trash-alt"></i></button></a>
						</td>
						<?php }} ?>
					</tr>
					
					<?php }} ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>