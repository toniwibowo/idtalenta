<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">Mentor</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Mentor Profile</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-2">

    <?php $user = $this->ion_auth->user()->row(); ?>
    <?php $row = $mentor->row_array() ?>
    <?php if ($row['subcategory_class_id'] != 0): ?>
      <?php $submentor = $this->db->where('subcategory_class_id', $row['subcategory_class_id'])->from('mentor')->join('subcategory_product','subcategory_product.subcategory_product_id = mentor.subcategory_class_id')->get(); ?>
    <?php endif; ?>

		<?php $queryProvince = $this->member->province() ?>
    <?php $city = $this->member->state('', $row['province_id']) ?>

    <div class="row">
      <div class="col-lg-3 mt-4 mt-lg-0">

        <div class="d-flex justify-content-center mb-4">
          <div class="profile-image-outer-container">
            <div class="profile-image-inner-container bg-color-primary">
              <?php if ($user->photo != ''): ?>
                  <img src="<?= base_url('images/avatars').'/'.$user->photo ?>">
                <?php else: ?>
                  <img src="<?= base_url() ?>images/avatars/avatar.jpg">
              <?php endif; ?>

              <span class="profile-image-button bg-color-dark">
                <i class="fas fa-camera text-light"></i>
              </span>
            </div>
						<form id="uploadPhoto" action="" method="post" enctype="multipart/form-data">
							<input type="file" id="file" name="photo" class="profile-image-input">
							<input type="hidden" name="user_id" value="<?= $user->id  ?>">
						</form>
          </div>
        </div>

        <aside class="sidebar mt-2 d-none" id="sidebar">
          <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item"><a class="nav-link text-dark active" href="#">My Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="#">User Preferences</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Billing</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Invoices</a></li>
          </ul>
        </aside>

      </div>
      <div class="col-lg-9">

        <?php if ($this->session->flashdata('updatementorprofile') == true): ?>
          <div class="alert alert-info" role="alert">
            Update sukses, halaman profil mentor sudah terupdate.
          </div>
        <?php endif; ?>

        <div class="overflow-hidden mb-1">
          <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Mentor</strong> Profile</h2>
        </div>
        <div class="overflow-hidden mb-4 pb-3">
          <p class="mb-0 d-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <form id="updateMentorProfile" role="form" method="post" action="<?= site_url('mentor/update_profile') ?>" enctype="multipart/form-data" class="needs-validation">
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Nama Kelas</label>
                <div class="col-lg-9">
                    <input class="form-control" name="classname" required type="text" value="<?= $row['class_name']  ?>">
                    <?php echo form_error('classname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Kategori Kelas</label>
                <div class="col-lg-9">
									<select class="form-control" id="classcategory" name="classcategory" required>
										<option value="">==Pilih Kategori==</option>
										<?php if ($queryCategory->num_rows() > 0): ?>
											<?php foreach ($queryCategory->result() as $key => $value): ?>
												<option value="<?= $value->category_product_id ?>" <?= $value->category_product_id == $row['category_class_id'] ? 'selected' : '' ?>><?= $value->category_product_name ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>

									<?php echo form_error('classcategory', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Subkategori Kelas</label>
              <div class="col-lg-9">
                <select class="form-control" id="subcategory" name="subcategory_class_id">
                  <option value="">==Pilih Subkategori==</option>
                  <?php if ($row['subcategory_class_id'] != 0): ?>
                    <?php if ($submentor->num_rows() > 0): ?>
                      <?php $sub = $submentor->row() ?>
                      <option value="<?= $sub->subcategory_class_id ?>" selected><?= $sub->name ?></option>
                    <?php endif; ?>
                  <?php endif; ?>

                </select>
              </div>
            </div>
            <div class="form-group row d-none">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Video Profil Mentor</label>
                <div class="col-lg-9">
									<div class="upload-box" id="mainVideo" data-id="16">

                    <div id="preview">
                      <div class="embed-responsive embed-responsive-16by9 mb-3">
                        <video controls controlsList="nodownload" src="<?= base_url('assets/uploads/videos/'.$row['mentor_video']) ?>"></video>
                      </div>
                    </div>

                    <div class="upload-box-body">
                      <p><i class="fa fa-upload"></i> Klik pilih video atau tarik video ke kotak ini</p>
                      <input class="form-control-file" name="videomentor" id="videomentor" type="file" value="<?= set_value('videomentor')  ?>" data-id="<?= $row['mentor_id'] ?>" data-update="mentor">
                    </div>

                    <div class="progress mt-3">
                      <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">100% Complete</span>
                      </div>
                    </div>

                  </div>

									<!-- <input class="form-control-file" name="videoprofile" required type="file" value="<?= set_value('videoprofile')  ?>" > -->
									<?php echo form_error('videoprofile', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required" for="">Resume Profil</label>
              <div class="col-lg-9">
                <textarea name="resume" class="form-control" rows="4" cols="80" required>
                  <?= $row['resume'] ?>
                </textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required" for="">Profil Mentor</label>
              <div class="col-lg-9">
                <textarea name="description" class="form-control" rows="6" cols="80" required>
                  <?= $row['profile'] ?>
                </textarea>
              </div>
            </div>

						<div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Akun Bank</label>
								<div class="col-lg-3">
									<input class="form-control" name="accountname" required type="text" value="<?= $row['account_name']  ?>" placeholder="Nama Rekening" >
									<?php echo form_error('accountname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
                <div class="col-lg-3">
                    <input class="form-control" name="accountnumber" required type="text" value="<?= $row['account_number']  ?>" placeholder="Nomor Rekening" >
                    <?php echo form_error('accountnumber', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
								<div class="col-lg-3">
                    <input class="form-control" name="bankname" required type="text" value="<?= $row['account_bank']  ?>" placeholder="Nama Bank">
                    <?php echo form_error('bankname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Facebook</label>
								<div class="col-lg-9">
									<input class="form-control" name="facebook" type="text" value="<?= $row['facebook']  ?>" placeholder="Facebook" >
									<?php echo form_error('facebook', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Instagram</label>
								<div class="col-lg-9">
                    <input class="form-control" name="instagram" type="text" value="<?= $row['instagram']  ?>" placeholder="Instagram">
                    <?php echo form_error('instagram', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Twitter</label>
								<div class="col-lg-9">
									<input class="form-control" name="twitter" type="text" value="<?= $row['twitter']  ?>" placeholder="Twitter" >
									<?php echo form_error('twitter', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">LinkedIn</label>
								<div class="col-lg-9">
                    <input class="form-control" name="linkedin" type="text" value="<?= $row['linkedin']  ?>" placeholder="Linkedin">
                    <?php echo form_error('linkedin', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <!-- <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Address</label>
                <div class="col-lg-9">
									<textarea name="address" class="form-control" id="address" rows="4" cols="80" placeholder="Jalan, Kelurahan, Kecamatan" required>
                    <?= $row->address  ?>
									</textarea>
									<?php echo form_error('address', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div> -->
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
                <div class="col-lg-9">

                    <!-- <select class="form-control" name="province_id" id="province" readonly required>
											<option value="">==Provinsi==</option>
                      <?php if ($queryProvince['rajaongkir']['status']['code'] == 200): ?>
                        <?php foreach ($queryProvince['rajaongkir']['results'] as $key => $value): ?>
                          <option value="<?= $value['province_id'] ?>" <?= $value['province_id'] == $row['province_id'] ? 'selected' : '' ?> ><?= $value['province'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>


                    </select> -->
                    <?php echo form_error('province', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
                <div class="col-lg-6">
                    <!-- <select class="form-control" name="city_id" id="city" required>
											<option value="">==Pilih Kota==</option>
                      <?php foreach ($city['rajaongkir']['results'] as $key => $value): ?>
                        <option value="<?= $value['city_id'] ?>" <?= $value['city_id'] == $row['city_id'] ? 'selected' : '' ?> ><?= $value['city_name'] ?></option>
                      <?php endforeach; ?>

                    </select> -->
                    <?php echo form_error('city', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
                <!-- <div class="col-lg-3">
                    <input class="form-control" type="text" name="postal_code" value="<?= $row['postal_code']  ?>" placeholder="Postal Code" required>
                    <?php echo form_error('postal_code', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div> -->
            </div>


            <div class="form-group row">
            <div class="form-group col-lg-9">

            </div>
            <div class="form-group col-lg-3">
              <input type="hidden" name="mentor_id" value="<?= $row['mentor_id'] ?>">
              <input type="submit" value="Save" name="btnUpdateProfile" class="btn btn-dark btn-modern float-right" data-loading-text="Loading...">
            </div>
            </div>
        </form>

      </div>
    </div>

  </div>

</div>
