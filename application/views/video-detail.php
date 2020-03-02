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
                <input type="text" class="rating-invisible" value="3.7" title="" data-plugin-star-rating data-plugin-options="{'step': 0.1, 'showCaption': true, 'color': 'dark', 'size':'sm'}">
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
              <a class="btn btn-lg btn-dark btn-outline btn-rounded btn-block" href="#">Wishlist</a>
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
