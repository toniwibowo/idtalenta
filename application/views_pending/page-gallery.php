<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>images/-slide1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<section class="sec-pustaka">
	<div class="container">
		<div class="clearer">
			<nav aria-label="breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo site_url() ?>">Home</a>
					</li>
					<li class="breadcrumb-item active">
						<?php echo $page->category_name; ?>
					</li>
				</ul>
			</nav>

			<div class="row">
				<?php if ($query->num_rows() > 0): ?>
					<?php foreach ($query->result() as $key => $row): ?>
						<div class="col-lg-4 col-12">
							<div class="card mb-4">
								<img class="pict-pustaka img-fluid" src="<?php echo base_url('assets/uploads/files/post').'/'.$row->img_small ;?>">
								<div class="card-body">
									<h5 class="title-doc">
										<a href="<?php echo site_url(strtolower($page->category_name).'/detail').'/'.$row->post_id.'/'.url_title($row->title,'-',true) ?>"><?php echo $row->title ?></a>
									</h5>
									<p><?php echo strip_tags($row->resume) ?></p>
									<a class="btn btn-info btn-see" href="<?php echo site_url(strtolower($page->category_name).'/detail').'/'.$row->post_id.'/'.url_title($row->title,'-',true) ?>">LIHAT</a>
									<?php if ($row->download == 'Yes'): ?>
										<a href="#!" class="btn btn-warning btn-dwonload">UNDUH</a>
									<?php endif; ?>

								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
