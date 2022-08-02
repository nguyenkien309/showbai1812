<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Check Out</title>

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
 
	function showdetail(){ 
		if(isset($_SESSION['cart'])){
			for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
				$total = $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
				echo '<tr class="table-body-row" style="text-align: center;">
				<td class="product-image"><img src="'.$_SESSION['cart'][$i][0].'"></td>
				<td class="product-name">'.$_SESSION['cart'][$i][1].'</td>
				<td class="product-origin">'.$_SESSION['cart'][$i][2].'</td>
				<td class="product-total">'.$total.'$</td>';
			}
		}
	}

	$countsession =0;
	$totalprice = 0;
		for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
			$totalprice += $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
			$countsession += $_SESSION['cart'][$i][4]; 
		}
	function countSS(){
		$countsession =0;
		for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
			$countsession += $_SESSION['cart'][$i][4]; 
		}
		echo ''.$countsession.'';
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// var_dump($_POST);
		$data =
			[
				"email" => $_POST['email'] ? $_POST['email'] : '',
				"ten" => $_POST['ten'] ? $_POST['ten'] : '',
				"address" => $_POST['address'] ? $_POST['address'] : '',
				"qty" => $_POST['qty'] ? $_POST['qty'] : '',
				"price" => $_POST['price'] ? $_POST['price'] : '',
				"created_at" => $_POST['created_at'] ? $_POST['created_at'] : '',
			];
		$insert = $db->insert('orders', $data);
		if ($insert > 0) {
			$arrCart = [];
			foreach ($_SESSION['cart'] as $key => $value){
				$arrCart[$key] = $value;
				$sql_prd = "SELECT * FROM `product`";
				$prdChill = $db->fetchOne($sql_prd);

				$data_prd = [
					"id" => $insert,
					"user_id" => $_POST['email'] ? $_POST['email'] : '',
					"bill_id" => $prdChill['name'],
					"total" => $_POST['qty'] ? $_POST['qty'] : '',
				];
				$insert_billinfor = $db->insert('bill', $data_prd);
		}
		$_SESSION['error']="Thêm thành công";
		header('Location: ./index.php');
	}
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
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Billing Address
						        </button>
						      </h5> 
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="" method="post">
										<p><input type="text" name="ten" id="ten" placeholder="Họ Tên" require></p>
						        		<p><input type="email" name="email" id="email" placeholder="Email" require></p>
						        		<p><input type="text" name="address" id="address" placeholder="Address" require></p>
										<input type="text" name="created_at" value="<?php echo date('y/m/d');?>"/>
										<p><input type="hidden" name="qty" id="qty" placeholder="qty" value="<?php echo $countsession ?>"></p>
						        		<p><input type="hidden" name="price" id="price" placeholder="price" value="<?php echo $totalprice ?>"></p>
						        		<p><textarea name="body" id="body" cols="30" rows="10" placeholder="Say Something"></textarea></p>

										<button type="submit" style="padding: 5px;background-color: #F28123;color: white;border-radius: 5px;border-width: 0px;" class="boxed-btn" style="border-width: 0px;padding: 5pxpx;">Đặt hàng</button>
										<!-- <button type="button" onclick="sendEmail()" class="boxed-btn">gửi email</button> -->
									</form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Your shipping address form is here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th colspan = 5 style="text-align: center;">Chi Tiết Đơn Hàng</th>
								</tr>
								<tr style="text-align: center;">
									<td>Loại</td>
									<td>Tên</td>
									<td>Xuất Xứ</td>
									<td>Tổng Tiền</td>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<?php showdetail(); ?>
								<tr class="table-body-row" style="text-align: center;">
								<td class="product-image" colspan = 4>Tổng Số Lượng : <?php countSS(); ?></td>
								</tr>
							</tbody>
							<tbody class="checkout-details">
							</tbody>
						</table>
						<form action="" method="post">
							<br>
							<a href="../../checkout/checkoutv31.PHP/index.php" class="boxed-btn" style="margin-left: 28%;">Thanh Toán Ngay</a>
							<!-- <button type="button" onclick="sendEmail()" class="boxed-btn">Place Order</button> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

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

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
    function sendEmail(){
        var name = $("#name");
		var ten = $("#ten");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
					ten: ten.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val()
                },success: window.location.href = "http://localhost:8080/showbai1812/baishow/template/main/success.php",
				
				//  success: function(response){
                //     $('#myForm')[0].reset();
                //     $('.sent-notification').text("MESSAGE SENT SUCCESSFULLY");
                // }
            })
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border','1px solid red');
            return false;
        }
        else{
            caller.css('border','');
            return true;
        }
    }

</script>
</body>
</html>