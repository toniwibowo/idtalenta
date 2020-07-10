<div class="main d-flex" role="main">
  <section class="section section-cart my-5 border-0 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="entry-title">
            <h4>Ringkasan Belanja</h4>
          </div>

          <?php if ($numrows > 0): ?>
            <?php foreach ($cartItem->result() as $key => $value): ?>
              <div class="media mb-4">
                <img class="img-fluid rounded mx-4" width="20%" src="<?= base_url('assets/uploads/files/'.$value->poster) ?>" alt="">
                <div class="media-body">
                  <h4><?= $value->title ?></h4>
                  <?php if ($value->sale == 0): ?>
                    <h3 class="mb-0"><strong>Rp. <?= number_format($value->price,0,',','.') ?>,-</strong></h3>
                  <?php else: ?>
                    <h3 class="mb-0"><strong>Rp. <?= number_format($this->app->sale($value->price,$value->sale),0,',','.') ?>,-</strong></h3>
                  <?php endif; ?>

                </div>
                <a class="trash" href="<?= site_url('cart/delete/'.$value->cart_id.'/'.$value->product_id) ?>">
                  <i class="fa fa-trash"></i>
                </a>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>

        <div class="col-lg-4">
          <div class="featured-box featured-box-primary">
            <div class="box-content text-left p-3">
              <h4 class="text-dark">Ringkasan Belanja</h4>
              <div class="row my-5">
                <div class="col">
                  <p>Total Harga</p>
                </div>
                <div class="col text-right">
                  <h4 class="text-dark"><strong>Rp. <?= number_format($this->app->gettotalprice(),0,',','.') ?>,-</strong></h4>
                </div>
              </div>
              <div class="btn-action">
                <?php if ($this->ion_auth->logged_in()): ?>
                  <form class="" action="<?= site_url('checkout/docheckout') ?>" method="post" enctype="application/x-www-form-urlencoded">
                    <input type="hidden" name="sid" value="<?= $_COOKIE['cart'] ?>">
                    <button class="btn btn-rounded btn-outline btn-warning btn-block mb-2" type="submit">Beli(<?= isset($cartItem) ? $cartItem->num_rows() : $numrows ?>)</button>
                  </form>

                <?php else: ?>
                  <a class="btn btn-rounded btn-outline btn-warning btn-block mb-2" href="#" data-toggle="modal" data-target="#defaultModal">Beli(<?= $cartItem->num_rows() ?>)</a>
                <?php endif; ?>

                <a class="btn btn-rounded btn-outline btn-dark btn-block" href="<?= site_url('mentor') ?>">Lanjut Belanja</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
