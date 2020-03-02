<div class="main" role="main">
	<section class="section section-intro section-parallax section-center m-0 p-0">
		<div class="owl-carousel owl-theme nav-inside" data-plugin-options="{'items': 1, 'margin': 0, 'loop': false, 'nav': true, 'dots': false}">
			<?php if ($querySlider->num_rows() > 0): ?>
				<?php foreach ($querySlider->result() as $key => $sl): ?>
					<div>
						<div class="parallax" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url('images/intro-1.jpg') ?>">
							<div class="container">
								<div class="row row-middle align-items-center">
									<div class="col-lg-6 text-left appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="1000" data-appear-animation-duration="1s">
										<h2 class="text-white">
											<strong>
												Become Exceptional.<br>
												Color Outside the Lines.<br>
												Redefine the Possible.
											</strong>
										</h2>

										<a class="btn btn-rounded btn-warning btn-modern" href="#">Daftar Kelas</a>

									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>


			<div>
				<div class="parallax" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url('images/intro-1.jpg') ?>">
					<div class="container">
						<div class="row row-middle align-items-center">
							<div class="col-lg-6 text-left appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="1000" data-appear-animation-duration="1s">
								<h2 class="text-white">
									<strong>
										Become Exceptional.<br>
										Color Outside the Lines.<br>
										Redefine the Possible.
									</strong>
								</h2>

								<a class="btn btn-rounded btn-warning btn-modern" href="#">Daftar Kelas</a>

							</div>
						</div>
					</div>
				</div>
			</div>

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
					<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/graphic-design.png') ?>">
								<h5 class="mb-0">Graphic Design</h5>
							</div>
						</div>

						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/illustrator.png') ?>">
								<h5 class="mb-0">Illustrator</h5>
							</div>
						</div>

						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/craft.png') ?>">
								<h5 class="mb-0">Craft</h5>
							</div>
						</div>

						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/make-up.png') ?>">
								<h5 class="mb-0">Make Up</h5>
							</div>
						</div>

						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/photography.png') ?>">
								<h5 class="mb-0">Photography</h5>
							</div>
						</div>

						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/fashion.png') ?>">
								<h5 class="mb-0">Fashion</h5>
							</div>
						</div>

						<div class="card">
							<div class="card-body p-2 text-center">
								<img alt="" class="img-fluid mb-2" src="<?= base_url('images/spriters/graphic-design.png') ?>">
								<h5 class="mb-0">Graphic Design</h5>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="row my-5">
				<div class="col-lg-6 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">
					<img class="img-fluid" src="<?= base_url('images/graphic-design-1.png') ?>" alt="">
				</div>
				<div class="col-lg-6 appear-animation" data-appear-animation="bounceInRight" data-appear-animation-delay="300" data-appear-animation-duration="1s">
					<h4 class="text-warning">Define Your Choice</h4>
					<h1><strong>Graphic Design</strong></h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
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
						<div class="card">
							<img alt="" class="img-fluid" src="<?= base_url('images/mentor/ade-surya.jpg') ?>">
							<div class="card-body p-3">
								<h3>Ade Surya</h3>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>

						<div class="card">
							<img alt="" class="img-fluid" src="<?= base_url('images/mentor/darwis-triadi.jpg') ?>">
							<div class="card-body p-3">
								<h3>Darwis Triadi</h3>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>

						<div class="card">
							<img alt="" class="img-fluid" src="<?= base_url('images/mentor/peggy-hartanto.jpg') ?>">
							<div class="card-body p-3">
								<h3>Peggy Hartanto</h3>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>

						<div class="card">
							<img alt="" class="img-fluid" src="<?= base_url('images/mentor/ade-surya.jpg') ?>">
							<div class="card-body p-3">
								<h3>Ade Surya</h3>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-videos border-0 m-0 bg-warning">
		<div class="container" style="overflow:hidden">
			<div class="row justify-content-center">
				<div class="col-lg-3 text-center">
					<div class="heading text-primary heading-border heading-bottom-border">
						<h1><strong class="font-weight-extra-bold">VIDEO</strong></h1>
					</div>
				</div>
			</div>

			<div class="row mt-4 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">
				<div class="col-lg-4">
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
							How to Make a Clay Pot by Wheel: 14 Steps
						</a>
					</h4>
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
							High-Low Collaborations Democratised Fashion. But What Did They Do For the Designers?
						</a>
					</h4>
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
				<div class="col-lg-4">
					<div class="card">
						<img class="img-fluid" src="<?= base_url('images/blog/blog-1.jpg') ?>" alt="">
						<div class="card-body p-3">
							<h5>
								<a class="text-dark" href="#">What Are the Seven Elements of Art and How Do They Work Together?</a>
							</h5>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra justo nec sem vulputate tempor. Sed congue, ipsum ut ullamcorper efficitur, urna erat finibus ex...
							</p>
							<p class="mb-0 text-center">
								<a class="btn btn-rounded btn-warning btn-modern" href="#"><strong>Lanjut</strong></a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card">
						<img class="img-fluid" src="<?= base_url('images/blog/blog-2.jpg') ?>" alt="">
						<div class="card-body p-3">
							<h5>
								<a class="text-dark" href="#">What Are the Seven Elements of Art and How Do They Work Together?</a>
							</h5>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra justo nec sem vulputate tempor. Sed congue, ipsum ut ullamcorper efficitur, urna erat finibus ex...
							</p>
							<p class="mb-0 text-center">
								<a class="btn btn-rounded btn-warning btn-modern" href="#"><strong>Lanjut</strong></a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card">
						<img class="img-fluid" src="<?= base_url('images/blog/blog-3.jpg') ?>" alt="">
						<div class="card-body p-3">
							<h5>
								<a class="text-dark" href="#">What Are the Seven Elements of Art and How Do They Work Together?</a>
							</h5>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra justo nec sem vulputate tempor. Sed congue, ipsum ut ullamcorper efficitur, urna erat finibus ex...
							</p>
							<p class="mb-0 text-center">
								<a class="btn btn-rounded btn-warning btn-modern" href="#"><strong>Lanjut</strong></a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col text-center">
					<a class="btn btn-rounded btn-warning btn-modern text-dark" href="#"><strong>Artikel Lainnya</strong></a>
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
						<div>
							<img alt="" class="img-fluid mb-2" src="<?= base_url('images/partner/wacom.png') ?>">
						</div>

						<div>
							<img alt="" class="img-fluid mb-2" src="<?= base_url('images/partner/intel.png') ?>">
						</div>

						<div>
							<img alt="" class="img-fluid mb-2" src="<?= base_url('images/partner/canon.png') ?>">
						</div>

						<div>
							<img alt="" class="img-fluid mb-2" src="<?= base_url('images/partner/nikon.png') ?>">
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

</div>
