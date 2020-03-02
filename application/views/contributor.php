<div class="main" role="main">
  <section class="section section-register m-0 border-0">
    <div class="container">
      <div class="row no-gutters register-box">
        <div class="col"></div>
        <div class="col p-5">
          <h4>Menjadi <strong>Contributor</strong></h4>
          <form class="" action="<?php echo base_url().'member/register_act' ?>" method="post">
            <div class="form-group">
              <input class="form-control" type="text" name="nama" value="" placeholder="Nama Kelas" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <?php echo form_error('nama'); ?>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="email" value="" placeholder="Category Kelas" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <?php echo form_error('email'); ?>
            </div>
            <div class="form-group">
              <textarea class="form-control" type="txtar" name="password" value="" placeholder="Profile Mentor" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
              <?php echo form_error('password'); ?>
            </div>
            <div class="form-group">
              
              <label>Upload Photo</label>
            
              <input class="form-control" type="file" name="kode_ref" value="Upload Photo" placeholder="" accept="image/*" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <!--  -->
            </div>
            <div class="form-group">
             <textarea class="form-control" type="text" name="kode_ref" value="" placeholder="Alamat" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea> 
              <!--  -->
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="kode_ref" value="" placeholder="No Rekening" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <!--  -->
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="kode_ref" value="" placeholder="Bank Rekening" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <!--  -->
            </div>
            <div class="form-group">
              
              <button type="submit" class="btn btn-warning btn-rounded btn-modern btn-block" type="button" name="">Daftar</button>
              <!-- <label class="text-center text-warning d-block" for="">Dengan mendaftar, anda menyetuji ketentuan penggunaan dan kebijakan privasi</label> 
               <label class="text-center text-warning d-block" for=""> Sudah punya akun ?<a href="daftar.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-1-30">Login</label>  -->
            </div>
          </form>
          <form action="<?php echo base_url().'home' ?>" method="post" enctype="multipart/form-data">
        </div>
      </div>
    </div>
  </section>
</div> 
