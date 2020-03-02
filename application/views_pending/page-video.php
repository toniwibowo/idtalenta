<section class="videos">
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
				<div class="col-lg-8 col-12">

					<?php if ($query->num_rows() > 0): ?>
						<?php foreach ($query->result() as $key => $row): ?>
							<?php if ($row->youtube_embed !=''): ?>
								<div class="card mb-5">
									<div class="embed-responsive embed-responsive-16by9">
									  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row->youtube_embed ?>?rel=0" allowfullscreen></iframe>
									</div>
									<div class="card-body">
										<h5 class="title-doc">VIDEO SLANK</h5>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>

				</div>

				<div class="col-lg-4 col-md-4">
					<div class="card mb-4">
						<img class="img-fluid w-100" src="<?php echo base_url()?>images/0.png">
					</div>
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo base_url()?>images/GFundingModel.png">
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
