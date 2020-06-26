<div class="main" style="display:grid" role="main">
  <section class="page-header page-header-classic page-header-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">Search</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Search</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-search section-mentor border-0 m-0 bg-white">
    <div class="container">
      <div class="row">

        <?php $uri = $this->uri->segment(2) ?>

        <?php if ($uri == null): ?>
          <?php if ($queryResult->num_rows() > 0): ?>

            <div class="col-lg-12">
              <div class="heading heading-border heading-bottom-double-border">
  							<h5 class="font-weight-normal">Hasil Pencarian <strong class="font-weight-extra-bold">Video:</strong></h5>
  						</div>
            </div>

  					<?php foreach ($queryResult->result() as $key => $src): ?>
  						<div class="col-lg-4 mb-4">
  							<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
  								<span class="thumb-info-wrapper">
  									<div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$src->poster) ?>')">

  									</div>
  									<!-- <img src="" class="img-fluid" alt="<?= substr($src->poster,0,-4) ?>"> -->
  									<span class="thumb-info-action">
  										<a href="<?= site_url('course/'.$src->mentor_class_id.'/'.url_title($src->title,'-',true)) ?>">
  											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
  										</a>
  									</span>
  								</span>
  							</span>
  							<h4 class="mt-2 text-center text-3 mb-0">
  								<a class="text-dark" href="<?= site_url('course/'.$src->mentor_class_id.'/'.url_title($src->title,'-',true)) ?>">
  									<?= $src->title ?>
  								</a>
  							</h4>

  							<?php $mentor = $this->ion_auth->user($src->user_id)->row(); ?>
  							<p class="text-center mb-2"><small class="text-2">Mentor: <?= $mentor->full_name ?></small></p>

  							<?php if ($src->sale != 0): ?>
  								<h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($src->price,$src->sale),0,',','.')  ?>,-</strong></h3>
  								<h5 class="text-center"><del>Rp. <?= number_format($src->price,0,',','.')  ?>,- </del></h5>
  							<?php else: ?>
  								<h3 class="text-center"><strong>Rp. <?= number_format($src->price,0,',','.')  ?>,-</strong></h3>
  							<?php endif; ?>

  							<div class="button-action">
  								<div class="row">
  									<div class="col">
  										<a class="btn btn-danger btn-rounded btn-outline btn-block" href="<?= site_url('course/'.$src->mentor_class_id.'/'.url_title($src->title,'-',true)) ?>">Video Detail</a>
  									</div>
  									<div class="col">
  										<form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
  											<input type="hidden" name="product_id" value="<?= $src->mentor_class_id ?>">
  											<input type="hidden" name="qty" value="1">
  											<button type="submit" name="button" class="btn btn-outline btn-rounded btn-dark btn-block">Buy</button>
  										</form>
  									</div>
  								</div>

  							</div>
  						</div>
  					<?php endforeach; ?>
            <div class="spreater my-5">

            </div>
  				<?php endif; ?>
        <?php endif; ?>

        <?php if ($searchResultMentor->num_rows() > 0): ?>

          <div class="col-lg-12">
            <div class="heading heading-border heading-bottom-double-border">
              <h5 class="font-weight-normal">Hasil Pencarian <strong class="font-weight-extra-bold">Mentor:</strong></h5>
            </div>
          </div>

          <?php foreach ($searchResultMentor->result() as $key => $mentor): ?>
            <div class="col-lg-4">
              <div class="card mb-4">
                <a href="<?= site_url('mentor/detail/'.$mentor->mentor_id.'/'.url_title($mentor->full_name,'-',true)) ?>" style="background-image:url('<?= base_url('images/avatars/'.$mentor->photo) ?>')">
                  <!-- <img alt="" class="img-fluid" src=""> -->
                </a>

                <div class="card-body p-3">
                  <h3>
                    <a class="text-dark" href="<?= site_url('mentor/detail/'.$mentor->mentor_id.'/'.url_title($mentor->full_name,'-',true)) ?>">
                      <?= $mentor->full_name ?></h3>
                    </a>
                  <?= $mentor->resume ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>




      </div>
    </div>
  </section>
</div>
