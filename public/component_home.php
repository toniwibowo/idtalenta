<div class="row <?= url_title($value->category_product_name,'-',true) ?>">
  <div class="col-lg-6 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">
    <img class="img-fluid" src="<?= base_url('assets/uploads/files/').$value->big_image ?>" alt="<?= substr($value->big_image,0,-4) ?>">
  </div>
  <div class="col-lg-6 appear-animation" data-appear-animation="bounceInRight" data-appear-animation-delay="300" data-appear-animation-duration="1s">
    <h4 class="text-warning">Define Your Choice</h4>
    <h1><strong><?= $value->category_product_name ?></strong></h1>
    <?= $value->description ?>
    <div class="button-action">
      <a class="btn btn-dark btn-modern btn-rounded" href="<?= site_url('video/view/'.$value->category_product_id.'/'.url_title($value->category_product_name,'-',true)) ?>">VIDEO</a>
      <a class="btn btn-warning btn-modern btn-rounded" href="<?= site_url('mentor/view/'.$value->category_product_id.'/'.url_title($value->category_product_name,'-',true)) ?>">MENTOR</a>
    </div>
  </div>
</div>
