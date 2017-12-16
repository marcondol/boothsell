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
         <h4> Informasi Pemesan </h4>
         <form action="<?=base_url()?>index.php?/pesan/add" method="post" name="frm_pesan">
            <input type="hidden" name="booth_id" value="<?=$data->idx?>">
            <input type="hidden" name="booth_price" value="<?=$data->booth_price?>">
            <div class="form-group">
               <label for="nama">Nama Pemesan</label>
               <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
               <label for="no_telp">Nomor Telepon</label>
               <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp">
            </div>

            <button type="submit" class="btn btn-default">Kirim</button>
       </form>

			</div>

			<div id="payment-method" role="tabpanel" class="tab-pane fade" aria-labelledby="payment-method-tab">
				<h3 class="uppercase">Payment Method</h3>

				<form class="form payment-method-form">
					<input id="payment_paypal" type="radio" name="payment-method" value="paypal" checked="checked">
					<label for="payment_paypal" class="payment-method">
						<i class="pseudo-radio"></i><img src="assets/img/paypal-133x35.png" alt="" class="payment-method-icon">PayPal
					</label>
					<input id="payment_test" type="radio" name="payment-method" value="test-payment">
					<label for="payment_test" class="payment-method">
						<i class="pseudo-radio"></i>Test Payment
					</label>
				</form>
			</div>

			<div id="billing-details" role="tabpanel" class="tab-pane fade" aria-labelledby="billing-details-tab">
				<h3 class="uppercase">Billing Details</h3>

				<form class="form billing-details-form">
					<fieldset class="form-group">
						<label for="email" class="required">Email Address</label>
						<input id="email" type="email" name="email" placeholder="Email address" class="form-control required">
					</fieldset>

					<fieldset class="form-group">
						<label for="first_name" class="required">First Name</label>
						<input id="first_name" type="text" name="first_name" placeholder="First name" class="form-control required">
					</fieldset>

					<fieldset class="form-group">
						<label for="last_name">Last Name</label>
						<input id="last_name" type="text" name="last_name" placeholder="Last name" class="form-control">
					</fieldset>

					<fieldset class="result">
						<strong>Purchase Total:</strong>
						<span class="cart-ammount" data-subtotal="25" data-total="25">$25.00</span>
					</fieldset>

					<input type="submit" class="cart-submit btn btn-solid" value="Purchase">
				</div>
			</div>
		</div>
	</div>

	<div class="cart-checkout-navigation-controls">
		<a href="#" class="prev hidden btn btn-outline-color">Previous</a>
		<a href="#" class="next btn btn-solid">Next step</a>
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
