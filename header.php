<?php  
	include("connect/open.php");
	$result1 = mysqli_query($con , "SELECT * FROM detail_category WHERE id_category = 1");

	$result2 = mysqli_query($con , "SELECT * FROM detail_category WHERE id_category = 2");

	include("connect/close.php");
?>
	<div class="header">
		<div class="top">
			
			<div class="top-left">
				<form action="../../user/home/search.php" method="get">
					<input type="text" name="search" placeholder="Search..." value="<?php if (isset($_GET["search"])) {
                                          echo $_GET["search"];
                                        } ?>" class="input">
					<button><i class="fa fa-search"></i></button>
				</form>
			</div>
			

			<div class="top-center">
				<img src="../../image/logoshop.png">
			</div>

			<div class="top-right">
				<div class="account">
					<li> 
						<a>
			 				<i class="fa fa-user-circle" ></i><br>
				 				<?php if (isset($_SESSION["email"])){ 
				 					$email = $_SESSION["email"];
									echo $email;
					 			} else{ ?>
					 				<span>Tài khoản</span>	
					 			<?php }?>
				 				
			 			</a>
			 			<?php if (isset($_SESSION["email"])){ ?>
			 				<ul>
			 				<li>
			 					<a href="../info/index.php">Tài khoản</a>
			 				</li>
			 				
			 				<li>
			 					<a href="../account/logout.php">Đăng xuất</a>
			 				</li>
			 			</ul>
			 			<?php } else{ ?>
			 			<ul>
			 				<li>
			 					<a href="../account/login.php">Đăng nhập</a>
			 				</li>
			 				
			 				<li>
			 					<a href="../account/registation.php">Đăng ký</a>
			 				</li>
			 			</ul>	
			 			<?php }?>
			 		</li>	
			 	</div>
			 	
			 	<div class="cart">	
			 		<a href="../../user/cart/cart.php">
			 			<i class="fa fa-shopping-cart"></i>
			 			<button class="new_order">
			 				<?php
			 					if(!empty($_SESSION["cart"])){
			 						echo count($_SESSION["cart"]);
			 					}
			 					
			 				?>
			 					
			 			</button>
			 		</a>
			 	</div>	

			</div>
		</div>

		<div class="bottom">
			<nav>
				<ul>
					<li><a href="../home/index.php">HOME</a></li>


					<li>
						<a href="#">ÁO <i class="fa fa-caret-down"></i></a>
						<ul>
							<?php  
								if($result1 != null){
									while ($category1 = mysqli_fetch_array($result1)) {
							?>
							<li><a href="../../user/home/search.php?search=<?php echo $category1["name"] ?>" name="search"><?php echo $category1["name"]?></a></li>
							<?php
									}
								}
							?>
						</ul>
					</li>


					<li>
						<a href="#">QUẦN <i class="fa fa-caret-down"></i></a>
						<ul>
							<?php  
								if($result2 != null){
									while ($category2 = mysqli_fetch_array($result2)) {
							?>
							<li><a href="../../user/home/search.php?search=<?php echo $category2["name"] ?>" name="search"><?php echo $category2["name"]?></a></li>
							<?php
									}
								}
							?>
						</ul>
					</li>


				</ul>
			</nav>
		</div>
	</div>
