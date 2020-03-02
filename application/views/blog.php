<div class="main" role="main">
	<section class="section section-blog border-0 m-0">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">BLOG</strong></h1>
					</div>
				</div>
			</div>

			<div class="row mt-4 appear-animation" data-appear-animation="bounceInRight" data-appear-animation-delay="300" data-appear-animation-duration="1s">

				<?php if ($query->num_rows() > 0): ?>
					<?php foreach ($query->result() as $key => $row): ?>
						<div class="col-lg-4">
							<div class="card mb-4">
								<img class="img-fluid" src="<?= base_url('assets/uploads/blogs/'.$row->image_small) ?>" alt="<?= substr($row->image_small,0,-4) ?>">
								<div class="card-body p-3">
									<h5>
										<a class="text-dark" href="<?= site_url('blog/detail/'.$row->articles_id.'/'.url_title($row->title,'-',true)) ?>"><?= $row->title ?></a>
									</h5>
									<?= $row->resume ?>
									<p class="mb-0 text-center">
										<a class="btn btn-rounded btn-warning btn-modern" href="<?= site_url('blog/detail/'.$row->articles_id.'/'.url_title($row->title,'-',true)) ?>"><strong>Lanjut</strong></a>
									</p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

			</div>

			<div class="row mt-4">
				<div class="col text-center">
					<!-- <a class="btn btn-rounded btn-warning btn-modern text-dark" href="#"><strong>Artikel Lainnya</strong></a> -->
					<?= $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</section>
</div>
