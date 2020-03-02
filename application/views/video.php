<div class="main" role="main">
	<section class="section section-video border-0 m-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">VIDEO</strong></h1>
					</div>
				</div>
			</div>

			<div class="row">
				<?php if ($mentorClass->num_rows() > 0): ?>
          <?php foreach ($mentorClass->result() as $key => $video): ?>
            <div class="col-lg-4 mb-5">
    					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
    						<span class="thumb-info-wrapper">
    							<img src="<?= base_url('assets/uploads/files/'.$video->poster) ?>" class="img-fluid" alt="<?= substr($video->poster,0,-4) ?>">
    							<span class="thumb-info-action">
    								<a href="<?= site_url('mentor/videodetail/'.$video->mentor_class_id.'/'.url_title($video->title,'-',true)) ?>">
    									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
    								</a>
    							</span>
    						</span>
    					</span>
    					<h4 class="mt-2 text-center">
    						<a class="text-dark" href="<?= site_url('mentor/videodetail/'.$video->mentor_class_id.'/'.url_title($video->title,'-',true)) ?>">
    							<?= $video->title ?>
    						</a>
    					</h4>
              <?php if ($video->sale != 0): ?>
                <h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($video->price,$video->sale),0,',','.')  ?>,-</strong></h3>
                <h5 class="text-center"><del>Rp. <?= number_format($video->price,0,',','.')  ?>,- </del></h5>
              <?php else: ?>
                <h3 class="text-center"><strong>Rp. <?= number_format($video->price,0,',','.')  ?>,-</strong></h3>
              <?php endif; ?>

              <div class="row">
                <div class="col">
                  <a class="btn btn-outline btn-rounded btn-warning btn-block" href="<?= site_url('mentor/videodetail/'.$video->mentor_class_id.'/'.url_title($video->title,'-',true)) ?>">Video Detail</a>
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

</div>
