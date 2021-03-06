<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IDTALENTA</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- All CSS is here
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/vendor/dlicon.css">
    <!-- ALERTIFY (FOR NOTIFICATION ALERT) -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/alertifyjs/css/themes/default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/alertifyjs/css/themes/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/alertifyjs/css/themes/default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/alertifyjs/css/themes/semantic.min.css">
    <!-- Others CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/owl-carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/jarallax.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/easyzoom.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/fullpage.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/plugins/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/animate/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/theme-elements.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/skins/skin-corporate-7.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>css/custom.css">

    <?php $uri = $this->uri->segment(1); ?>

		<?php if ($uri == 'course'): ?>
		<link rel="stylesheet" href="<?= base_url() ?>vendor/video.js/dist/video-js.css">
		<link rel="stylesheet" href="<?= base_url() ?>css/video-slide.css">
		<?php endif; ?>

    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5bdc03418509a10011c44721&product=sop' async='async'></script>


</head>

<body>

    <div class="main-wrapper">
        <!-- Pre Loader -->
        <div class="preloader">
            <div class="loading-center">
                <div class="loading-center-absolute">
                    <div class="object object_one"></div>
                    <div class="object object_two"></div>
                    <div class="object object_three"></div>
                </div>
            </div>
        </div>
        <header class="header-area section-padding-1">
            <div class="header-top bg-gray pt-20 pb-20">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-3">
                            <div class="social-icon-style-4">
                                <a href="https://www.facebook.com/TalentaAnakBangsa/" target="_blank"><i class="fab fa-facebook"></i></a>
                                <!--<a href="#"><i class="fa fa-twitter"></i></a>-->
                                <a href="https://instagram.com/idtalenta.academy" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="header-offter text-center">
                                <a href="#">FLASH SALE THIS WEEK - OFF 50% ITEMS <span> Check it now</span></a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="header-contact-info">
                                <ul>
                                    <li><i class="dlicon ui-1_email-83"></i> <a href="mailto:support@idtalenta.com">support@idtalenta.com</a></li>
                                    <li><i class="dlicon ui-3_phone-call"></i>089-8123-8123</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo logo-width">
                                <a href="<?= site_url() ?>">
                                    <img src="<?= base_url() ?>images/logo/logo-2.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 d-flex justify-content-center position-static">
                            <div class="main-menu menu-lh-1 main-menu-light-black menu-padding-li-none menu-padding-a main-menu-border-none">
                                <nav>
                                    <ul>
                                        <li class="position-static"><a class="<?= activate_menu('home') ?>" href="<?= site_url() ?>">Home</a>

                                        </li>
                                        <li><a class="<?= activate_menu('pages') ?>" href="<?= site_url('about-us') ?>">About Us</a>
                                            <!--<ul class="sub-menu-width">
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#">Vision & Mission</a></li>-->
                                                <!--<li><a href="404.html">404 Page</a></li>-->
                                                <!--<li><a href="comming-soon.html">Comming Soon 01</a></li>-->
                                                <!--<li><a href="comming-soon-2.html">Comming Soon 02</a></li>-->
                                                <!--<li><a href="faq.html">FAQ</a></li>-->
                                            <!--</ul>-->
                                        </li>
                                      <!--  <li><a href="shop-fullwide.html">Shop</a>
                                            <ul class="mega-menu-style-2 mega-menu-width2 menu-negative-mrg1">
                                                <li class="mega-menu-sub-width20"><a class="menu-title" href="#">Shop Layout</a>
                                                    <ul>
                                                        <li><a href="shop-fullwide.html">Shop Fullwidth</a></li>
                                                        <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                        <li><a href="shop-metro.html">Shop Metro Layout</a></li>
                                                        <li><a href="shop-3-col.html">Shop 03 Columns</a></li>
                                                        <li><a href="shop-2-col.html">Shop 02 Columns</a></li>
                                                        <li><a href="shop-collection-1.html">Shop Collection 01</a></li>
                                                        <li><a href="shop-collection-2.html">Shop Collection 02</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-sub-width22"><a class="menu-title" href="#">Product Layout</a>
                                                    <ul>
                                                        <li><a href="product-details.html">Single 01</a></li>
                                                        <li><a href="product-details-2.html">Single 02</a></li>
                                                        <li><a href="product-details-group.html">Grouped</a></li>
                                                        <li><a href="product-details-sticky.html">Sticky Info</a></li>
                                                        <li><a href="product-details-configurable.html">Configurable</a></li>
                                                        <li><a href="product-details-thumbnail.html">Thumbnail</a></li>
                                                        <li><a href="product-details-video.html">Video</a></li>
                                                        <li><a href="product-details-affiliate.html">Affiliate</a></li>
                                                        <li><a href="product-details-sidebar.html">Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-sub-width20"><a class="menu-title" href="#">Shop Pages</a>
                                                    <ul>
                                                        <li><a href="my-account.html">My Account</a></li>
                                                        <li><a href="checkout.html">Check Out</a></li>
                                                        <li><a href="cart.html">Shopping Cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="order-tracking.html">Order Tracking</a></li>
                                                        <li><a href="compare.html">Compare</a></li>
                                                        <li><a href="login-register.html">login / register</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-sub-width37">
                                                    <div class="banner-menu-content-wrap default-overlay">
                                                        <a href="product-details.html"><img src="assets/images/menu/banner-header.jpg" alt="banner"></a>
                                                        <div class="banner-menu-content">
                                                            <h2>Bikini <br>Collections</h2>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>-->
                                        <li><a class="<?= activate_menu('course') ?>" href="#">Course </a>
                                            <ul class="sub-menu-width">
                                              <?php $category = $this->db->get('category_product'); ?>
                                              <?php if ($category->num_rows() > 0): ?>
                                                <?php foreach ($category->result() as $key => $value): ?>
                                                  <?php $sub = $this->db->where('category_product_id', $value->category_product_id)->get('subcategory_product'); ?>
                                                  <li>
                                                    <a href="<?= site_url('classroom/'.url_title($value->category_product_name,'-',true)) ?>"><?= str_replace(' dan ', ' & ', $value->category_product_name)  ?></a>
                                                    <?php if ($sub->num_rows() > 0): ?>
                                                      <ul>
                                                        <?php foreach ($sub->result() as $key => $s): ?>
                                                          <li>
                                                            <a href="<?= site_url('classroom/'.url_title($value->category_product_name,'-',true).'/'.url_title($s->name,'-',true)) ?>"><?= str_replace(' dan ', ' & ', $s->name)  ?></a>
                                                          </li>
                                                        <?php endforeach; ?>
                                                      </ul>
                                                    <?php endif; ?>

                                                  </li>
                                                <?php endforeach; ?>
                                              <?php endif; ?>
                                            </ul>
                                        </li>
                                        <li>
                                          <a class="<?= activate_menu('mentor') ?>" href="<?= site_url('mentor') ?>">Mentor</a>
                                        </li>

                                        <li>
                                          <a class="<?= activate_menu('blog') ?>" href="<?= site_url('blog') ?>">Blog</a>
                                        </li>

                                        <?php if (!$this->ion_auth->logged_in()): ?>

                                          <li>
                                            <a href="#" data-toggle="modal" data-target="#defaultModal">Login | Register</a>
                                          </li>
                                          <?php else: ?>
                                          <?php $user = $this->ion_auth->user()->row() ?>
                                          <li>
                                            <a href="#">My Account</a>
                                            <ul class="sub-menu-width">
                                              <li>
                                                <a href="<?= site_url('member/dashboard') ?>">Dashboard</a>
                                              </li>
                                              <li>
                                                <a href="<?= site_url('member/myaccount') ?>">My Profile</a>
                                              </li>
                                              <li>
                                                <a href="<?= site_url('my-course') ?>">My Course</a>
                                              </li>

                                              <?php if ($this->ion_auth->in_group(4)): ?>
            																	<?php $check_mentor_active = $this->db->where('user_id', $user->id)->where('active',1)->get('mentor'); ?>
            																	<?php if ($check_mentor_active->num_rows() > 0): ?>
            																		<li>
            																			<a class="dropdown-item text-warning" href="#!">MENTOR AREA</a>
            																		</li>
                                                <li>
            																			<a class="dropdown-item text-light" href="<?= site_url('mentor/dashboard') ?>">Dashboard</a>
            																		</li>
            																		<li>
            																			<a class="dropdown-item text-light" href="<?= site_url('mentor/profile') ?>">Profile Mentor</a>
            																		</li>
            																		<li>
            																			<a class="dropdown-item text-light" href="<?= site_url('mentor/upload') ?>">Upload Video</a>
            																		</li>
                                                <li>
            																			<a class="dropdown-item text-light" href="<?= site_url('wishlist') ?>">Wishlist</a>
            																		</li>

            																	<?php endif; ?>
            																	<!-- END CHECK MENTOR ACTIVE -->
            																	<?php else: ?>
            																	<li>
            																		<a class="dropdown-item text-light" href="<?= site_url('mentor/register') ?>">Be a Mentor</a>
            																	</li>
            																	<?php endif; ?>

                                              <li>
                                                <a href="<?= site_url('signout') ?>">Logout</a>
                                              </li>
                                            </ul>
                                          </li>

                                        <?php endif; ?>



                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <?php
                        if (isset($_COOKIE['cart'])) {
                          $sid = $_COOKIE['cart'];
                        }else {
                          $sid = '';
                        }
                        $cart = $this->db->where('sid', $sid)->get('cart');
                        $row = $cart->row_array();

                        $cartrows = $cart->num_rows();

                        // GET ITEM CART

                        if ($cartrows > 0) {
                          $cartItem   = $this->db->where( 'cart_id', $row['cart_id'] )->from( 'cart_item' )->join('mentor_class','mentor_class.mentor_class_id = cart_item.product_id')->get();
                          $itemAmount = $cartItem->num_rows();
                        }else {
                          $itemAmount = 0;
                        }

                        ?>

                        <div class="col-xl-3 col-lg-2">
                            <div class="header-right-wrap header-right-flex">
                                <div class="same-style header-wishlist">
                                    <a href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="same-style cart-wrap">
                                    <a href="#" class="cart-active">
                                        <i class="dlicon shopping_bag-20"></i>
                                        <span class="count-style"><?= $itemAmount ?></span>
                                    </a>
                                </div>
                                <div class="same-style header-search">
                                    <a class="search-active" href="#">
                                        <i class="dlicon ui-1_zoom"></i>
                                    </a>
                                </div>
                                <div class="same-style header-off-canvas">
                                    <a class="header-aside-button" href="#">
                                        <i class="dlicon ui-3_menu-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>










        <div class="header-small-mobile section-padding-1">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo logo-width">
                            <a href="<?= site_url() ?>">
                                <img alt="" src="<?= base_url() ?>images/logo/logo-2.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mobile-header-right-wrap">
                            <div class="header-right-wrap header-right-flex">
                                <div class="same-style cart-wrap">
                                    <a href="#" class="cart-active">
                                        <i class="dlicon shopping_bag-20"></i>
                                        <span class="count-style"><?= $itemAmount ?></span>
                                    </a>
                                </div>
                                <div class="same-style header-off-canvas">
                                    <a class="header-aside-button" href="#">
                                        <i class="dlicon ui-3_menu-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search start -->
        <div class="search-content-wrap main-search-active">
            <a class="search-close"><i class="dlicon ui-1_simple-remove"></i></a>
            <div class="search-content">
                <p>Start typing and press Enter to search</p>
                <form class="search-form" action="<?= site_url('search') ?>" method="get">
                    <input type="text" name="src" placeholder="Search">
                    <button class="button-search"><i class="dlicon ui-1_zoom"></i></button>
                </form>
            </div>
        </div>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="dlicon ui-1_simple-remove"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>

                      <?php $subtotal = 0; ?>

                      <?php if ($cartrows > 0): ?>
                        <?php foreach ($cartItem->result_array() as $key => $value): ?>
                          <?php
                          if ($value['sale'] == 0) {
                            $price = $value['qty'] * $value['price'];
                          }else {
                            $preprice = $value['price'] - ($value['sale'] / 100 * $value['price']);
                            $price = $preprice;
                          }

                          $subtotal = $subtotal + $price;
                          ?>
                          <li class="single-product-cart">
                              <div class="cart-img">
                                  <a href="#"><img src="<?= base_url('assets/uploads/files/'.$value['poster']) ?>" alt=""></a>
                              </div>
                              <div class="cart-title">
                                  <h4><a href="#"><?= $value['title'] ?></a></h4>
                                  <span> <?= $value['qty'] ?> × <?= number_format($price,0,',','.') ?>	</span>
                              </div>
                              <div class="cart-delete">
                                  <a href="<?= site_url('cart/delete/'.$row['cart_id'].'/'.$value['product_id']) ?>">×</a>
                              </div>
                          </li>
                        <?php endforeach; ?>
                      <?php endif; ?>


                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>Rp. <?= number_format($subtotal,0,',','.') ?></span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="<?= site_url('cart') ?>">view cart</a>
                        <?php if ($this->ion_auth->logged_in()): ?>

                          <?php if ($subtotal != 0): ?>
                            <form id="checkout" class="" action="<?= site_url('checkout/docheckout') ?>" method="post">
                              <input type="hidden" name="sid" value="<?= $_COOKIE['cart'] ?>">
                              <a id="checkoutsubmit" class="no-mrg btn-hover cart-btn-style" href="#">checkout</a>
                            </form>
                          <?php endif; ?>

                          <?php else: ?>
                            <a class="no-mrg btn-hover cart-btn-style" href="#" data-toggle="modal" data-target="#defaultModal">checkout</a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>

        <!-- aside start -->
        <div class="header-aside-active">
            <div class="header-aside-wrap">
                <a class="aside-close"><i class="dlicon ui-1_simple-remove"></i></a>
                <div class="header-aside-content">
                    <div class="mobile-menu-area">
                        <div class="mobile-search">
                            <form class="search-form" action="#">
                                <input type="text" placeholder="Search entire store…">
                                <button class="button-search"><i class="dlicon ui-1_zoom"></i></button>
                            </form>
                        </div>
                        <div class="mobile-menu-wrap">
                            <!-- mobile menu start -->
                            <div class="mobile-navigation">
                                <!-- mobile menu navigation start -->
                                <nav>
                                    <ul class="mobile-menu">
                                        <li class="menu-item-has-children"><a href="<?= site_url() ?>">Home</a>

                                        </li>
                                        <li class="menu-item-has-children"><a href="<?= site_url('about-us') ?>">About Us</a>
                                            <!--<ul class="dropdown">
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#">Vision & Mission</a></li>-->
                                                <!--<li><a href="404.html">404 Page</a></li>-->
                                                <!--<li><a href="comming-soon.html">Comming Soon 01</a></li>-->
                                                <!--<li><a href="comming-soon-2.html">Comming Soon 02</a></li>-->
                                                <!--<li><a href="faq.html">FAQ</a></li>-->
                                            <!--</ul>-->
                                        </li>


                                        <!--<li class="menu-item-has-children "><a href="shop-fullwide.html">shop</a>
                                            <ul class="dropdown">
                                                <li class="menu-item-has-children"><a href="#">Shop Layout</a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-fullwide.html">Shop Fullwidth</a></li>
                                                        <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                        <li><a href="shop-metro.html">Shop Metro Layout</a></li>
                                                        <li><a href="shop-3-col.html">Shop 03 Columns</a></li>
                                                        <li><a href="shop-2-col.html">Shop 02 Columns</a></li>
                                                        <li><a href="shop-collection-1.html">Shop Collection 01</a></li>
                                                        <li><a href="shop-collection-2.html">Shop Collection 02</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">Product Layout</a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">Single 01</a></li>
                                                        <li><a href="product-details-2.html">Single 02</a></li>
                                                        <li><a href="product-details-group.html">Grouped</a></li>
                                                        <li><a href="product-details-sticky.html">Sticky Info</a></li>
                                                        <li><a href="product-details-configurable.html">Configurable</a></li>
                                                        <li><a href="product-details-thumbnail.html">Thumbnail</a></li>
                                                        <li><a href="product-details-video.html">Video</a></li>
                                                        <li><a href="product-details-affiliate.html">Affiliate</a></li>
                                                        <li><a href="product-details-sidebar.html">Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#">Shop Pages </a>
                                                    <ul class="dropdown">
                                                        <li><a href="my-account.html">My Account</a></li>
                                                        <li><a href="checkout.html">Check Out</a></li>
                                                        <li><a href="cart.html">Shopping Cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="order-tracking.html">Order Tracking</a></li>
                                                        <li><a href="compare.html">Compare</a></li>
                                                        <li><a href="login-register.html">login / register</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>-->




                                        <li class="menu-item-has-children"><a href="#">Course</a>
                                          <ul class="dropdown">
                                            <?php $category = $this->db->get('category_product'); ?>
                                            <?php if ($category->num_rows() > 0): ?>
                                              <?php foreach ($category->result() as $key => $value): ?>
                                                <?php $sub = $this->db->where('category_product_id', $value->category_product_id)->get('subcategory_product'); ?>
                                                <li>
                                                  <a href="<?= site_url('classroom/'.url_title($value->category_product_name,'-',true)) ?>"><?= $value->category_product_name ?></a>
                                                  <?php if ($sub->num_rows() > 0): ?>
                                                    <ul>
                                                      <?php foreach ($sub->result() as $key => $s): ?>
                                                        <li>
                                                          <a href="<?= site_url('classroom/'.url_title($value->category_product_name,'-',true).'/'.url_title($s->name,'-',true)) ?>"><?= $s->name ?></a>
                                                        </li>
                                                      <?php endforeach; ?>
                                                    </ul>
                                                  <?php endif; ?>

                                                </li>
                                              <?php endforeach; ?>
                                            <?php endif; ?>
                                          </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                          <a href="<?= site_url('mentor') ?>">Mentor</a>
                                        </li>
                                        <li class="menu-item-has-children "><a href="<?= site_url('blog') ?>">Blog</a>
                                            <!--<ul class="dropdown">
                                                <li><a href="blog.html">Blog Style 01</a></li>
                                                <li><a href="blog-2.html">Blog Style 02</a></li>
                                                <li><a href="blog-3.html">Blog Style 03</a></li>
                                                <li><a href="blog-details.html">Single Post Style 01</a></li>
                                                <li><a href="blog-details-2.html">Single Post Style 02</a></li>
                                            </ul>-->
                                        </li>
                                        <!--<li><a href="shop-instagram.html">Instagram Shop </a></li>-->
                                    </ul>
                                </nav>
                                <!-- mobile menu navigation end -->
                            </div>
                            <!-- mobile menu end -->
                        </div>





                        <div class="mobile-curr-lang-wrap">
                            <!-- <div class="single-mobile-curr-lang">
                                <a class="mobile-language-active" href="#">Language <i class="fa fa-angle-down"></i></a>
                                <div class="lang-curr-dropdown lang-dropdown-active">
                                    <ul>
                                        <li><a href="#">English (US)</a></li>
                                        <li><a href="#">English (UK)</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- <div class="single-mobile-curr-lang">
                                <a class="mobile-currency-active" href="#">Currency <i class="fa fa-angle-down"></i></a>
                                <div class="lang-curr-dropdown curr-dropdown-active">
                                    <ul>
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">Real</a></li>
                                        <li><a href="#">BDT</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="single-mobile-curr-lang">
                                <a class="mobile-account-active" href="#">My Account <i class="fa fa-angle-down"></i></a>
                                <div class="lang-curr-dropdown account-dropdown-active">
                                    <ul>

                                        <?php if ( !$this->ion_auth->logged_in() ): ?>
                                          <li><a href="#" data-toggle="modal" data-target="#defaultModal">Login/Register</a></li>
                                        <?php else: ?>
                                        <?php $user = $this->ion_auth->user()->row() ?>
                                          <li>
                                            <a href="#">My Account</a>
                                            <ul class="sub-menu-width">
                                              <li>
                                                <a href="<?= site_url('member/dashboard') ?>">Dashboard</a>
                                              </li>
                                              <li>
                                                <a href="<?= site_url('member/myaccount') ?>">My Profile</a>
                                              </li>
                                              <li>
                                                <a href="<?= site_url('my-course') ?>">My Course</a>
                                              </li>

                                              <?php if ($this->ion_auth->in_group(4)): ?>
                                              <?php $check_mentor_active = $this->db->where('user_id', $user->id)->where('active',1)->get('mentor'); ?>
                                              <?php if ($check_mentor_active->num_rows() > 0): ?>
                                                <li>
                                                  <a class="dropdown-item text-warning" href="#!">MENTOR AREA</a>
                                                </li>
                                                <li>
                                                  <a class="dropdown-item text-light" href="<?= site_url('mentor/dashboard') ?>">Dashboard</a>
                                                </li>
                                                <li>
                                                  <a class="dropdown-item text-light" href="<?= site_url('mentor/profile') ?>">Profile Mentor</a>
                                                </li>
                                                <li>
                                                  <a class="dropdown-item text-light" href="<?= site_url('mentor/upload') ?>">Upload Video</a>
                                                </li>
                                                <li>
                                                  <a class="dropdown-item text-light" href="<?= site_url('wishlist') ?>">Wishlist</a>
                                                </li>

                                              <?php endif; ?>
                                              <!-- END CHECK MENTOR ACTIVE -->
                                              <?php else: ?>
                                              <li>
                                                <a class="dropdown-item text-light" href="<?= site_url('mentor/register') ?>">Be a Mentor</a>
                                              </li>
                                              <?php endif; ?>

                                              <li>
                                                <a href="<?= site_url('signout') ?>">Logout</a>
                                              </li>
                                            </ul>
                                          </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-aside-menu">
                        <nav>
                            <ul>
                                <li><a href="<?= site_url() ?>">Home</a></li>
                                <li><a href="<?= site_url('about-us') ?>">About Us</a></li>
                                <li><a href="#">Course</a></li>
                                <li><a href="<?= site_url('mentor') ?>">Mentor</a></li>
                                <li><a href="<?= site_url('blog') ?>">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--<img src="assets/images/icon-img/payments.png" alt="payment">
                    <p>Pellentesque mollis nec orci id tincidunt. Sed mollis risus eu nisi aliquet, sit amet fermentum justo dapibus.</p>-->
                    <div class="aside-contact-info">
                        <ul>
                            <li><i class="dlicon ui-2_time-clock"></i>Monday - Friday: 8:30 - 17:00</li>
                            <li><i class="dlicon ui-1_email-84"></i>support@idtalenta.com</li>
                            <li><i class="dlicon tech-2_rotate"></i>0811849977</li>
                            <!--<li><i class="dlicon ui-1_home-minimal"></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>-->
                        </ul>
                    </div>
                    <div class="social-icon-style mb-25">
                        <a class="facebook" href="https://www.facebook.com/TalentaAnakBangsa/" taget="_blank"><i class="fab fa-facebook"></i></a>
                        <a class="twitter" href="https://instagram.com/idtalenta.academy"><i class="fab fa-instagram" taget="_blank"></i></a>
                    </div>
                    <div class="copyright">
                        <p>© 2020 <a href="http://www.idtalenta.com">IDTALENTA</a> All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL LOGIN -->

        <!-- LOGIN -->
  			<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
  					<div class="modal-content" style="overflow:hidden">

  						<div id="loginBox" class="modal-body p-5 appear-animation" data-appear-animation="bounceInDown" data-appear-animation-delay="300" data-appear-animation-duration="1s">
  							<h4>Masuk ke <strong>IDTALENTA</strong></h4>
  							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  							<form id="loginForm" class="mb-0" action="" method="post" enctype="application/x-www-form-urlencoded">
                  <div id="registerField" class="form-group d-none">
  									<input class="form-control" type="text" name="full_name" value="" placeholder="Full Name">
  								</div>
  								<div class="form-group">
  									<input class="form-control" type="text" name="identity" value="" placeholder="Email/Username">
  								</div>
  								<div class="form-group">
  									<input class="form-control" type="password" name="password" value="" placeholder="Password">
  								</div>
                  <div id="registerField" class="form-group d-none">
  									<input class="form-control" type="password" name="cpassword" value="" placeholder="Confirm Password">
  								</div>
  								<div class="form-row">
  									<div class="form-group col-lg-4 mb-0">
  										<button type="button" name="login" class="btn btn-warning btn-rounded">Masuk</button>
                      <button type="button" name="register" class="btn btn-dark btn-rounded d-none">Daftar</button>
  									</div>
  									<div id="rememberMe" class="form-group col-lg-4 mb-0">
  										<div class="custom-control custom-checkbox mr-sm-2 py-2">
  							        <input type="checkbox" name="remember" class="custom-control-input" id="customControlAutosizing">
  							        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
  							      </div>
  									</div>
  									<div id="forgotPassword" class="col-lg-4 py-2">
  										<a class="text-warning py-2" href="#" id="forgotPassword">
  											Lupa kata sandi?
  										</a>
  									</div>
  									<div class="col-lg-12 mt-3">
  										<a class="btn btn-rounded btn-info btn-block btn-modern" id="btnRegister" href="#">Belum punya akun? Daftar disini.</a>
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
