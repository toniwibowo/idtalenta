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
                      <?php foreach ($videoLatestView->result() as $key => $pop): ?>
                        <div class="product-wrap">
                            <div class="product-img default-overlay mb-25">
                                <a href="<?= site_url('course/'.$pop->mentor_class_id.'/'.url_title($pop->title,'-',true)) ?>">
                                    <img class="default-img" src="<?= base_url('assets/uploads/files/'.$pop->poster) ?>" alt="">
                                    <img class="hover-img" src="<?= base_url('assets/uploads/files/'.$pop->poster) ?>" alt="">
                                </a>
                                <div class="product-action product-action-position-1">
                                    <!-- <a data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-eye"></i><span>Quick Shop</span></a>
                                    <a title="Add to Wishlist" href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a>
                                    <a class="icon-blod" title="Add to Compare" href="#"><i class="dlicon arrows-4_compare"></i><span>Add to Compare</span></a>
                                    <a title="Add to Cart" href="#"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></a> -->
                                </div>
                            </div>
                            <div class="product-content-2 title-font-width-400 text-center">
                                <h3><a href="<?= site_url('course/'.$pop->mentor_class_id.'/'.url_title($pop->title,'-',true)) ?>"><?= $pop->title ?></a></h3>
                                <div class="product-price">
                                  <?php if ($pop->sale != 0): ?>
                                    <span class="new-price">Rp. <?= number_format($this->app->sale($pop->price,$pop->sale),0,',','.')  ?></span><br>
                    								<span class="new-price"><del>Rp. <?= number_format($pop->price,0,',','.')  ?> </del></span>

                    							<?php else: ?>
                    								<span class="text-center"><strong>Rp. <?= number_format($pop->price,0,',','.')  ?>,-</strong></span>
                    							<?php endif; ?>

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
