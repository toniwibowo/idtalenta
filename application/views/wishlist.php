<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <h1 data-title-border>Wishlist</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url(); ?>">Home</a></li>
            <li class="active">Wishlist</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-purchased border-0 m-0">
    <div class="container">
      <div class="row">
        <?php if ($queryWishlist->num_rows() > 0): ?>
          <?php foreach ($queryWishlist->result() as $key => $value): ?>

            <?php $listItem = $this->db->where('wishlist.mentor_class_id', $value->mentor_class_id)->from('wishlist')->join('mentor_class','mentor_class.mentor_class_id=wishlist.mentor_class_id')->get(); ?>

            <?php if ($listItem->num_rows() > 0): ?>
              <?php foreach ($listItem->result() as $key => $list): ?>
                <div class="col-lg-4 mb-4">
    							<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
    								<span class="thumb-info-wrapper">
    									<div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$list->poster) ?>')">

    									</div>
    									<!-- <img src="" class="img-fluid" alt="<?= substr($list->poster,0,-4) ?>"> -->
    									<span class="thumb-info-action">
    										<a href="<?= site_url('video/detail/'.$list->mentor_class_id.'/'.url_title($list->title,'-',true)) ?>">
    											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
    										</a>
    									</span>
    								</span>
    							</span>
    							<h4 class="mt-2 text-center text-3">
    								<a class="text-dark" href="<?= site_url('video/detail/'.$list->mentor_class_id.'/'.url_title($list->title,'-',true)) ?>">
    									<?= $list->title ?>
    								</a>
    							</h4>

                  <?php if ($list->sale != 0): ?>
    								<h3 class="text-center mb-1"><strong>Rp. <?= number_format($this->app->sale($list->price,$list->sale),0,',','.')  ?>,-</strong></h3>
    								<h5 class="text-center"><del>Rp. <?= number_format($list->price,0,',','.')  ?>,- </del></h5>
    							<?php else: ?>
    								<h3 class="text-center"><strong>Rp. <?= number_format($list->price,0,',','.')  ?>,-</strong></h3>
    							<?php endif; ?>

    							<div class="button-action">
    								<div class="row">
    									<div class="col">
    										<a class="btn btn-danger btn-rounded btn-outline btn-block" href="<?= site_url('video/detail/'.$list->mentor_class_id.'/'.url_title($list->title,'-',true)) ?>">Video Detail</a>
    									</div>
    									<div class="col">
    										<form class="" action="<?= site_url('cart/addtocart') ?>" method="post" enctype="application/x-www-form-urlencoded">
    											<input type="hidden" name="product_id" value="<?= $list->mentor_class_id ?>">
    											<input type="hidden" name="qty" value="1">
    											<button type="submit" name="button" class="btn btn-outline btn-rounded btn-dark btn-block">Buy</button>
    										</form>
    									</div>
    								</div>

    							</div>
    						</div>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col">
            <div class="alert alert-info" role="alert">
              You don't have product wishlist.
            </div>
          </div>          
        <?php endif; ?>
      </div>
    </div>
  </section>

</div>
