<?php $row = $queryOrder->row() ?>
<div class="main" role="main">
  <section class="section section-cart m-0 border-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="entry-title">
            <h4>Review Belanja</h4>
          </div>

          <?php if ($orderItem->num_rows() > 0): ?>
            <?php foreach ($orderItem->result() as $key => $value): ?>
              <div class="media mb-4">
                <img class="img-fluid rounded mr-4" width="20%" src="<?= base_url('assets/uploads/files/'.$value->poster) ?>" alt="">
                <div class="media-body">
                  <h4><?= $value->title ?></h4>
                  <?php if ($value->sale == 0): ?>
                    <h3 class="mb-0"><strong>Rp. <?= number_format($value->price,0,',','.') ?>,-</strong></h3>
                  <?php else: ?>
                    <h3 class="mb-0"><strong>Rp. <?= number_format($this->app->sale($value->price,$value->sale),0,',','.') ?>,-</strong></h3>
                  <?php endif; ?>

                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body p-3">
                  <h4>Data Customer</h4>
                  <table class="table table-striped">
                    <tr>
                      <td>Nama:</td>
                      <td><?= $user->full_name ?></td>
                    </tr>
                    <tr>
                      <td>Alamat:</td>
                      <td><?= $user->address ?></td>
                    </tr>
                  </table>

                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-4">
          <div class="featured-box featured-box-primary">
            <div class="box-content text-left p-3">
              <h4 class="text-dark">Jumlah yang harus dibayar:</h4>
              <div class="row my-5">
                <div class="col">
                  <p>Kode Unik</p>
                  <p>Total Harga</p>
                </div>
                <div class="col text-right">
                  <p>Rp. <?= number_format($row->uniq_code,0,',','.') ?>,-</p>
                  <?php $grandtotal = $row->total + $row->uniq_code ?>
                  <h4 class="text-dark"><strong>Rp. <?= number_format($grandtotal,0,',','.') ?>,-</strong></h4>
                </div>
              </div>
              <div class="btn-action">
                <a class="btn btn-rounded btn-outline btn-warning btn-block mb-2" href="<?= site_url('payment/'.base64_encode(bin2hex($row->sid))) ?>">Pembayaran</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
