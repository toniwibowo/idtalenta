<div class="main" role="main">
	<section class="section section-intro section-parallax section-center m-0 p-0">
		<div class="owl-carousel owl-theme nav-inside" data-plugin-options="{'items': 1, 'margin': 0, 'loop': false, 'nav': true, 'dots': false}">
			<?php if ($querySlider->num_rows() > 0): ?>
				<?php foreach ($querySlider->result() as $key => $sl): ?>
					<div>
						<div class="parallax" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url('assets/uploads/sliders/'.$sl->file_image) ?>">
							<div class="container">
								<div class="row row-middle align-items-center">
									<div class="col-lg-6 text-left appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="1000" data-appear-animation-duration="1s">
										<h2 class="text-white">
											<strong>
												<?= $sl->caption ?>
											</strong>
										</h2>

										<?php $link = $sl->link == '' ? '#' : $sl->link; ?>

										<?php if ($sl->target == '' || $sl->target == 'SAME BROWSER'): ?>
											<!-- <a class="btn btn-rounded btn-warning btn-modern" href="<?= $link ?>">Daftar Kelas</a> -->
										<?php else: ?>
											<!-- <a target="_blank" class="btn btn-rounded btn-warning btn-modern" href="<?= $link ?>">Daftar Kelas</a> -->
										<?php endif; ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>

	</section>

	<section class="section section-service border-0 m-0" style="overflow:hidden">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1> <strong class="font-weight-extra-bold">KATEGORI</strong></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col appear-animation" data-appear-animation="bounceInDown" data-appear-animation-delay="300" data-appear-animation-duration="1s">

					<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">

						<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
							<?php if ($queryCategory->num_rows() > 0): ?>
								<?php foreach ($queryCategory->result() as $key => $row): ?>
									<li class="card nav-item active" data-option-value=".<?= url_title($row->category_product_name,'-',true) ?>">
										<a href="#">
											<div class="card-body p-2 text-center">
												<img alt="" class="img-fluid mb-2" src="<?= base_url('assets/uploads/files/'.$row->icon) ?>">
												<h5 class="mb-0"><?= $row->category_product_name ?></h5>
											</div>
										</a>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>

						</div>

					</ul>

				</div>
			</div>

			<div class="sort-destination-loader sort-destination-loader-showing">
				<div class="row my-5 portfolio-list sort-destination" data-sort-id="portfolio">



						<?php if ($queryCategory->num_rows() > 0): ?>
							<?php foreach ($queryCategory->result() as $key => $value): ?>

								<div class="col-12 isotope-item <?= url_title($value->category_product_name,'-',true) ?>">

								<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 4, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">

									<?php $videoCategory = $this->db->where('approve',1)->where('mentor_class.category_product_id', $value->category_product_id)->from('mentor_class')->join('category_product','category_product.category_product_id=mentor_class.category_product_id')->get(); ?>

									<?php if ($videoCategory->num_rows() > 0): ?>
										<?php foreach ($videoCategory->result() as $key => $vid): ?>
											<div class="<?= url_title($vid->category_product_name,'-',true) ?>">
												<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
													<span class="thumb-info-wrapper">
														<div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$vid->poster) ?>')">

														</div>
														<!-- <img src="" class="img-fluid" alt="<?= substr($vid->poster,0,-4) ?>"> -->
														<span class="thumb-info-action">
															<a href="<?= site_url('video/detail/'.$vid->mentor_class_id.'/'.url_title($vid->title,'-',true)) ?>">
																<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
															</a>
														</span>
													</span>
												</span>
												<h4 class="mt-2 text-center mb-0 text-3">
													<a class="text-dark" href="<?= site_url('video/detail/'.$vid->mentor_class_id.'/'.url_title($vid->title,'-',true)) ?>">
														<?= $vid->title ?>
													</a>
												</h4>

												<?php $mentor = $this->ion_auth->user($vid->user_id)->row(); ?>
												<p class="text-center mb-2"><small class="text-2">Mentor: <?= $mentor->full_name ?></small></p>

												<?php if ($vid->sale != 0): ?>
					                <h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($vid->price,$vid->sale),0,',','.')  ?>,-</strong></h3>
					                <h5 class="text-center"><del>Rp. <?= number_format($vid->price,0,',','.')  ?>,- </del></h5>
					              <?php else: ?>
					                <h3 class="text-center"><strong>Rp. <?= number_format($vid->price,0,',','.')  ?>,-</strong></h3>
					              <?php endif; ?>

												<div class="button-action">
													<div class="row">
														<div class="col">
															<a class="btn btn-warning btn-rounded btn-outline btn-block" href="<?= site_url('video/detail/'.$vid->mentor_class_id.'/'.url_title($vid->title,'-',true)) ?>">Video Detail</a>
														</div>
														<div class="col">
															<form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
						                    <input type="hidden" name="product_id" value="<?= $vid->mentor_class_id ?>">
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

							<?php endforeach; ?>
						<?php endif; ?>






				</div>
			</div>


		</div>
	</section>

	<section class="section section-videos border-0 m-0 bg-warning">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">PROMO</strong></h1>
					</div>
				</div>
			</div>

			<div class="row mt-4 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">

				<?php if ($queryPromo->num_rows() > 0): ?>
					<?php foreach ($queryPromo->result() as $key => $promo): ?>
						<div class="col-lg-4 mb-4">
							<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
								<span class="thumb-info-wrapper">
									<div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$promo->poster) ?>')">

									</div>
									<!-- <img src="" class="img-fluid" alt="<?= substr($promo->poster,0,-4) ?>"> -->
									<span class="thumb-info-action">
										<a href="<?= site_url('video/detail/'.$promo->mentor_class_id.'/'.url_title($promo->title,'-',true)) ?>">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
							<h4 class="mt-2 text-center text-3 mb-0">
								<a class="text-dark" href="<?= site_url('video/detail/'.$promo->mentor_class_id.'/'.url_title($promo->title,'-',true)) ?>">
									<?= $promo->title ?>
								</a>
							</h4>

							<?php $mentor = $this->ion_auth->user($promo->user_id)->row(); ?>
							<p class="text-center mb-2"><small class="text-2">Mentor: <?= $mentor->full_name ?></small></p>

							<?php if ($promo->sale != 0): ?>
								<h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($promo->price,$promo->sale),0,',','.')  ?>,-</strong></h3>
								<h5 class="text-center"><del>Rp. <?= number_format($promo->price,0,',','.')  ?>,- </del></h5>
							<?php else: ?>
								<h3 class="text-center"><strong>Rp. <?= number_format($promo->price,0,',','.')  ?>,-</strong></h3>
							<?php endif; ?>

							<div class="button-action">
								<div class="row">
									<div class="col">
										<a class="btn btn-danger btn-rounded btn-outline btn-block" href="<?= site_url('video/detail/'.$promo->mentor_class_id.'/'.url_title($promo->title,'-',true)) ?>">Video Detail</a>
									</div>
									<div class="col">
										<form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
											<input type="hidden" name="product_id" value="<?= $promo->mentor_class_id ?>">
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

	<section class="section section-mentor border-0 m-0 bg-dark">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1 class="text-white"><strong class="font-weight-extra-bold">MENTOR</strong></h1>
					</div>
				</div>
			</div>

			<div class="row my-5">
				<div class="col appear-animation" data-appear-animation="bounceInUp" data-appear-animation-delay="300" data-appear-animation-duration="1s">
					<div class="owl-carousel owl-theme nav-inside" data-plugin-options="{'items': 3, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">

						<?php if ($queryMentor->num_rows() > 0): ?>
							<?php foreach ($queryMentor->result() as $key => $value): ?>
								<div class="card">
									<a href="<?= site_url('mentor/detail/'.$value->id_mentor.'/'.url_title($value->full_name,'-',true)) ?>" style="background-image:url('<?= $value->photo != '' ? base_url('images/avatars/'.$value->photo) : base_url('images/avatars/avatar.jpg') ?>')">

									</a>

									<div class="card-body p-3">
										<h3>
											<a class="text-dark" href="<?= site_url('mentor/detail/'.$value->id_mentor.'/'.url_title($value->full_name,'-',true)) ?>">
												<?= $value->full_name ?>
											</a>
										</h3>
										<?= $value->resume ?>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

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
				<?php if ($queryArticles->num_rows() > 0): ?>
					<?php foreach ($queryArticles->result() as $key => $art): ?>
						<div class="col-lg-4">
							<div class="card">
								<img class="img-fluid" src="<?= base_url('assets/uploads/blogs/'.$art->image_small) ?>" alt="">
								<div class="card-body p-3">
									<h4>
										<a class="text-dark" href="<?= site_url('blog/detail/'.$art->articles_id.'/'.url_title($art->title,'-',true)) ?>"><?= $art->title ?></a>
									</h4>
									<?= $art->resume ?>
									<p class="mb-0 text-center">
										<a class="btn btn-rounded btn-warning btn-modern" href="<?= site_url('blog/detail/'.$art->articles_id.'/'.url_title($art->title,'-',true)) ?>"><strong>Lanjut</strong></a>
									</p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

			</div>

			<div class="row mt-4">
				<div class="col text-center">
					<a class="btn btn-rounded btn-warning btn-modern text-dark" href="<?= site_url('blog/view') ?>"><strong>Artikel Lainnya</strong></a>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-partner border-0 m-0 bg-dark">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1 class="text-white"><strong class="font-weight-extra-bold">REKANAN</strong></h1>
					</div>
				</div>
			</div>

			<div class="row mt-4 appear-animation" data-appear-animation="bounceInDown" data-appear-animation-delay="300" data-appear-animation-duration="1s">
				<div class="col">
					<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 4, 'margin': 10, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">
						<?php if ($queryPartners->num_rows() > 0): ?>
							<?php foreach ($queryPartners->result() as $key => $part): ?>
								<div>
									<img alt="" class="img-fluid mb-2" src="<?= base_url('assets/uploads/files/'.$part->logo) ?>">
								</div>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

</div>
