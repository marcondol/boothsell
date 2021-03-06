<!doctype html>
<?php
      $data = $arr_prop[0];
   ?>
<html lang="en">
<head>

	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Home</title>
	<meta name="description" content="Startups template">
	<meta name="keywords" content="Startups template">
	<link rel="shortcut icon" href="assets/img/favicon.ico">
	<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.jpg">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.jpg">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.jpg">
	<link rel="stylesheet" type="text/css" href="assets/css/custom-animations.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/lib/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />

	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<header>
		<nav class="navigation navigation-header">
			<div class="container">
				<div class="navigation-brand">
					<div class="brand-logo">
						Fashion Week
					</div>
				</div>
				<button class="navigation-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navigation-navbar collapsed">
					<ul class="navigation-bar navigation-bar-left">
						<li><a href="#hero">Home</a></li>
						<li><a href="#about">Booth Map</a></li>

					</ul>

				</div>
			</div>
		</nav>
	</header>
<body id="blog-page" class="product-page">
	<!-- Preloader -->
	<div class="preloader-mask">
		<div class="preloader"><div class="spin base_clr_brd"><div class="clip left"><div class="circle"></div></div><div class="gap"><div class="circle"></div></div><div class="clip right"><div class="circle"></div></div></div></div>
	</div>

	<div id="hero" class="static-header window-height dark-text hero-section waiting-list-version clearfix">
		<div class="cart-checkout-content tab-content">
			<div id="review-order" role="tabpanel" class="tab-pane fade active in" aria-labelledby="review-order-tab">
				<h3 class="uppercase">Order anda </h3>

				<table class="cart-list">
            <tr class="cart-list-item">
               <td class="cart-list-item-meta">Luas :</td>
               <td class="cart-list-item-meta"><?=$data->booth_spec->ukuran->luas?></td>
               <td class="cart-list-item-price"><?=number_format($data->booth_spec->ukuran->harga,0,",",".")?></td>
            </tr>
            <tr class="cart-list-item">
               <td class="cart-list-item-meta">Listrik :</td>
               <td class="cart-list-item-meta"><?=$data->booth_spec->listrik->daya?></td>
               <td class="cart-list-item-price"><?=number_format($data->booth_spec->listrik->harga,0,",",".")?></td>
            </tr>

            <tr class="cart-list-item">
               <td class="cart-list-item-meta"  colspan="2">Total :</td>
               <td class="cart-list-item-price"><?=number_format($data->booth_price,0,",",".")?></td>
            </tr>
         </table>
         <h4> Pemesanan Berhasil Silahkan cek EMAIL anda untuk Validasi dan mendapatkan halaman pembayaran</h4>
			</div>
		</div>
	</div>
	<footer id="footer" class="footer light-text">
		<div class="container">
			<div class="footer-content row">
				<div class="col-sm-4 col-xs-12">
					<div class="logo-wrapper">
						<img width="130" height="31" src="assets/img/logo-white.png" alt="logo" />
					</div>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco. Qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Nisi ut aliquid ex ea commodi consequatur?</p>
					<p><strong>John Doeson, Founder</strong>.</p>
				</div>
				<div class="col-sm-5 social-wrap col-xs-12">
					<strong class="heading">Social Networks</strong>
					<ul class="list-inline socials">
						<li><a href="#"><span class="icon icon-socialmedia-08"></span></a></li>
						<li><a href="#"><span class="icon icon-socialmedia-09"></span></a></li>
						<li><a href="#"><span class="icon icon-socialmedia-16"></span></a></li>
						<li><a href="#"><span class="icon icon-socialmedia-04"></span></a></li>
					</ul>
					<ul class="list-inline socials">
						<li><a href="#"><span class="icon icon-socialmedia-07"></span></a></li>
						<li><a href="#"><span class="icon icon-socialmedia-16"></span></a></li>
						<li><a href="#"><span class="icon icon-socialmedia-09"></span></a></li>
						<li><a href="#"><span class="icon icon-socialmedia-08"></span></a></li>
					</ul>
				</div>
				<div class="col-sm-3 col-xs-12">
					<strong class="heading">Our Contacts</strong>
					<ul class="list-unstyled">
						<li><span class="icon icon-chat-messages-14"></span><a href="mailto:info@startup.ly">info@startup.ly</a></li>
						<li><span class="icon icon-seo-icons-34"></span>2901 Marmora road, Glassgow, Seattle, WA 98122-1090</li>
						<li><span class="icon icon-seo-icons-17"></span>1 - 234-456-7980</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="copyright">Fashion week 2018</div>
	</footer>

	<div class="back-to-top"><i class="fa fa-angle-up fa-3x"></i></div>

	<!--[if lt IE 9]>
		<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js?ver=1"></script>
	<![endif]-->
	<!--[if (gte IE 9) | (!IE)]><!-->
		<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js?ver=1"></script>
	<!--<![endif]-->

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="assets/js/startuply.js"></script>
</body>
</html>
