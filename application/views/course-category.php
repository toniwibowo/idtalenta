<div class="product-area section-padding-1 pt-130 pb-125">
    <div class="container-fluid">
        <div class="section-title-12 text-center mb-65">
            <h2><?= $category_title ?></h2>
            <p>Class aptent taciti sociosqu ad litora torquent per con</p>
        </div>
        <div class="row">

          <?php if ($queryCategory->num_rows() > 0): ?>
            <?php foreach ($queryCategory->result() as $key => $value): ?>
              <div class="custom-col-5">
                  <div class="product-wrap mb-50">
                      <div class="product-img default-overlay mb-25">
                          <a href="<?= site_url('course/'.$value->mentor_class_id.'/'.url_title($value->title,'-',true)) ?>">
                              <img class="default-img" src="<?= base_url('assets/uploads/files/'.$value->poster) ?>" alt="">
                          </a>
                          <div class="product-action product-action-sky product-action-position-1">
                              <!-- <a data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-eye"></i><span>Quick Shop</span></a> -->
                              <a href="<?= site_url('course/'.$value->mentor_class_id.'/'.url_title($value->title,'-',true)) ?>"><i class="fa fa-eye"></i><span>Quick Shop</span></a>
                              <a title="Add to Wishlist" href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a>
                              <!--<a class="icon-blod" title="Add to Compare" href="#"><i class="dlicon arrows-4_compare"></i><span>Add to Compare</span></a>-->
                              <a id="addtocart" data-product="<?= $value->mentor_class_id ?>" title="Add to Cart" href="#"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></a>
                          </div>
                      </div>
                      <div class="product-content-4 product-content-sky title-font-width-400 text-center">
                          <h3><a href="<?= site_url('course/'.$value->mentor_class_id.'/'.url_title($value->title,'-',true)) ?>"><?= $value->title ?></a></h3>
                          <div class="product-price product-price-red">
                            <?php if ($value->sale != 0): ?>
                              <span class="new-price">Rp. <?= number_format($this->app->sale($value->price,$value->sale),0,',','.')  ?>,-</span>
                              <?php else: ?>
                              <span class="new-price">Rp. <?= number_format($value->price,0,',','.')  ?>,-</span>
                            <?php endif; ?>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>
        <div class="pro-view-all-3 text-center">
            <a href="#">View all product</a>
        </div>
    </div>
</div>
