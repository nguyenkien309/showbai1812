<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../../public/site/temp2/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../../public/site/temp2/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../../public/site/temp2/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../../public/site/temp2/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../../public/site/temp2/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../../public/site/temp2/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../../public/site/temp2/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../../public/site/temp2/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../../public/site/temp2/css/responsive.css">
	<?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
</head>
<?php
	if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
	if(isset($_GET['delid'])&&($_GET['delid'] >= 0)){
		array_splice($_SESSION['cart'],$_GET['delid'],1);
	}
	if(isset($_POST['addcart']) && ($_POST['addcart'])){
		$image = $_POST['hinh'];
		$name = $_POST['ten'];
		$origin = $_POST['xuatxu'];
		$price = $_POST['gia'];
		$qty = $_POST['soluong'];
		$check = false;
		for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
			if($_SESSION['cart'][$i][1] == $name && $_SESSION['cart'][$i][2] == $origin) {
				$check = true;
				$qtynew = $qty + $_SESSION['cart'][$i][4]; 
				$_SESSION['cart'][$i][4] = $qtynew;
				break;
			}
		}
		if($check == false){
			$sp=[$image,$name,$origin,$price,$qty,];
			$_SESSION['cart'][]=$sp;
		}
		var_dump($_SESSION['cart']); 
	}
	function showcart(){
		if(isset($_SESSION['cart']) && (is_array($_SESSION['cart']))){
			for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
				$total = $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
				echo '<tr class="table-body-row">
				<td class="product-stt">'.($i+1).'</td>
				<td class="product-image"><img src="'.$_SESSION['cart'][$i][0].'"></td>
				<td class="product-name">'.$_SESSION['cart'][$i][1].'</td>
				<td class="product-origin">'.$_SESSION['cart'][$i][2].'</td>
				<td class="product-price">$'.$_SESSION['cart'][$i][3].'</td>
				<td class="product-quantity">'.$_SESSION['cart'][$i][4].'</td>
				<td class="product-total">'.$total.'$</td>
				<td class="product-remove"><a href="cart.php?delid='.$i.'" ><i class="far fa-window-close"></i></a></td>
				</tr>';
			}
		}
	}

	function Tax(){
		$countsession =0;
		$shipping = 0;
		$subtotal = 0;
		$Total_bill = 0;
		for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
			$countsession += $_SESSION['cart'][$i][4]; 	
			if($countsession > 0) $shipping = 5;
			$total = $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
			$subtotal += $total;
		}
		$Total_bill += $subtotal + $shipping;

		echo '<tr class="total-data">
		<td><strong>Subtotal: </strong></td>
		<td>'.$subtotal.'$</td>
		</tr>
		<tr class="total-data">
			<td><strong>Shipping: </strong></td>
			<td>'.$shipping.'$</td>
			<td><?php countSS(); ?></td>
		</tr>
		<tr class="total-data">
			<td><strong>Total: </strong></td>
			<td>'.$Total_bill.'$</td>
		</tr>';
	}

	function countSS(){
		$countsession =0;
		for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
			$countsession += $_SESSION['cart'][$i][4]; 
		}
		echo ''.$countsession.'';
	}
?>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="../../public/site/temp2/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul>
								</li>
								<li><a href="about.html">About</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li>
								<li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<button></button>
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart --> 
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-stt" style="font-weight: bold;">STT</th>
									<th class="product-image" style="font-weight: bold;">Loại Sản Phẩm</th>
									<th class="product-name" style="font-weight: bold;">Tên Sản Phẩm</th>
									<th class="product-origin" style="font-weight: bold;">Xuất Xứ</th>
									<th class="product-price" style="font-weight: bold;">Giá</th>
									<th class="product-quantity" style="font-weight: bold;">Số Lượng</th>
									<th class="product-total" style="font-weight: bold;">Tổng</th>
									<th class="product-remove" style="font-weight: bold;"></th>
								</tr>
							</thead>
							<tbody>
								<?php showcart(); ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th style="font-weight: bold;">Total</th>
									<th style="font-weight: bold;">Price</th>
								</tr>
							</thead>
							<tbody>
								<?php Tax(); ?>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="./checkout.php" class="boxed-btn black">Check Out</a>
						</div>
					</div>
					
					<!-- <a href="./destroy.php">DESTROY</a> -->
					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
								
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="../../public/site/temp2/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../public/site/temp2/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../public/site/temp2/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../public/site/temp2/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../public/site/temp2/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="../../public/site/temp2/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../../public/site/temp2/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../../public/site/temp2/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../../public/site/temp2/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../../public/site/temp2/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../../public/site/temp2/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../../public/site/temp2/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../../public/site/temp2/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../../public/site/temp2/js/sticker.js"></script>
	<!-- main js -->
	<script src="../../public/site/temp2/js/main.js"></script>

</body>
</html>