<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">Payment</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Payment</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="featured-box featured-box-primary">
          <div class="box-content">
            <h4>PAYMENT AMMOUNT</h4>
            <?php $grandtotal = $payment->total + $payment->uniq_code; ?>
            <h2 class="mb-0"><strong>Rp. <?= number_format($grandtotal,0,',','.') ?></strong></h2>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="featured-box featured-box-primary">
          <div class="box-content text-left">
            <h4>PAYMENT METHOD</h4>
            <div class="row">

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <img class="img-fluid" src="<?= base_url('images/bank/bca.png') ?>" alt="">
                    <h4><strong>BCA</strong></h4>
                    <p>145-00-131-855-21 <br> PT. ARTAdemi Pendidikan Nusantara</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <img class="img-fluid" src="<?= base_url('images/bank/mandiri.png') ?>" alt="">
                    <h4><strong>Mandiri</strong></h4>
                    <p>145-00-131-855-21 <br> PT. ARTAdemi Pendidikan Nusantara</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <img class="img-fluid" src="<?= base_url('images/bank/bni.png') ?>" alt="">
                    <h4><strong>BNI</strong></h4>
                    <p>145-00-131-855-21 <br> PT. ARTAdemi Pendidikan Nusantara</p>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="heading text-primary heading-border heading-bottom-border">
          <h3>PAYMENT CONFIRMATION</h3>
        </div>

        <?php $user = $this->ion_auth->user()->row() ?>

        <?php if ($this->session->flashdata('confirmation')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Konfirmasi Berhasil</strong>, order anda akan segera kami proses.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>


        <form action="<?= site_url('checkout/confirmation')  ?>" method="post" enctype="application/x-www-form-urlencoded">
          <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" value="<?= $user->email ?>" readonly>
              <input type="hidden" class="form-control" name="user_id" value="<?= $user->id ?>" >
              <input type="hidden" class="form-control" name="sid" value="<?= $sid ?>" >
            </div>

            <div class="form-group col-lg-6">
              <label for="">No. Invoice</label>
              <input type="text" class="form-control" name="invoice" value="<?= set_value('invoice')  ?>">
              <?php echo form_error('invoice', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
            </div>

            <div class="form-group col-lg-4 d-none">
              <label for="">No. Rekening Pengirim</label>
              <input type="text" class="form-control" name="bank-account" value="<?= set_value('bank-account')  ?>">
              <?php echo form_error('bank-account', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
            </div>

            <div class="form-group col-lg-6 d-none">
              <label for="">Bank Dari</label>
              <input type="text" class="form-control" name="bankfrom" value="<?= set_value('bankfrom')  ?>">
              <?php echo form_error('bankfrom', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
            </div>

            <div class="form-group col-lg-6 d-none">
              <label for="">Bank Tujuan</label>
              <input type="text" class="form-control" name="bankto" value="<?= set_value('bankto')  ?>">
              <?php echo form_error('bankto', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
            </div>

            <div class="form-group col-lg-6">
              <label for="">Jumlah Transfer</label>
              <input type="text" class="form-control" name="ammount" value="<?= set_value('ammount')  ?>">
              <?php echo form_error('ammount', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
            </div>

            <div class="form-group col-lg-6">
              <label for="">Tgl. Transfer</label>
              <input type="date" class="form-control" name="transfer-date" value="<?= set_value('transfer-date')  ?>">
              <?php echo form_error('transfer-date', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
            </div>

            <div class="form-group col-lg-6">
              <label for=""></label>
              <button type="submit" class="btn btn-modern btn-primary text-dark" name="button">SUBMIT</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

</div>
