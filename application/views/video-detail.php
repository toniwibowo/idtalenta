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
              <a class="btn btn-lg btn-warning btn-outline btn-rounded btn-block" href="#">Beli</a>
            </div>
            <div class="col">
              <a class="btn btn-lg btn-dark btn-outline btn-rounded btn-block" id="btn-wishlist" data-class="<?= $row->mentor_class_id ?>" data-user="<?= $user->id ?>" href="#">Wishlist</a>
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
          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col">
                  <h4 class="mb-0">
                    <span class="text-left"><strong>1. Introduction</strong></span>
                    <span class="float-right text-warning">
                      <i class="fa fa-caret-right"></i>
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col">
                  <h4 class="mb-0">
                    <span class="text-left"><strong>2. There are many variations of passages of Lorem Ipsum available, but the majority have suffered</strong></span>
                    <span class="float-right text-warning">
                      <i class="fa fa-caret-right"></i>
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col">
                  <h4 class="mb-0">
                    <span class="text-left"><strong>3. It is a long established fact that a reader will be distracted by the readable</strong></span>
                    <span class="float-right text-warning">
                      <i class="fa fa-caret-right"></i>
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col">
                  <h4 class="mb-0">
                    <span class="text-left"><strong>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong></span>
                    <span class="float-right text-warning">
                      <i class="fa fa-caret-right"></i>
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col">
                  <h4 class="mb-0">
                    <span class="text-left"><strong>5. Conclusion</strong></span>
                    <span class="float-right text-warning">
                      <i class="fa fa-caret-right"></i>
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          </div>

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
				<div class="col-lg-4 mb-5">
					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
						<span class="thumb-info-wrapper">
							<img src="<?= base_url('images/video/video-1.jpg') ?>" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<a href="#">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
					<h4 class="mt-2 text-center">
						<a class="text-dark" href="#">
							4 Steps of The Creative Process
						</a>
					</h4>
          <h3 class="text-center"><strong>Rp. 400.000,-</strong></h3>
          <div class="row">
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-warning btn-block" href="#">Buy</a>
            </div>
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-dark btn-block" href="#">Buy</a>
            </div>
          </div>
				</div>

				<div class="col-lg-4">
					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
						<span class="thumb-info-wrapper">
							<img src="<?= base_url('images/video/video-2.jpg') ?>" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<a href="#">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
					<h4 class="mt-2 text-center">
						<a class="text-dark" href="#">
							How to Make a Clay Pot by Wheel
						</a>
					</h4>

          <h3 class="text-center"><strong>Rp. 500.000,-</strong></h3>
          <div class="row">
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-warning btn-block" href="#">Buy</a>
            </div>
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-dark btn-block" href="#">Buy</a>
            </div>
          </div>

				</div>

				<div class="col-lg-4">
					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
						<span class="thumb-info-wrapper">
							<img src="<?= base_url('images/video/video-3.jpg') ?>" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<a href="#">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
					<h4 class="mt-2 text-center">
						<a class="text-dark" href="#">
							Dig Into Digital Illustration with Procreate
						</a>
					</h4>

          <h3 class="text-center"><strong>Rp. 600.000,-</strong></h3>
          <div class="row">
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-warning btn-block" href="#">Buy</a>
            </div>
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-dark btn-block" href="#">Buy</a>
            </div>
          </div>

				</div>

				<div class="col-lg-4">
					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
						<span class="thumb-info-wrapper">
							<img src="<?= base_url('images/video/video-4.jpg') ?>" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<a href="#">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
					<h4 class="mt-2 text-center">
						<a class="text-dark" href="#">
							17 Types of Photography: Which Niche is Right for You?
						</a>
					</h4>

          <h3 class="text-center"><strong>Rp. 700.000,-</strong></h3>
          <div class="row">
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-warning btn-block" href="#">Buy</a>
            </div>
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-dark btn-block" href="#">Buy</a>
            </div>
          </div>

				</div>

				<div class="col-lg-4">
					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
						<span class="thumb-info-wrapper">
							<img src="<?= base_url('images/video/video-5.jpg') ?>" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<a href="#">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
					<h4 class="mt-2 text-center">
						<a class="text-dark" href="#">
							Steps to Create a Compelling 2D Animation That Everyone Will Love
						</a>
					</h4>

          <h3 class="text-center"><strong>Rp. 800.000,-</strong></h3>
          <div class="row">
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-warning btn-block" href="#">Buy</a>
            </div>
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-dark btn-block" href="#">Buy</a>
            </div>
          </div>

				</div>

				<div class="col-lg-4">
					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
						<span class="thumb-info-wrapper">
							<img src="<?= base_url('images/video/video-6.jpg') ?>" class="img-fluid" alt="">
							<span class="thumb-info-action">
								<a href="#">
									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
								</a>
							</span>
						</span>
					</span>
					<h4 class="mt-2 text-center">
						<a class="text-dark" href="#">
							High-Low Collaborations Democratised Fashion
						</a>
					</h4>

          <h3 class="text-center"><strong>Rp. 900.000,-</strong></h3>
          <div class="row">
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-warning btn-block" href="#">Buy</a>
            </div>
            <div class="col">
              <a class="btn btn-outline btn-rounded btn-dark btn-block" href="#">Buy</a>
            </div>
          </div>

				</div>
			</div>
		</div>
	</section>

</div>
