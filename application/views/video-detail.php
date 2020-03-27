<?php $row = $classDetail->row() ?>

<?php $videoType = substr($row->thriller,-3) ?>

<div class="main" role="main">

  <section class="section section-video-detail m-0 border-0">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="embed-responsive embed-responsive-16by9">
            <video controls controlsList="nodownload">
              <source src="<?= base_url('assets/uploads/videos/'.$row->thriller) ?>" type="video/<?= $videoType ?>">
            </video>
          </div>
          <div class="row mt-3">
            <div class="col">
              <h1 class="mb-2"><strong><?= $row->full_name ?></strong></h1>
              <h4><?= $mentor->class_name ?></h4>
            </div>
            <div class="col">
              <div class="d-block pb-2">
                <input type="text" class="d-none" value="<?= $this->mentor->star($row->mentor_class_id) ?>" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col">
              <?php if ($this->session->flashdata('rating-alert') != null): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('rating-alert') ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php echo form_error('star', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              <?php echo form_error('review', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              <div class="tabs tabs-product mb-2">
                <ul class="nav nav-tabs">
                  <!-- <li class="nav-item active"><a class="nav-link py-3 px-4" href="#productDescription" data-toggle="tab">Description</a></li> -->
                  <li class="nav-item active"><a class="nav-link py-3 px-4" href="#productReviews" data-toggle="tab"><?= $queryReview->num_rows() > 1 ? 'Reviews' : 'Review' ?> (<?= $queryReview->num_rows()  ?>)</a></li>
                </ul>
                <div class="tab-content p-0">
                  <div class="tab-pane p-4" id="productDescription">
                    <?= $row->description ?>
                  </div>

                  <div class="tab-pane p-4 active" id="productReviews">
                    <ul class="comments">
                      <?php if ($this->ion_auth->logged_in()): ?>
                        <?php if ($queryReview->num_rows() > 0): ?>
                          <?php foreach ($queryReview->result() as $key => $rev): ?>
                            <li>
                              <div class="comment">
                                <div class="img-thumbnail border-0 p-0 d-none d-md-block">
                                  <img class="avatar" alt="" src="img/avatars/avatar-2.jpg">
                                </div>
                                <div class="comment-block">
                                  <div class="comment-arrow"></div>
                                  <span class="comment-by">
                                    <strong><?= $rev->full_name ?></strong>
                                    <span class="float-right">
                                      <div class="pb-0 clearfix">
                                        <div title="Rated 3 out of 5" class="float-left">
                                          <input type="text" class="d-none" value="<?= $rev->star ?>" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                                        </div>

                                        <div class="review-num">
                                          <span class="count" itemprop="ratingCount"><?= $queryReview->num_rows()  ?></span> <?= $queryReview->num_rows() > 1 ? 'Reviews' : 'Review' ?>
                                        </div>
                                      </div>
                                    </span>
                                  </span>
                                  <p><?= $rev->description ?></p>
                                </div>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php endif; ?>

                      <?php else: ?>
                        <li>
                          <div class="comment">
                            <div class="comment-block text-center">
                              Anda harus login untuk melihat dan memberikan review.
                            </div>
                          </div>
                        </li>
                      <?php endif; ?>

                    </ul>
                    <?php if ($this->ion_auth->logged_in()): ?>
                    <?php $user = $this->ion_auth->user()->row() ?>
                      <hr class="solid my-5">
                      <h4>Add a review</h4>
                      <div class="row">
                        <div class="col">

                          <form action="<?= site_url('mentor/review') ?>" id="submitReview" method="post" class="needs-validation" enctype="application/x-www-form-urlencoded">
                            <div class="form-row">
                              <div class="form-group col pb-2">
                                <label class="required font-weight-bold text-dark">Rating</label>
                                <input type="text" class="rating-loading" name="star" value="0" title="" data-plugin-star-rating data-plugin-options="{'color': 'primary', 'size':'xs'}">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-lg-6">
                                <label class="required font-weight-bold text-dark">Name</label>
                                <input type="text" data-msg-required="Please enter your name." value="<?= $user->full_name  ?>" maxlength="100" class="form-control" name="name" id="name" readonly="readonly">
                              </div>
                              <div class="form-group col-lg-6">
                                <label class="required font-weight-bold text-dark">Email Address</label>
                                <input type="email" value="<?= $user->email ?>" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." readonly="readonly" class="form-control" name="email" id="email" >
                                <input type="hidden" name="class_id" value="<?= $row->mentor_class_id ?>">
                                <input type="hidden" name="user_id" value="<?= $user->id ?>">
                                <input type="hidden" name="slug" value="<?= url_title($row->title,'-',true) ?>">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col">
                                <label class="required font-weight-bold text-dark">Review</label>
                                <textarea data-msg-required="Please enter your review." rows="8" class="form-control" name="review" id="review" required>
                                  <?= set_value('review')  ?>
                                </textarea>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col mb-0">
                                <input type="submit" value="Post Review" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                              </div>
                            </div>
                          </form>
                        </div>

                      </div>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col px-4">
          <h3><strong><?= $row->title ?></strong></h3>
          <?= $row->description ?>

          <h4><strong><?= $videoDetail->num_rows() ?> <?= $videoDetail->num_rows() > 1 ? 'Videos' : 'Video' ?> </strong></h4>

          <?php if ($row->sale != 0): ?>
            <h1 class="mb-1"><strong>Rp. <?= number_format($this->app->sale($row->price,$row->sale),0,',','.')  ?>,-</strong></h1>
            <h4><del>Rp. <?= number_format($row->price,0,',','.')  ?>,- </del></h4>
          <?php else: ?>
            <h1><strong>Rp. <?= number_format($row->price,0,',','.')  ?>,-</strong></h1>
          <?php endif; ?>

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
                <a class="btn btn-lg btn-dark btn-outline btn-rounded btn-block" id="btn-wishlist" data-class="<?= $row->mentor_class_id ?>" data-user="<?= $user->id ?>" href="#">Wishlist</a>
                <?php else: ?>
                <a class="btn btn-lg btn-dark btn-outline btn-rounded btn-block" data-toggle="modal" data-target="#defaultModal" href="#">Wishlist</a>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mt-5">
        <div class="col-lg-3 text-center">
          <div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">VIDEO</strong></h1>
					</div>
        </div>
      </div>

      <div class="row">
        <div class="col">

          <?php if ($materi->num_rows() > 0): ?>
            <?php foreach ($materi->result() as $key => $mtr): ?>
              <div class="card mb-4">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col">
                      <h4 class="mb-0">
                        <span class="text-left"><strong><?= ($key + 1).'. '.$mtr->description ?></strong></span>
                        <span class="float-right text-warning">
                          <i class="fa fa-caret-right"></i>
                        </span>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </section>

  <section class="section section-videos section-video-detail border-0 m-0 pt-0">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-4 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">VIDEO POPULER</strong></h1>
					</div>
				</div>
			</div>

			<div class="row mt-4 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">

        <?php if ($classPopular->num_rows() > 0): ?>
          <?php foreach ($classPopular->result() as $key => $pop): ?>
            <div class="col-lg-4 mb-4">
							<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
								<span class="thumb-info-wrapper">
									<div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$pop->poster) ?>')">

									</div>
									<!-- <img src="" class="img-fluid" alt="<?= substr($pop->poster,0,-4) ?>"> -->
									<span class="thumb-info-action">
										<a href="<?= site_url('video/detail/'.$pop->mentor_class_id.'/'.url_title($pop->title,'-',true)) ?>">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
							<h4 class="mt-2 text-center text-3">
								<a class="text-dark" href="<?= site_url('video/detail/'.$pop->mentor_class_id.'/'.url_title($pop->title,'-',true)) ?>">
									<?= $pop->title ?>
								</a>
							</h4>

							<?php if ($pop->sale != 0): ?>
								<h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($pop->price,$pop->sale),0,',','.')  ?>,-</strong></h3>
								<h5 class="text-center"><del>Rp. <?= number_format($pop->price,0,',','.')  ?>,- </del></h5>
							<?php else: ?>
								<h3 class="text-center"><strong>Rp. <?= number_format($pop->price,0,',','.')  ?>,-</strong></h3>
							<?php endif; ?>

							<div class="button-action">
								<div class="row">
									<div class="col">
										<a class="btn btn-danger btn-rounded btn-outline btn-block" href="<?= site_url('video/detail/'.$pop->mentor_class_id.'/'.url_title($pop->title,'-',true)) ?>">Video Detail</a>
									</div>
									<div class="col">
										<form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
											<input type="hidden" name="product_id" value="<?= $pop->mentor_class_id ?>">
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
	</section>

</div>
