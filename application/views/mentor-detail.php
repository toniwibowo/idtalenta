<?php $row = $mentorDetail->row() ?>

<?php $videoType = substr($row->mentor_video,-3) ?>

<div class="main d-inline-block" role="main">
  <section class="section section-mentor m-0 border-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col text-center">

            <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/o_mMLzZYjd8?rel=0" allowfullscreen></iframe> -->
            <?php if ($videoType == 'mp4' || $videoType == 'flv' || $videoType == 'ogg' || $videoType == '3gp'): ?>
              <div class="embed-responsive embed-responsive-16by9">
                <video controls controlsList="nodownload">
                  <source src="<?= base_url('assets/uploads/videos/'.$row->mentor_video) ?>" type="video/<?= $videoType ?>">
                </video>
              </div>
            <?php endif; ?>


          <div class="entry-title mt-5">
            <h1 class="mb-3"><strong><?= $row->full_name ?></strong></h1>
            <h3 class="text-warning"><?= $row->class_name ?></h3>
          </div>
				</div>
      </div>
    </div>
  </section>

  <section class="section section-videos section-video-detail border-0 m-0 pt-0">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">VIDEO</strong></h1>
					</div>
				</div>
			</div>

			<div class="row mt-4 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">

        <?php if ($mentorClass->num_rows() > 0): ?>
          <?php foreach ($mentorClass->result() as $key => $video): ?>
            <div class="col-lg-4 mb-5">
    					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
    						<span class="thumb-info-wrapper">
                  <div class="poster" style="background-image:url('<?= base_url('assets/uploads/files/'.$video->poster) ?>')"></div>
    							<!-- <img src="<?= base_url('assets/uploads/files/'.$video->poster) ?>" class="img-fluid" alt="<?= substr($video->poster,0,-4) ?>"> -->
    							<span class="thumb-info-action">
    								<a href="<?= site_url('course/'.$video->mentor_class_id.'/'.url_title($video->title,'-',true)) ?>">
    									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
    								</a>
    							</span>
    						</span>
    					</span>
    					<h4 class="mt-2 text-center mb-0">
    						<a class="text-dark" href="<?= site_url('course/'.$video->mentor_class_id.'/'.url_title($video->title,'-',true)) ?>">
    							<?= $video->title ?>
    						</a>
    					</h4>

              <?php $mentor = $this->ion_auth->user($video->user_id)->row(); ?>
              <p class="text-center"><small class="text-2">Mentor: <?= $mentor->full_name ?></small></p>

              <?php if ($video->sale != 0): ?>
                <h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($video->price,$video->sale),0,',','.')  ?>,-</strong></h3>
                <h5 class="text-center"><del>Rp. <?= number_format($video->price,0,',','.')  ?>,- </del></h5>
              <?php else: ?>
                <h3 class="text-center"><strong>Rp. <?= number_format($video->price,0,',','.')  ?>,-</strong></h3>
              <?php endif; ?>

              <div class="row">
                <div class="col">
                  <a class="btn btn-outline btn-rounded btn-warning btn-block" href="<?= site_url('course/'.$video->mentor_class_id.'/'.url_title($video->title,'-',true)) ?>">Video Detail</a>
                </div>
                <div class="col">
                  <form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
                    <input type="hidden" name="product_id" value="<?= $video->mentor_class_id ?>">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" name="button" class="btn btn-outline btn-rounded btn-dark btn-block">Buy</button>
                  </form>
                </div>
              </div>
    				</div>
          <?php endforeach; ?>
          <?php else: ?>
            <div class="col">
              <div class="alert alert-info text-center" role="alert">
                Sorry, mentor's video is not found.
              </div>
            </div>

        <?php endif; ?>

			</div>
		</div>
	</section>

  <section class="section section-profile-mentor m-0 border-0">
    <div class="container">
      <div class="row justify-content-center">
				<div class="col-lg-4 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">Profil Kontributor</strong></h1>
					</div>
				</div>
			</div>

      <div class="row">
        <div class="col">
          <div class="media">
            <?php if ($row->photo != ''): ?>
              <img class="img-fluid" width="50%" src="<?= base_url('images/avatars/'.$row->photo) ?>" alt="<?= substr($row->photo,0,-4) ?>">
            <?php else: ?>
              <img class="img-fluid" src="<?= base_url('images/avatars/avatar.jpg') ?>" alt="ARTademi">
            <?php endif; ?>

            <div class="media-body p-4">
              <h3><strong><?= $row->full_name ?></strong></h3>
              <?= $row->profile ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
