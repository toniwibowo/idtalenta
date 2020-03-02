<html>
<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Artademi</title>

	<meta name="keywords" content="HTML5 Website" />
	<meta name="description" content="Artademi - Responsive HTML5 Website">
	<!-- <meta name="author" content="sketsa.net"> -->

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

		<header id="header" class=" header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
			<div class="header-body border-top-0 bg-dark box-shadow-none">
				<div class="header-container container">
					<div class="header-row">

						<div class="header-column">
							<?php if (isset($_SESSION['nama'])): ?>

								<div class="header-row">

									<div class="header-logo">
										<a href="<?= site_url('home/dashboard') ?>">
											<img alt="Porto" width="250" height="66" data-sticky-width="200" data-sticky-height="53" src="<?= base_url('images/logo.png') ?>">
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
														<a class="dropdown-item dropdown-toggle active" href="<?= site_url('home/dashboard') ?>">
															Beranda
														</a>
													</li>

													<li class="dropdown dropdown-mega">
														<a class="dropdown-item dropdown-toggle" href="<?= site_url('tentang-kami') ?>">
															Tentang Kami
														</a>
													</li>
													<li class="dropdown dropdown-mega">
														<a class="dropdown-item dropdown-toggle" href="<?= site_url('faq') ?>">
															Faq
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?= site_url('home/mentor') ?>">
															Mentor
														</a>
														<ul class="dropdown-menu">
															<li>
																<a class="dropdown-item" href="<?= site_url('home/detail') ?>">Detail</a>
															</li>

															<li>
																<a class="dropdown-item" href="<?= site_url('home/video_detail') ?>">Video Detail</a>
															</li>
														</ul>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle <?= activate_menu('articles') ?>" href="<?= site_url('blog/view') ?>">
															Blog
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-item dropdown-toggle" href="<?= site_url('home/contact') ?>">
															Kontak
														</a>
													</li>



													<?php else: ?>


														<div class="header-logo">
															<a href="<?= site_url() ?>">
																<img alt="Porto" width="250" height="66" data-sticky-width="200" data-sticky-height="53" src="<?= base_url('images/logo.png') ?>">
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
																			<a class="dropdown-item dropdown-toggle active" href="<?= site_url() ?>">
																				Beranda
																			</a>
																		</li>


																	<?php endif ?>




																	<?php if (isset($_SESSION['nama'])): ?>


																		<li class="dropdown">
																			<a class="dropdown-item dropdow-toggle" href="#"><i class="fa fa-user-circle"></i> <span class="pl-3"><?php echo $this->session->userdata("nama"); ?></span></a>
<ul class="dropdown-menu">
															<li>
																<a class="dropdown-item" href="<?= site_url('home/update') ?>">Update Profile</a>
															</li>
														</ul>


																		</div>
																		<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
																			<i class="fas fa-bars"></i>
																		</button>

																	</div>
																	<div class="header-nav-features header-nav-features-light header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
																		<div class="header-nav-feature header-nav-features-search d-inline-flex">
																			<a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
																			<a class="btn btn-warning btn-rounded btn-modern btn-sm mx-3" href="logout">Logut</a>


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



																			<?php else: ?>

																				<li class="dropdown dropdown-mega">
																					<a class="dropdown-item dropdown-toggle" href="<?= site_url('tentang-kami') ?>">
																						Tentang Kami
																					</a>
																				</li>
																				<li class="dropdown dropdown-mega">
														<a class="dropdown-item dropdown-toggle" href="<?= site_url('faq') ?>">
															Faq
														</a>
													</li>
																				<li class="dropdown">
																					<a class="dropdown-item dropdown-toggle" href="<?= site_url('home/mentor') ?>">
																						Mentor
																					</a>
																					<ul class="dropdown-menu">
																						<li>
																							<a class="dropdown-item" href="<?= site_url('home/detail') ?>">Detail</a>
																						</li>

																						<li>
																							<a class="dropdown-item" href="<?= site_url('home/video_detail') ?>">Video Detail</a>
																						</li>
																					</ul>
																				</li>
																				<li class="dropdown">
																					<a class="dropdown-item dropdown-toggle <?= activate_menu('articles') ?>" href="<?= site_url('blog/view') ?>">
																						Blog
																					</a>
																				</li>
																				<li class="dropdown">
																					<a class="dropdown-item dropdown-toggle" href="<?= site_url('home/contact') ?>">
																						Kontak
																					</a>
																				</li>

																				<li class="dropdown">
																					<a class="dropdown-item dropdown-toggle" href="<?= site_url('member/register') ?>">
																						DAFTAR
																					</a>
																				</li>
																			</ul>
																		</li>

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
																<a class="btn btn-warning btn-rounded btn-modern btn-sm mx-3" href="#" data-toggle="modal" data-target="#defaultModal">Login</a>

															<?php endif ?>

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







														<div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
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
														</div>
													</div>
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
								<div class="modal-content">

									<div class="modal-body p-5">
										<h4>Masuk ke <strong>ARTAdemi</strong></h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<?php
										if(isset($_GET['pesan'])){
											if($_GET['pesan']=="gagal"){
												echo "<div class='alert alert-danger alert-danger'>";
												echo $this->session->flashdata('alaert');
												echo "</div>";
											} else if($_GET['pesan']=='logout'){
												if($this->session->flashdata())
												{
													echo "<div class='alert alert-danger alert-success'>";
													echo $this->session->flashdata('Anda telah logout');
													echo "</div>";
												}
											}else if($_GET['pesan']=='Belum Login'){
												if($this->session->flashdata())
												{
													echo "<div class='alert alert-danger alert-primary'>";
													echo $this->session->flashdata('alert');
													echo "</div>";
												}
											}
										}else{
											if($this->session->flashdata())
											{
												echo "<div class='alert alert-danger alert-message'>";
												echo $this->session->flashdata('alert');
												echo "</div>";
											}
										}
										?>
										<form class="mb-0" action="<?php echo base_url().'home/login' ?>" method="post">
											<div class="form-group">
												<?php
												if (validation_errors() || $this->session->flashdata('result_login')) {
													?>
													<div class="alert alert-error">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<strong>Warning!</strong>
														<?php echo validation_errors(); ?>
														<?php echo $this->session->flashdata('result_login'); ?>
													</div>
												<?php } ?>
												<input id="email" class="form-control" type="email" name="email" value="" placeholder="Email" required="required">
												<?php echo form_error('email'); ?>
											</div>
											<div class="form-group">
												<input id="password" class="form-control" type="password" name="password" value="" placeholder="Password" required="required">
												<?php echo form_error('password'); ?>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<button type="submit" name="submit" class="btn btn-warning btn-rounded btn-modern">Masuk</button>
												</div>
												<div class="form-group col-lg-4">
													<div class="custom-control custom-checkbox mr-sm-2 py-2">
														<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
														<label class="custom-control-label" for="customControlAutosizing">Remember me</label>
													</div>
												</div>
												<div class="col-lg-4 py-2">
													<a class="text-warning py-2" href="#">
														Lupa kata sandi?
													</a>
												</div>
									<!-- <div class="col-lg-12 mt-3">
										<a class="btn btn-rounded btn-info btn-block btn-modern" href="#"><small>Masuk dengan</small> Facebook</a>
									</div> -->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
