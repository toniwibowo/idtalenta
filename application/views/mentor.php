<div class="main" role="main">
  <section class="section section-mentor border-0 m-0">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">MENTOR</strong></h1>
					</div>
				</div>
			</div>

			<div class="row my-5">
				<div class="col appear-animation" data-appear-animation="bounceInUp" data-appear-animation-delay="300" data-appear-animation-duration="1s">
          <div class="row">

            <?php if ($queryMentor->num_rows() > 0): ?>
              <?php foreach ($queryMentor->result() as $key => $value): ?>
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <a href="<?= site_url('mentor/detail/'.$value->id_mentor.'/'.url_title($value->full_name,'-',true)) ?>">
                      <img alt="" class="img-fluid" src="<?= base_url('images/avatars/'.$value->photo) ?>">
                    </a>

      							<div class="card-body p-3">
      								<h3>
                        <a class="text-dark" href="<?= site_url('mentor/detail/'.$value->id_mentor.'/'.url_title($value->full_name,'-',true)) ?>">
                          <?= $value->full_name ?></h3>
                        </a>
      								<?= $value->resume ?>
      							</div>
      						</div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <div class="col-lg-12 text-center mt-5">
              <a class="btn btn-rounded btn-warning" href="#">Mentor Lainnya</a>
            </div>

          </div>

				</div>
			</div>
		</div>
	</section>
</div>
