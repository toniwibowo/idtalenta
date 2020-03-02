
<section class="sec-top-articles">
	<div class="container">
		<div class="clearer">

			<nav aria-label="breadcrumb">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo site_url() ?>">Home</a>
					</li>
					<li class="breadcrumb-item active">
						<?php echo $row->title ?>
					</li>
				</ul>
			</nav>

		<div class="row">
			<div class="col-lg-8 col-12">
				<h1><?php echo $row->title ?></h1>
				<?php if ($row->img_small != ''): ?>
					<img class="pict-articles img-fluid mb-4" src="<?php echo base_url('assets/uploads/files/pages').'/'.$row->img_small?>">
				<?php endif; ?>

			    <?php echo $row->description ?>

			</div>

			<div class="col-lg-4">
				<div class="widget">
					<div class="card">
						<img class="img-fluid w-100 mb-4" src="<?php echo base_url()?>images/0.png">
					</div>
					<div class="card">
						<img class="img-fluid w-100" src="<?php echo base_url()?>images/GFundingModel.png">
					</div>
				</div>

			</div>

		</div>
		</div>
	</div>
</section>

<?php include "new-newspost.php" ?>
