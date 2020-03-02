<?php $row = $queryPost->row(); ?>
<section class="sec-top-articles">
	<div class="container">
		<div class="clearer">

			<nav aria-label="breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo site_url() ?>">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo site_url('page/view').'/'.$row->page_id.'/'.url_title($row->category_name,'-',true) ?>"><?php echo $row->category_name ?></a>
					</li>
					<li class="breadcrumb-item active">
						<?php echo $row->title ?>
					</li>
				</ul>
			</nav>

		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="title-post">
					<h1><?php echo $row->title ?></h1>
				</div>

				<img class="w-100 img-fluid mb-4" src="<?php echo base_url('assets/uploads/files/post').'/'.$row->img_small?>">

				<?php echo $row->description ?>

				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
						<?php if (count(unserialize($row->images)) > 0): ?>
							<?php foreach (unserialize($row->images) as $key => $pict): ?>
								<div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
						      <img class="d-block w-100 img-fluid" src="<?php echo base_url('assets/uploads/files/post').'/'.$pict?>" alt="<?php echo substr($pict,0,-4); ?>">
						    </div>
							<?php endforeach; ?>
						<?php endif; ?>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>

			</div>

			<div class="col-lg-4">
				<img class="img-fluid" src="<?php echo base_url()?>images/0.png"><br><br>
				<img class="img-fluid" src="<?php echo base_url()?>images/GFundingModel.png">
			</div>

		</div>
		</div>
	</div>
</section>

<?php include "new-newspost.php" ?>
