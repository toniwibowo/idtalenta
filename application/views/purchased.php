<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <h1 data-title-border>Purchased</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url(); ?>">Home</a></li>
            <li class="active">purchased</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-purchased border-0 m-0">
    <div class="container">
      <div class="row">
        <?php if ($getOrder->num_rows() > 0): ?>
          <?php foreach ($getOrder->result() as $key => $value): ?>

            <?php $listItem = $this->db->where('order_id', $value->order_id)->from('order_item')->join('mentor_class','mentor_class.mentor_class_id=order_item.product_id')->get(); ?>

            <?php if ($listItem->num_rows() > 0): ?>
              <?php foreach ($listItem->result() as $key => $list): ?>
                <div class="col-lg-4 mb-4">
    							<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
    								<span class="thumb-info-wrapper">
    									<div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$list->poster) ?>')">

    									</div>
    									<!-- <img src="" class="img-fluid" alt="<?= substr($list->poster,0,-4) ?>"> -->
    									<span class="thumb-info-action">
    										<a href="<?= site_url('course/lecture/'.$value->sid.'/'.$list->mentor_class_id.'/'.url_title($list->title,'-',true)) ?>">
    											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
    										</a>
    									</span>
    								</span>
    							</span>
    							<h4 class="mt-2 text-center text-3">
    								<a class="text-dark" href="<?= site_url('course/lecture/'.$value->sid.'/'.$list->mentor_class_id.'/'.url_title($list->title,'-',true)) ?>">
    									<?= $list->title ?>
    								</a>
    							</h4>

    							<div class="button-action">
    								<div class="row">
    									<div class="col">
    										<a class="btn btn-danger btn-rounded btn-outline btn-block" href="<?= site_url('course/lecture/'.$value->sid.'/'.$list->mentor_class_id.'/'.url_title($list->title,'-',true)) ?>">Buka Kursus</a>
    									</div>

    								</div>

    							</div>
    						</div>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>





</div>
