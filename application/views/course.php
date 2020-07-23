<div class="main d-grid" role="main">
	<section class="page-header page-header-classic page-header-sm mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <h1 data-title-border>Course</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url(); ?>">Home</a></li>
            <li class="active">Course</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

	<section class="section section-course border-0 m-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<?php if ($list_video->num_rows() > 0): ?>
						<h3><?= $row['title'] ?></h3>
						<video
						id="my-video"
						class="video-js"
						controls preload="auto"
						>
							<!-- <source src	" type="video/mp4" /> -->
						</video>



					<?php endif; ?>

					<div class="content-body mt-4">
						<div class="tabs">
							<ul class="nav nav-tabs nav-justified flex-column flex-md-row">
								<li class="nav-item">
									<a class="nav-link text-center text-dark" href="#popular10" data-toggle="tab">Ikhtisar</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-center text-dark" href="#recent10" data-toggle="tab">Download Materi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-center text-dark" href="#review" data-toggle="tab">Review (<?= $queryReview->num_rows()  ?>)</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="popular10" class="tab-pane active">
									<?= $row['description'] ?>
								</div>
								<div id="recent10" class="tab-pane">
									<?php if ($list_materi->num_rows() > 0): ?>
										<table class="table">
											<thead>
												<tr>
													<th>Nama</th>
													<th>Deskripsi</th>
													<th class="text-center">Aksi</th>
												</tr>
												<tbody>
													<?php foreach ($list_materi->result() as $key => $cell): ?>
														<tr>
															<td><?= $cell->materi_name ?></td>
															<td><?= $cell->description ?></td>
															<td><a class="btn btn-primary btn-modern" href="#">Download</a></td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</thead>
										</table>
										<?php else: ?>
											<div class="alert alert-info" role="alert">
												<i class="fa fa-exclamation-triangle"></i> Materi kursus tidak di temukan.
											</div>
									<?php endif; ?>

								</div>
								<div id="review" class="tab-pane">
									<div class="review-wrapper">
											<h2><?= $queryReview->num_rows()  ?> <?= $queryReview->num_rows() > 1 ? 'Reviews' : 'Review' ?> for <?= $row['title'] ?></h2>

											<?php if ($queryReview->num_rows() > 0): ?>
												<?php foreach ($queryReview->result() as $key => $rev): ?>
													<div class="single-review">
															<div class="review-img">
																	<img src="assets/images/product-details/client-1.jpg" alt="">
															</div>
															<div class="review-content">
																	<div class="review-top-wrap">
																			<div class="review-name">
																					<h5><span><?= $rev->full_name ?> - </span></h5>
																			</div>

																			<div class="review-rating">
																				<?php $rating = floor($rev->star) ?>
																				<?php if ($rating > 0):

																					for ($i=0; $i < $rating ; $i++) {
																						echo '<i class="yellow fa fa-star"></i>';
																					}

																					if ($rating == 4) {
																						echo '<i class=" fa fa-star"></i>';
																					}elseif ($rating == 3) {
																						echo '<i class=" fa fa-star"></i>';
																						echo '<i class=" fa fa-star"></i>';
																					}elseif ($rating == 2) {
																						echo '<i class=" fa fa-star"></i>';
																						echo '<i class=" fa fa-star"></i>';
																						echo '<i class=" fa fa-star"></i>';
																					}elseif ($rating == 1) {
																						echo '<i class=" fa fa-star"></i>';
																						echo '<i class=" fa fa-star"></i>';
																						echo '<i class=" fa fa-star"></i>';
																						echo '<i class=" fa fa-star"></i>';
																					}else {
																						echo '';
																					}

																				?>

																				<?php endif; ?>

																			</div>
																	</div>
																	<?= $rev->description ?>
															</div>
													</div>
												<?php endforeach; ?>
											<?php endif; ?>

									</div>

									<div class="ratting-form-wrapper">
											<span>Add a Review</span>
											<p>Your email address will not be published. Required fields are marked <span>*</span></p>
											<div class="ratting-form">
													<form action="<?= site_url('mentor/review') ?>" id="submitReview" method="post" class="needs-validation" enctype="application/x-www-form-urlencoded">
															<div class="row">
																	<div class="col-lg-3 col-md-6">
																			<div class="rating-form-style mb-20">
																					<label>Name <span>*</span></label>
																					<input type="text" name="name" value="<?= $user->full_name  ?>">
																			</div>
																	</div>
																	<div class="col-lg-3 col-md-6">
																			<div class="rating-form-style mb-20">
																					<label>Email <span>*</span></label>
																					<input type="email" name="email" value="<?= $user->email  ?>">
																			</div>
																	</div>
																	<div class="col-lg-12">
																			<div class="star-box-wrap">
																					<div class="single-ratting-star">
																							<a href="#"><i class="fa fa-star"></i></a>
																					</div>
																					<div class="single-ratting-star">
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																					</div>
																					<div class="single-ratting-star">
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																					</div>
																					<div class="single-ratting-star">
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																					</div>
																					<div class="single-ratting-star">
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																							<a href="#"><i class="fa fa-star"></i></a>
																					</div>
																			</div>
																	</div>
																	<div class="col-md-12">
																			<div class="rating-form-style mb-20">
																					<label>Your review <span>*</span></label>
																					<textarea name="review"></textarea>
																			</div>
																	</div>
																	<div class="col-lg-12">
																			<div class="form-submit">
																					<input type="submit" value="Submit">
																					<input type="hidden" name="class_id" value="<?= $row['mentor_class_id'] ?>">
																					<input type="hidden" name="user_id" value="<?= $user->id ?>">
																					<input type="hidden" name="slug" value="<?= url_title($row['title'],'-',true) ?>">
																					<input type="hidden" name="star" value="0">
																			</div>
																	</div>
															</div>
													</form>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-3">
					<div class="card">
						<div class="card-header bg-dark text-white">
							Konten Kursus
							<i class="fa fa-times-circle float-right mt-1"></i>
						</div>
						<div class="list-group">
							<?php if ($list_video->num_rows() > 0): ?>
								<?php foreach ($list_video->result() as $key => $desc): ?>
									<a onclick="currentSlide(<?= $key + 1 ?>)" class="list-group-item list-group-item-action btn-indicator" data-video="<?= $desc->video ? $desc->video : $desc->youtube_link  ?>" href="#">Bagian <?= $key + 1 ?>: <?= $desc->description ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

</div>
