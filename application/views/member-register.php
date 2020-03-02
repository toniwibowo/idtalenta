<div class="main" role="main">
  <section class="section section-register m-0 border-0">
    <div class="container">
      <div class="row no-gutters register-box">
        <div class="col"></div>
        <div class="col p-5">
          <?php if ($this->session->flashdata('validasi_email') == true): ?>
            <div class="alert alert-info" role="alert">
              Registrasi berhasil, silahkan validasi email anda sebelum login.
            </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('validate') == true): ?>
            <div class="alert alert-info" role="alert">
              Email berhasil divalidasi, silahkan login.
            </div>
          <?php endif; ?>

          <h4>Daftar ke <strong>ARTAdemi</strong></h4>
          <form class="" action="<?php echo base_url().'member/doregister' ?>" method="post">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <input class="form-control" type="text" name="firstname" value="<?= set_value('firstname')  ?>" placeholder="Nama Depan" required="required">
                <?php echo form_error('firstname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              </div>

              <div class="form-group col-lg-6">
                <input class="form-control" type="text" name="lastname" value="<?= set_value('lastname')  ?>" placeholder="Nama Belakang" required="required">
                <?php echo form_error('lastname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-lg-6">
                <input class="form-control" type="text" name="phone" value="<?= set_value('phone') ?>" placeholder="Phone" required="required">
                <?php echo form_error('phone', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              </div>

              <div class="form-group col-lg-6">
                <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email" required="required">
                <?php echo form_error('email', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-lg-6">
                <input class="form-control" type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password" required="required">
                <?php echo form_error('password', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              </div>

              <div class="form-group col-lg-6">
                <input class="form-control" type="password" name="cpassword" value="<?= set_value('cpassword') ?>" placeholder="Confirm Password" required="required">
                <?php echo form_error('cpassword', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="referal_code" value="" placeholder="Kode Refereal">
              <!--  -->
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type='checkbox' class="custom-control-input" name="terms" id="terms">
                <label class="custom-control-label" for="terms">Ya Saya ingin mendapatkan manfaat maksimal dari Artademi dengan email yang berisi penawaran eksklusif, rekomendasi pribadi, dan tips pembelanjaan</label>
              </div>

            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-warning btn-rounded btn-modern btn-block" name="">Daftar</button>
              <label class="text-center text-warning d-block" for="">Dengan mendaftar, anda menyetuji ketentuan penggunaan dan kebijakan privasi</label>
            </div>

            <div class="form-group">
              <center><label type='' class="text-justify" for="">Sudah Punya Akun ?</label></center>
              <button class="btn btn-info btn-rounded btn-modern btn-block" type="button" name="button" data-toggle="modal" data-target="#defaultModal">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
