        <div class="slider-area">
            <div class="container-fluid p-0">
                <div class="main-slider-active-3 owl-carousel slider-dot-position-3 slider-dot-style-2">
                  <?php if ($querySlider->num_rows() > 0): ?>
                    <?php foreach ($querySlider->result() as $key => $slide): ?>
                      <div class="single-main-slider slider-animated-1 bg-img slider-height-hm11 align-items-center custom-d-flex" style="background-image:url('assets/uploads/sliders/<?= $slide->file_image ?>');">
                          <div class="row no-gutters width-100-percent">
                              <div class="col-lg-12 col-md-12">
                                  <div class="main-slider-content-11-1 text-center">
                                      <!--<h1 class="animated">Scandinavian interior </h1>-->
                                      <!--<div class="slider-btn-2 slider-btn-2-border-white">
                                          <a class="animated" href="product-details.html">SHOP NOW </a>
                                      </div>-->
                                  </div>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>


                </div>
            </div>
        </div>
        <div class="banner-area section-padding-1 banner-area-hm11 pt-130 pb-100">
            <div class="container-fluid padding-70-row-col">
              <?php if ($this->session->flashdata('validate')): ?>
                <p class="alert alert-info mb-4" role="alert">Your email has successfully validate, you may login now.</p>
              <?php endif; ?>
                <div class="section-title-12 text-center mb-60">
                    <h2>IDTALENTA COURSE</h2>
                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer <br>condimentum sed mi ac efficitur. In sit amet ullamco</p>
                </div>
                <div class="row">

                  <?php if ($queryBanner->num_rows() > 0): ?>
                    <?php foreach ($queryBanner->result() as $key => $banner): ?>
                      <div class="col-lg-4 col-md-4">
                          <div class="banner-wrap default-overlay-2 banner-zoom mb-30">
                              <div class="banner-img">
                                <?php if ($banner->url == ''): ?>
                                  <a href="#"><img src="<?= base_url('assets/uploads/files/'.$banner->file_banner) ?>" alt="banner"></a>
                                  <?php else: ?>
                                  <a href="<?= $banner->url ?>"><img src="<?= base_url('assets/uploads/files/'.$banner->file_banner) ?>" alt="banner"></a>
                                <?php endif; ?>

                              </div>
                              <div class="banner-content-11 text-center">
                                  <h3><a href="<?= $banner->url == '' ? $banner->url : '' ?>"><?= $banner->title ?></a></h3>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="product-area section-padding-1 pb-125">
            <div class="container-fluid">
                <div class="section-title-12 text-center mb-65">
                    <h2>LATEST COURSE</h2>
                    <p>Class aptent taciti sociosqu ad litora torquent per con</p>
                </div>
                <div class="row">
                  <?php if ($queryCourse->num_rows() > 0): ?>
                    <?php foreach ($queryCourse->result() as $key => $course): ?>
                      <div class="custom-col-5">
                          <div class="product-wrap mb-50">
                              <div class="product-img default-overlay mb-25">
                                  <a href="product-details.html">
                                      <img class="default-img" src="<?= base_url('assets/uploads/files/'.$course->poster) ?>" alt="">
                                  </a>
                                  <div class="product-action product-action-sky product-action-position-1">
                                      <!-- <a data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-eye"></i><span>Quick Shop</span></a> -->
                                      <a href="<?= site_url('course/'.$course->mentor_class_id.'/'.url_title($course->title,'-',true)) ?>"><i class="fa fa-eye"></i><span>Quick Shop</span></a>
                                      <a title="Add to Wishlist" href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a>
                                       <!--<a class="icon-blod" title="Add to Compare" href="#"><i class="dlicon arrows-4_compare"></i><span>Add to Compare</span></a>-->
                                      <a title="Add to Cart" href="#"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></a>
                                  </div>
                              </div>
                              <div class="product-content-4 product-content-sky title-font-width-400 text-center">
                                  <h3><a href="<?= site_url('course/'.$course->mentor_class_id.'/'.url_title($course->title,'-',true)) ?>"><?= $course->title ?></a></h3>
                                  <div class="product-price product-price-red">
                                    <?php if ($course->sale != 0): ?>
                                      <span class="new-price">Rp. <?= number_format($this->app->sale($course->price,$course->sale),0,',','.')  ?>,-</span>
                                      <?php else: ?>
                                      <span class="new-price">Rp. <?= number_format($course->price,0,',','.')  ?>,-</span>
                                    <?php endif; ?>

                                  </div>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>

                    </div>
                </div>
                <div class="pro-view-all-3 text-center">
                    <a href="<?= site_url('video/course') ?>">View all product</a>
                </div>
            </div>
        </div>

        <div class="choose-area jarallax parallax-img section-padding-1 pt-130 pb-100" style="background-image:url(images/bg/slider-middle-1.jpg);">
            <div class="container-fluid">
                <div class="section-title-12 title-12-white text-center mb-65">
                    <h2>Why Choose Us</h2>
                    <p>Class aptent taciti sociosqu ad litora torquent per con</p>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-choose mb-30">
                            <div class="choose-icon">
                                <i class="dlicon shopping_cart"></i>
                            </div>
                            <div class="choose-content">
                                <h3>Free Membership</h3>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum sed mi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-choose mb-30">
                            <div class="choose-icon">
                                <i class="dlicon education_award-55"></i>
                            </div>
                            <div class="choose-content">
                                <h3>Best Mentor</h3>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum sed mi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-choose mb-30">
                            <div class="choose-icon">
                                <i class="dlicon envir_home"></i>
                            </div>
                            <div class="choose-content">
                                <h3>Best Quality Video</h3>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum sed mi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-area section-padding-1 pt-130 pb-125">
            <div class="container-fluid">
                <div class="section-title-12 text-center mb-65">
                    <h2>Top Sale This Week</h2>
                    <p>Class aptent taciti sociosqu ad litora torquent per con</p>
                </div>
                <div class="row">
                  <?php if ($queryTopSale->num_rows() > 0): ?>
                    <?php foreach ($queryTopSale->result() as $key => $sale): ?>
                      <div class="custom-col-5">
                          <div class="product-wrap mb-50">
                              <div class="product-img default-overlay mb-25">
                                  <a href="product-details.html">
                                      <img class="default-img" src="<?= base_url('assets/uploads/files/'.$sale->poster) ?>" alt="">
                                  </a>
                                  <div class="product-action product-action-sky product-action-position-1">
                                      <!-- <a data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-eye"></i><span>Quick Shop</span></a> -->
                                      <a href="<?= site_url('course/'.$sale->mentor_class_id.'/'.url_title($sale->title,'-',true)) ?>"><i class="fa fa-eye"></i><span>Quick Shop</span></a>
                                      <a title="Add to Wishlist" href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a>
                                      <!--<a class="icon-blod" title="Add to Compare" href="#"><i class="dlicon arrows-4_compare"></i><span>Add to Compare</span></a>-->
                                      <a title="Add to Cart" href="#"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></a>
                                  </div>
                              </div>
                              <div class="product-content-4 product-content-sky title-font-width-400 text-center">
                                  <h3><a href="<?= site_url('course/'.$sale->mentor_class_id.'/'.url_title($sale->title,'-',true)) ?>"><?= $sale->title ?></a></h3>
                                  <div class="product-price product-price-red">
                                    <?php if ($sale->sale != 0): ?>
                                      <span class="new-price">Rp. <?= number_format($this->app->sale($sale->price,$sale->sale),0,',','.')  ?>,-</span>
                                      <?php else: ?>
                                      <span class="new-price">Rp. <?= number_format($sale->price,0,',','.')  ?>,-</span>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </div>
                <div class="pro-view-all-3 text-center">
                    <a href="#">View all product</a>
                </div>
            </div>
        </div>

        <div class="banner-area">
            <div class="banner-slider-active-3 owl-carousel">
                <div class="single-banner-slider bg-img pt-180 pb-180" style="background-image:url(images/banner/slider-middle-2.jpg);">
                    <div class="single-banner-slider-wrap">
                        <div class="single-banner-slider-content slider-animated-1">
                            <span>Popular Course</span>
                            <h3 class="slider-animated-1">Sales Force</h3>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum sed mi</p>
                            <div class="banner-slider-btn">
                                <a href="#">DISCOVER</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-banner-slider bg-img pt-180 pb-180" style="background-image:url(images/banner/slider-middle-3.jpg);">
                    <div class="single-banner-slider-wrap">
                        <div class="single-banner-slider-content slider-animated-1">
                            <span>Popular Course</span>
                            <h3>Digital Marketing</h3>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum sed mi</p>
                            <div class="banner-slider-btn">
                                <a href="#">DISCOVER</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-banner-slider bg-img pt-180 pb-180" style="background-image:url(images/banner/slider-middle-4.jpg);">
                    <div class="single-banner-slider-wrap">
                        <div class="single-banner-slider-content slider-animated-1">
                            <span>Popular Course</span>
                            <h3>Graphic Design</h3>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer condimentum sed mi</p>
                            <div class="banner-slider-btn">
                                <a href="#">DISCOVER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--
        <div class="testimonial-area section-padding-1 pt-130 pb-125">
            <div class="container-fluid">
                <div class="section-title-12 text-center mb-70">
                    <h2>Clients say</h2>
                </div>
                <div class="testimonial-active owl-carousel">
                    <div class="single-testimonial-2 text-center">
                        <img src="assets/images/icon-img/testimonial-icon-02.png" alt="testimonial">
                        <p>Nulla vulputate nulla lectus, in vulputate metus lobortis id. Cras scelerisque urna sed urna tincidunt tempor. Quisque finibus ultrices mauris, sit amet</p>
                        <div class="client-img-2">
                            <img src="assets/images/testimonial/client-img-1.jpg" alt="testimonial">
                        </div>
                        <div class="client-info-2">
                            <h3>John Borthwick</h3>
                            <span>Founder & CEO</span>
                        </div>
                    </div>
                    <div class="single-testimonial-2 text-center">
                        <img src="assets/images/icon-img/testimonial-icon-02.png" alt="testimonial">
                        <p>Nulla vulputate nulla lectus, in vulputate metus lobortis id. Cras scelerisque urna sed urna tincidunt tempor. Quisque finibus ultrices mauris, sit amet</p>
                        <div class="client-img-2">
                            <img src="assets/images/testimonial/client-img-1.jpg" alt="testimonial">
                        </div>
                        <div class="client-info-2">
                            <h3>Jane Bill</h3>
                            <span>Founder & CEO</span>
                        </div>
                    </div>
                    <div class="single-testimonial-2 text-center">
                        <img src="assets/images/icon-img/testimonial-icon-02.png" alt="testimonial">
                        <p>Nulla vulputate nulla lectus, in vulputate metus lobortis id. Cras scelerisque urna sed urna tincidunt tempor. Quisque finibus ultrices mauris, sit amet</p>
                        <div class="client-img-2">
                            <img src="assets/images/testimonial/client-img-1.jpg" alt="testimonial">
                        </div>
                        <div class="client-info-2">
                            <h3>Mary Scott</h3>
                            <span>Founder & CEO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->






        <div class="blog-area section-padding-1 bg-gray pt-130 pb-100">
            <div class="container-fluid">
                <div class="section-title-12 text-center mb-70">
                    <h2>BLOGS</h2>
                </div>
                <div class="row">
                  <?php if ($queryArticles->num_rows()): ?>
                    <?php foreach ($queryArticles->result() as $key => $article): ?>
                      <div class="col-lg-4 col-md-6">
                          <div class="blog-wrap-2 mb-30 bg-white">
                              <div class="blog-img-2 mb-50">
                                  <a href="blog-details-1.php"><img src="<?= base_url('assets/uploads/blogs/'.$article->image_small) ?>" alt="blog"></a>
                              </div>
                              <div class="blog-content-2">
                                  <h3>
                                    <a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>">
                                      Sekolah masa depan di era digital—belajar dan mengajar di mana saja
                                    </a>
                                  </h3>
                                  <div class="blog-meta light-sky-meta">
                                      <ul>
                                          <li><a href="#">December 5, 2018</a></li>
                                          <li>By <a href="#">Joe Doe</a></li>
                                          <li><a href="#">Photography</a></li>
                                      </ul>
                                  </div>
                                  <?= $article->resume ?>
                                  <div class="blog-btn-2 blog-btn-2-sky">
                                      <a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>">Read More</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="brand-area section-padding-3 pt-20 pb-20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo-2 text-center">
                            <a href="#"><img src="images/brand-logo/brand-logo-1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo-2 text-center">
                            <a href="#"><img src="images/brand-logo/brand-logo-2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo-2 text-center">
                            <a href="#"><img src="images/brand-logo/brand-logo-3.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo-2 text-center">
                            <a href="#"><img src="images/brand-logo/brand-logo-4.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo-2 text-center">
                            <a href="#"><img src="images/brand-logo/brand-logo-5.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo-2 text-center">
                            <a href="#"><img src="images/brand-logo/brand-logo-6.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
