<div class="main d-grid" role="main">
  <section class="section section-dashboard section-dashboard-banner m-0 border-0">
    <div class="container">
      <div class="row no-gutters">
        <div class="col parallax m-0 p-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url('images/video/video-3.jpg')  ?>">
          <div class="row dashboard-banner-box align-items-center">
            <div class="col text-center">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-dashboard-content m-0 border-0 pt-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 d-none">
          <div class="featured-box featured-box-primary nav-left-sidebar member ">
            <div class="box-content p-0 text-left">
              <h4 class="p-4 mb-0"><strong>Navigation</strong></h4>
              <ul>
                <li>
                  <a class="active" href="#">
                    <i class="fa fa-home fa-2x"></i>
                    <span>Beranda</span>
                  </a>
                </li>
                <!-- <li>
                  <a href="#">
                    <i class="fa fa-film fa-2x"></i>
                    <span>Daftar Video</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-credit-card fa-2x"></i>
                    <span>Tagihan</span>
                  </a>
                </li> -->
                <li>
                  <a href="contributor">
                    <i class=""></i>
                    <span>MENJADI CONTRIBUTOR</span>
                  </a>
                </li>
                <li>
                  <a href="<?= site_url('syarat') ?>">
                    <i class=""></i>
                    <span>SYARAT DAN KETENTUAN</span>
                  </a>
                </li>
                <li>
                  <a href="<?= site_url('kebijakan') ?>">
                    <i class=""></i>
                    <span>KEBIJAKAN PRIVASI</span>
                  </a>
                </li>
              </ul>
            </div>

          </div>
        </div>

        <div class="col-lg-12">

          <div class="related-product-area section-padding-1 pb-95">
              <div class="container-fluid">
                  <div class="section-title-6 mb-50">
                      <h2 class="text-center">Video Terakhir Diikuti</h2>
                  </div>
                  <div class="owl-carousel" id="latestViewVideo">

                    <?php if ($videoLatestView->num_rows() > 0): ?>
                      <?php foreach ($videoLatestView->result() as $key => $view): ?>
                        <div class="product-wrap">
                          <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
                            <span class="thumb-info-wrapper">
                              <div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$view->poster) ?>')">

                              </div>
                              <!-- <img src="" class="img-fluid" alt="<?= substr($view->poster,0,-4) ?>"> -->
                              <span class="thumb-info-action">
                                <a href="<?= site_url('course/'.$view->mentor_class_id.'/'.url_title($view->title,'-',true)) ?>">
                                  <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
                                </a>
                              </span>
                            </span>
                          </span>
                          <h4 class="mt-2 text-center text-3">
                            <a class="text-dark" href="<?= site_url('course/'.$view->mentor_class_id.'/'.url_title($view->title,'-',true)) ?>">
                              <?= $view->title ?>
                            </a>
                          </h4>

                          <?php if ($view->sale != 0): ?>
                            <h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($view->price,$view->sale),0,',','.')  ?>,-</strong></h3>
                            <h5 class="text-center"><del>Rp. <?= number_format($view->price,0,',','.')  ?>,- </del></h5>
                          <?php else: ?>
                            <h3 class="text-center"><strong>Rp. <?= number_format($view->price,0,',','.')  ?>,-</strong></h3>
                          <?php endif; ?>

                          <div class="button-action">
                            <div class="row">
                              <div class="col">
                                <a class="btn btn-danger btn-rounded btn-outline btn-block" href="<?= site_url('course/'.$view->mentor_class_id.'/'.url_title($view->title,'-',true)) ?>">Video Detail</a>
                              </div>
                              <div class="col">
                                <form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
                                  <input type="hidden" name="product_id" value="<?= $view->mentor_class_id ?>">
                                  <input type="hidden" name="qty" value="1">
                                  <button type="submit" name="button" class="btn btn-outline btn-rounded btn-dark btn-block">Buy</button>
                                </form>
                              </div>
                            </div>

                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>

                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
