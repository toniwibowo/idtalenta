<!DOCTYPE html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<!-- Basic -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>ARTademi</title>

		<meta name="keywords" content="HTML5 Website" />
		<meta name="description" content="Artademi - Responsive HTML5 Website">
		<meta name="author" content="sketsa.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css"> -->
		<link href="https://fonts.googleapis.com/css?family=Public+Sans&display=swap" rel="stylesheet">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap-star-rating/css/star-rating.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/tagsinput.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>css/theme.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/theme-elements.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/theme-blog.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="<?= base_url() ?>vendor/rs-plugin/css/navigation.css">

		<!-- Demo CSS -->


		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>css/skins/skin-corporate-7.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?= base_url() ?>vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">
			<header id="header" class="<?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? 'header-transparent header-transparent-dark-bottom-border header-transparent-dark-bottom-border-1' : '' ?> header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0 bg-dark box-shadow-none">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="index.html">
											<img alt="ARTademi" width="250" height="66" data-sticky-width="200" data-sticky-height="53" src="<?= base_url('images/logo.png') ?>">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle <?= activate_menu('home') ?>" href="<?= site_url() ?>">
															Beranda
														</a>
													</li>
													<li class="dropdown dropdown-mega">
														<a class="dropdown-item dropdown-toggle <?= activate_menu('pages') ?>" href="<?= site_url('tentang-kami') ?>">
															Tentang Kami
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item" href="<?= site_url('mentor') ?>">
															Mentor
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle <?= activate_menu('articles') ?>" href="<?= site_url('blog/view') ?>">
															Blog
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?= site_url('kontak') ?>">
															Kontak
														</a>
													</li>

													<?php if ($this->ion_auth->logged_in()): ?>
														<?php if ($this->ion_auth->in_group(2)): ?>
															<?php $user = $this->ion_auth->user()->row();  ?>
															<li class="dropdown">
																<a class="dropdown-item dropdown-toggle" href="#"><i class="fa fa-user-circle"></i> <span class="pl-3"><?= $user->full_name ?></span></a>
																<ul class="dropdown-menu">
																	<li>
																		<a class="dropdown-item" href="<?= site_url('member/dashboard') ?>">Dashboard</a>
																	</li>
																	<li>
																		<a class="dropdown-item" href="<?= site_url('member/myaccount') ?>">My Profile</a>
																	</li>
																	<?php if ($this->ion_auth->in_group(4)): ?>
																	<?php $check_mentor_active = $this->db->where('user_id',$user->id)->where('active',1)->get('mentor'); ?>
																	<?php if ($check_mentor_active->num_rows() > 0): ?>
																		<li>
																			<a class="dropdown-item text-warning" href="#!">MENTOR AREA</a>
																		</li>
																		<li>
																			<a class="dropdown-item text-light" href="<?= site_url('mentor/profile') ?>">Profile Mentor</a>
																		</li>
																		<li>
																			<a class="dropdown-item text-light" href="<?= site_url('mentor/upload') ?>">Upload Video</a>
																		</li>
																		<li>
																			<a class="dropdown-item text-light" href="<?= site_url('mentor/dashboard') ?>">Video yang diupload</a>
																		</li>
																		<li>
																			<a class="dropdown-item text-light" href="<?= site_url('mentor/purchased') ?>">Video yang dibeli</a>
																		</li>
																		<li>
																			<a class="dropdown-item text-light" href="<?= site_url('mentor/wishlist') ?>">Wishlist</a>
																		</li>
																	<?php endif; ?>
																	<!-- END CHECK MENTOR ACTIVE -->
																	<?php else: ?>
																	<li>
																		<a class="dropdown-item text-light" href="<?= site_url('mentor/register') ?>">Upgrade Mentor</a>
																	</li>
																	<?php endif; ?>

																	<li>
																		<a class="dropdown-item" href="<?= site_url('member/logout') ?>">Logout</a>
																	</li>
																</ul>
															</li>
														<?php endif; ?>
														<?php else: ?>
															<li class="dropdown">
																<a class="dropdown-item" href="<?= site_url('member/register') ?>"><span class="pl-3">Daftar</span></a>

															</li>
													<?php endif; ?>



												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>

									</div>
									<div class="header-nav-features header-nav-features-light header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
										<div class="header-nav-feature header-nav-features-search d-inline-flex">
											<a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>

											<?php if ($this->ion_auth->logged_in()): ?>
												<a class="btn btn-warning btn-rounded btn-modern btn-sm mx-3" href="<?= site_url('member/logout') ?>">Keluar</a>
												<?php else: ?>
												<a class="btn btn-warning btn-rounded btn-modern btn-sm mx-3" href="#" data-toggle="modal" data-target="#defaultModal">Login</a>
											<?php endif; ?>



											<div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown">
												<form role="search" action="page-search-results.html" method="get">
													<div class="simple-search input-group">
														<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
														<span class="input-group-append">
															<button class="btn" type="submit">
																<i class="fa fa-search header-nav-top-icon"></i>
															</button>
														</span>
													</div>
												</form>
											</div>


										</div>
										<?= $this->app->getcart() ?>

										<!-- <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
											<a href="#" class="header-nav-features-toggle">
												<img src="<?= base_url() ?>images/icons/icon-cart-light.svg" width="14" alt="" class="header-nav-top-icon-img">
												<span class="cart-info">
													<span class="cart-qty">1</span>
												</span>
											</a>
											<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
												<ol class="mini-products-list">
													<li class="item">
														<a href="#" title="Camera X1000" class="product-image"><img src="img/products/product-1.jpg" alt="Camera X1000"></a>
														<div class="product-details">
															<p class="product-name">
																<a href="#">Camera X1000 </a>
															</p>
															<p class="qty-price">
																 1X <span class="price">$890</span>
															</p>
															<a href="#" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
														</div>
													</li>
												</ol>
												<div class="totals">
													<span class="label">Total:</span>
													<span class="price-total"><span class="price">$890</span></span>
												</div>
												<div class="actions">
													<a class="btn btn-dark" href="<?= site_url('cart') ?>">View Cart</a>

													<a class="btn btn-primary" href="#">Checkout</a>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<!-- MODAL -->

			<!-- LOGIN -->
			<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content" style="overflow:hidden">

						<div id="loginBox" class="modal-body p-5 appear-animation" data-appear-animation="bounceInDown" data-appear-animation-delay="300" data-appear-animation-duration="1s">
							<h4>Masuk ke <strong>ARTAdemi</strong></h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<form id="loginForm" class="mb-0" action="" method="post" enctype="application/x-www-form-urlencoded">
								<div class="form-group">
									<input class="form-control" type="text" name="identity" value="" placeholder="Email/Username">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="password" value="" placeholder="Password">
								</div>
								<div class="form-row">
									<div class="form-group col-lg-4 mb-0">
										<button type="button" name="button" class="btn btn-warning btn-rounded">Masuk</button>
									</div>
									<div class="form-group col-lg-4 mb-0">
										<div class="custom-control custom-checkbox mr-sm-2 py-2">
							        <input type="checkbox" name="remember" class="custom-control-input" id="customControlAutosizing">
							        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
							      </div>
									</div>
									<div class="col-lg-4 py-2">
										<a class="text-warning py-2" href="#" id="forgotPassword">
											Lupa kata sandi?
										</a>
									</div>
									<div class="col-lg-12 mt-3 d-none">
										<a class="btn btn-rounded btn-info btn-block btn-modern" href="#"><small>Masuk dengan</small> Facebook</a>
									</div>
								</div>
							</form>
						</div>

						<div id="forgotPasswordBox" class="modal-body p-5 d-none appear-animation" data-appear-animation="bounceInUp" data-appear-animation-delay="300" data-appear-animation-duration="1s">
							<h4>Lupa <strong>Password?</strong></h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<form class="" action="<?= site_url('member/doforgot') ?>" method="post" enctype="application/x-www-form-urlencoded">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email..." value="">
								</div>
								<div class="form-group mb-0">
									<button type="button" class="btn btn-dark btn-rounded" name="buttonBack">KEMBALI</button>
									<button type="submit" class="btn btn-warning btn-rounded" name="button">KIRIM</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
