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
						<video id="my-video" class="video-js" controls preload="auto" >
							<!-- <source src	" type="video/mp4" /> -->
						</video>
					<?php endif; ?>

					<div class="content-body mt-5">
						<div class="tabs">
							<ul class="nav nav-tabs nav-justified flex-column flex-md-row">
								<li class="nav-item active">
									<a class="nav-link text-center text-dark" href="#popular10" data-toggle="tab">Ikhtisar</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-center text-dark" href="#recent10" data-toggle="tab">Download Materi</a>
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
									<a onclick="currentSlide(<?= $key + 1 ?>)" class="list-group-item list-group-item-action btn-indicator" data-video="<?= $desc->video ?>" href="#">Bagian <?= $key + 1 ?>: <?= $desc->description ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

</div>
