<?php $row = $classDetail->row() ?>

<?php $videoType = substr($row->thriller,-3) ?>

<div class="breadcrumb-area border-top-3 section-padding-1 breadcrumb-ptb-3">
    <div class="container-fluid">
        <div class="breadcrumb-content breadcrumb-font-inc">
            <ul>
                <li>
                    <a href="<?= site_url() ?>">Home</a>
                </li>
                <li><span> > </span></li>
                <li>
                    <a href="#">Category</a>
                </li>
                <li><span> > </span></li>
                <li class="active"> <?= $row->title ?> </li>
            </ul>
        </div>
    </div>
</div>

<div class="product-details-area section-padding-1 pb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="product-dec2-48">
                <div class="product-details-tab">

                  <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <?php if ($videoType == 'mp4'): ?>
                      <video controls poster="<?= base_url('assets/uploads/files/'.$row->poster) ?>">
                        <source src="<?= base_url('assets/uploads/videos/'.$row->thriller) ?>" type="video/<?= $videoType ?>">
                      </video>
                      <?php else: ?>
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $row->thriller ?>?rel=0"></iframe>  
                    <?php endif; ?>

                  </div>

                  <div class="author mt-5">
                    <h1 class="mb-2"><strong><?= $row->full_name ?></strong></h1>
                    <h4><?= $mentor->class_name ?></h4>
                  </div>


                </div>
            </div>
            <div class="product-dec2-52">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-content p-dec-content-edit">
                            <h2 class="uppercase mb-3"><?= $row->title ?></h2>

                            <div class="product-details-peragraph">
                                <?= $row->resume ?>
                            </div>

                            <div class="product-details-ratting-wrap">
                                <div class="product-details-ratting">

                                  <?php $rating = floor($this->mentor->star($row->mentor_class_id)) ?>
                                  <?php if ($rating > 0):

                                    for ($i=0; $i < $rating ; $i++) {
                                      echo '<i class="yellow fa fa-star"></i>';
                                    }

                                    if ($rating == 4) {
                                      echo '<i class=" fa fa-star"></i>';
                                    }elseif ($rating == 3) {
                                      echo '<i class=" fa fa-star"></i>';
                                      echo '<i class=" fa fa-star"></i>';
                                    }elseif ($rating == 2) {
                                      echo '<i class=" fa fa-star"></i>';
                                      echo '<i class=" fa fa-star"></i>';
                                      echo '<i class=" fa fa-star"></i>';
                                    }elseif ($rating == 1) {
                                      echo '<i class=" fa fa-star"></i>';
                                      echo '<i class=" fa fa-star"></i>';
                                      echo '<i class=" fa fa-star"></i>';
                                      echo '<i class=" fa fa-star"></i>';
                                    }else {
                                      echo '';
                                    }

                                  ?>

                                  <?php endif; ?>


                                </div>
                                <a href="#"> (<?= $queryReview->num_rows()  ?> customer review)</a>
                            </div>

                            <?php if ($row->sale != 0): ?>
                              <h3 class="mb-1"><strong>Rp. <?= number_format($this->app->sale($row->price,$row->sale),0,',','.')  ?>,-</strong></h3>
                              <h4><del>Rp. <?= number_format($row->price,0,',','.')  ?>,- </del></h4>
                            <?php else: ?>
                              <h3><strong>Rp. <?= number_format($row->price,0,',','.')  ?>,-</strong></h3>
                            <?php endif; ?>

                            <div class="product-action mb-4">
                              <div class="row">
                                <div class="col">
                                  <form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
                                    <input type="hidden" name="product_id" value="<?= $row->mentor_class_id ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" name="button" class="btn btn-outline btn-rounded btn-dark btn-block">Buy</button>
                                  </form>
                                </div>
                                <div class="col">
                                  <?php if ($this->ion_auth->logged_in()): ?>
                                    <a class="btn btn-danger btn-outline btn-rounded btn-block" id="btn-wishlist" data-class="<?= $row->mentor_class_id ?>" data-user="<?= $user->id ?>" href="#">Wishlist</a>
                                    <?php else: ?>
                                    <a class="btn btn-danger btn-outline btn-rounded btn-block" data-toggle="modal" data-target="#defaultModal" href="#">Wishlist</a>
                                  <?php endif; ?>

                                </div>
                              </div>
                            </div>


                            <div class="social-icon-style-3">
                                <a class="facebook" href="#"><i class="fab fa-facebook"></i></a>
                                <a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a>
                                <a class="pinterest" href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a class="google-plus" href="#"><i class="fab fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="description-review-area section-padding-7 pb-100">
    <div class="container-fluid">
      <?php if ($this->session->flashdata('rating-alert')): ?>
        <div class="row">
          <div class="col-12">
            <div class="alert alert-warning" role="alert">
              <?= $this->session->flashdata('rating-alert') ?>
            </div>
          </div>
        </div>

      <?php endif; ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        <a data-toggle="tab" href="#des-details2">Additional information</a>
                        <a data-toggle="tab" href="#des-details3">Reviews (<?= $queryReview->num_rows()  ?>)</a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="product-dec-content">
                                          <?= $row->description ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="additional-info">
                              <p>Empty</p>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane ">
                          <?php if ($this->ion_auth->logged_in()): ?>
                            <div class="review-wrapper">
                                <h2><?= $queryReview->num_rows()  ?> <?= $queryReview->num_rows() > 1 ? 'Reviews' : 'Review' ?> for <?= $row->title ?></h2>

                                <?php if ($queryReview->num_rows() > 0): ?>
                                  <?php foreach ($queryReview->result() as $key => $rev): ?>
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="assets/images/product-details/client-1.jpg" alt="">
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-name">
                                                    <h5><span><?= $rev->full_name ?> - </span></h5>
                                                </div>

                                                <div class="review-rating">
                                                  <?php $rating = floor($rev->star) ?>
                                                  <?php if ($rating > 0):

                                                    for ($i=0; $i < $rating ; $i++) {
                                                      echo '<i class="yellow fa fa-star"></i>';
                                                    }

                                                    if ($rating == 4) {
                                                      echo '<i class=" fa fa-star"></i>';
                                                    }elseif ($rating == 3) {
                                                      echo '<i class=" fa fa-star"></i>';
                                                      echo '<i class=" fa fa-star"></i>';
                                                    }elseif ($rating == 2) {
                                                      echo '<i class=" fa fa-star"></i>';
                                                      echo '<i class=" fa fa-star"></i>';
                                                      echo '<i class=" fa fa-star"></i>';
                                                    }elseif ($rating == 1) {
                                                      echo '<i class=" fa fa-star"></i>';
                                                      echo '<i class=" fa fa-star"></i>';
                                                      echo '<i class=" fa fa-star"></i>';
                                                      echo '<i class=" fa fa-star"></i>';
                                                    }else {
                                                      echo '';
                                                    }

                                                  ?>

                                                  <?php endif; ?>

                                                </div>
                                            </div>
                                            <?= $rev->description ?>
                                        </div>
                                    </div>
                                  <?php endforeach; ?>
                                <?php endif; ?>

                            </div>

                            <div class="ratting-form-wrapper">
                                <span>Add a Review</span>
                                <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                                <div class="ratting-form">
                                    <form action="<?= site_url('mentor/review') ?>" id="submitReview" method="post" class="needs-validation" enctype="application/x-www-form-urlencoded">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <label>Name <span>*</span></label>
                                                    <input type="text" name="name" value="<?= $user->full_name  ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <label>Email <span>*</span></label>
                                                    <input type="email" name="email" value="<?= $user->email  ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="star-box-wrap">
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style mb-20">
                                                    <label>Your review <span>*</span></label>
                                                    <textarea name="review"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <input type="submit" value="Submit">
                                                    <input type="hidden" name="class_id" value="<?= $row->mentor_class_id ?>">
                                                    <input type="hidden" name="user_id" value="<?= $user->id ?>">
                                                    <input type="hidden" name="slug" value="<?= url_title($row->title,'-',true) ?>">
                                                    <input type="hidden" name="star" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <?php else: ?>

                            <div class="alert alert-info" role="alert">
                              Please login for review.
                            </div>

                          <?php endif; ?>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="related-product-area section-padding-1 pb-95">
    <div class="container-fluid">
        <div class="section-title-6 mb-50">
            <h2 class="text-center">Related Courses</h2>
        </div>
        <div class="related-product-active owl-carousel">

          <?php if ($classPopular->num_rows() > 0): ?>
            <?php foreach ($classPopular->result() as $key => $pop): ?>
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
