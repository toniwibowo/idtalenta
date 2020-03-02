<?php $row = $queryPost->row(); ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>images/-slide1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<section class="detail-foto">
	<div class="container">
		<div class="clearer cellpadding">
			<div class="row">

        <?php if (count(unserialize($row->images)) > 0): ?>
          <?php $capt = json_decode($row->caption) ?>

          <?php foreach (unserialize($row->images) as $key => $pict): ?>

            <div class="col-lg-3 col-6">
              <div class="card">
                <a href="<?php echo base_url('assets/uploads/files/post').'/'.$pict; ?>" data-fancybox="images" data-caption="<?php echo $capt[$key] ?>">
      					 <img src="<?php echo base_url('assets/uploads/files/post').'/'.$pict; ?>" alt="" class="img-fluid">
                </a>
                <div class="card-body">
                  <?php if ($row->caption != ''): ?>
                    <h5>
                      <?php echo $capt[$key] ?>
                    </h5>
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

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/fancybox/dist/jquery.fancybox.css') ?>">
<script type="text/javascript" type="text/javascript" src="<?php echo base_url('assets/plugins/fancybox/dist/jquery.fancybox.js') ?>"></script>
