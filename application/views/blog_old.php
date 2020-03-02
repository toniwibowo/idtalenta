<?php include_once "include/header.php"; ?>
<content class="news">
	<section>
    	<div class="container">
        <div class="clearer cellpadding">

				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Blog</li>
				  </ol>
				</nav>

		    <div class="row">

					<div class="col-12 mb-4">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="<?php echo base_url('assets/uploads/files/4a792-slider-indosan-1.jpg') ?>" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="<?php echo base_url('assets/uploads/files/700c6-slide1.jpg') ?>" alt="Second slide">
								</div>
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



		    	<?php if($jlh>0): ?>

<?php foreach($query->result_array() as $r): ?>

	<?php
                        if($r['TypeSearch'] == 'Articles'){
                            $site= 'articles/detail';
                        }

                        if($r['TypeSearch'] == 'News'){
                            $site= 'news/detail';
                        }




                     ?>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<figure class="figure">
						  <img class="img-fluid" src="<?php echo base_url('assets/uploads/files/'.$r['Image']); ?>" alt="" style="margin-bottom:20px" width="868" height="640"/>
						  <figcaption class="figure-caption">
								<p> <?php $date = date('d/M/Y',strtotime($r['posting_date'])); ?>
              		<i class="fa fa-calendar"></i> <?php echo $date;  ?>
               	</p>

								<a class="title-post-lg" href="<?php echo site_url($site.'/'.$r['ID'].'/'.url_title($r['Title'])); ?>">
									<h3><?php echo $r['Title']; ?></h3>
								</a>
            <p class="post-blog-large-text"><?php echo strip_tags(substr($r['Resume'],0,80)); ?></p>

								<a class="btn btn-primary" href="<?php echo site_url($site.'/'.$r['ID'].'/'.url_title($r['Title'])); ?>">Read More</a>
							</figcaption>
						</figure>
					</div>

					<?php endforeach; ?>

<?php endif; ?>


		    </div>

				<div class="row">
					<div class="col-md-12 col-xs-12">
						<nav aria-label="Blog navigation">
							<?php echo $this->pagination->create_links(); ?>
						</nav>
					</div>
				</div>


			</div>
		</div>

	</section>
</content>
<?php include_once "include/footer.php"; ?>
