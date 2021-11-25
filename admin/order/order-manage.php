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
	<link rel="stylesheet" href="../../css/side_bar.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<?php
		include("../../connect/open.php");
				$search = "";
				$limit = 6;
			    $start = 0;
			    // Viết câu sql đếm tổng sản phẩm
			    $sqlDemHD = "SELECT COUNT(*) AS tongSoHD FROM bill";
			    $resultDemHD = mysqli_query($con, $sqlDemHD);
			    $demHD = mysqli_fetch_array($resultDemHD);
			    // Lấy tổng số trang 
			    $tongTrang = ceil($demHD["tongSoHD"] / $limit);
			    if (isset($_GET["trang"])) {
			      $trang = $_GET["trang"];
			      $start = ($trang - 1) * $limit;
			    }
				if(isset($_GET["search"])){
					$search = $_GET["search"];
				}
				$bill = "SELECT * FROM bill  WHERE  name_user   LIKE '%$search%' OR phone_number_user   LIKE '%$search%' OR time_buy   LIKE '%$search%' ORDER BY status ASC LIMIT $start,$limit ";
				$result = mysqli_query($con , $bill);
				if($result != null){
					$num = mysqli_num_rows($result);
				}
				
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
					
				?>
			
				<h2 class="text-center">Quản Lý Hóa Đơn</h2>
				
				<table>
					<tr>
						<th>STT </th>
						<th>Mã HĐ </th>
						<th>Tên người nhận </th>
						<th>Ngày mua hàng </th>
						<th>Số Điện Thoại </th>
						<th>Địa Chỉ Nhận Hàng </th>
						<th style="color: red;">Giá(VNĐ) </th>
						<th>Trạng thái</th>
						<th width="100px">Chi tiết</th>
					</tr>
					<tr>
						<td colspan="9"><hr></td>
					</tr>
						
						
					
					<?php  
						$index = 1;
						if($result != null){
					while($bill = mysqli_fetch_array($result) ) { ?>
							
							<tr>
								<td><?php echo $index++ ?></td>

								<td><?php echo $bill["id_bill"] ?></td>

								<td><?php echo $bill["name_user"] ?></td>

								<td><?php echo $bill["time_buy"] ?></td>

								<td><?php echo $bill["phone_number_user"] ?></td>

								<td><?php echo $bill["address_user"] ?></td>

								<td style="color: red;"><?php echo number_format($bill["price"], 0, '.',','); ?></td>

								<td><?php 
									if($bill["status"] == 0){
									?>
									<span style="color: skyblue;"><?php echo "Đang chờ duyệt"; ?></span>
									<?php	
									}else if($bill["status"] == 1){
									?>
									<span style="color: green;"><?php echo "Đã duyệt"; ?></span>
									<?php	
									}else if($bill["status"] == 2){
									?>
									<span style="color: red;"><?php echo "Đã hủy"; ?></span>
									<?php	
									}
									?>
										
								</td>

								<td>
									<a href="detail.php?id=<?php echo $bill["id_bill"]?>"><button class="success"><i class="fas fa-info"></i></button></a>
								</td>

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
</body>
</html>