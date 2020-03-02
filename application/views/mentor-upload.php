<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">Upload Video</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Upload Video</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-2">

    <?php $user = $this->ion_auth->user()->row(); ?>

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

        <div class="overflow-hidden mb-1">
          <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Upload</strong> Video</h2>
        </div>
        <div class="overflow-hidden mb-4 pb-3">
          <p class="mb-0 d-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <form id="formUploadVideo" role="form" method="post" action="<?= site_url('mentor/uploadvideo') ?>" enctype="multipart/form-data" class="needs-validation">
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Judul</label>
                <div class="col-lg-9">
                    <input class="form-control" name="title" required type="text" value="<?= set_value('title')  ?>">
                    <?php echo form_error('title', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Resume</label>
                <div class="col-lg-9">
                  <?= form_textarea(['name' => 'resume', 'class' => 'form-control', 'rows' => 3, 'required' => 'required'], set_value('resume')) ?>
                  <?php echo form_error('resume', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Deskripsi</label>
                <div class="col-lg-9">
                  <?= form_textarea(['name' => 'description', 'class' => 'form-control', 'rows' => 4, 'required' => 'required'], set_value('description')) ?>
                  <?php echo form_error('description', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Tgl. posting</label>
                <div class="col-lg-3">
                  <input type="date" name="posting_date" class="form-control" required value="<?= set_value('posting_date') ?>">
                  <?php echo form_error('posting_date', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
                <label class="col-lg-2 font-weight-bold text-dark col-form-label form-control-label text-2 required text-right">Kategori</label>
                <div class="col-lg-4">
                  <select class="form-control" name="category_class_id" required>
                    <option value="">==Pilih==</option>
                    <?php $dataCategory = $this->db->get('category_product'); ?>
                    <?php if ($dataCategory->num_rows() > 0): ?>
                      <?php foreach ($dataCategory->result() as $key => $value): ?>
                        <option value="<?= $value->category_product_id ?>"><?= $value->category_product_name ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  <?php echo form_error('category_class_id', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Tags</label>
                <div class="col-lg-9">
                  <input id="tags" type="text" name="tags" class="form-control" data-role="tagsinput" required value="<?= set_value('tags') ?>">
                  <?php echo form_error('tags', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Harga</label>
                <div class="col-lg-3">
                  <input type="text" name="price" class="form-control" value="<?= set_value('price') ?>" required>
                  <?php echo form_error('price', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>

                <label class="col-lg-2 font-weight-bold text-dark col-form-label form-control-label text-2 required text-right">Diskon</label>
                <div class="col-lg-4">
                  <input type="text" name="sale" class="form-control" value="<?= set_value('sale') ?>">
                  <?php echo form_error('sale', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>

            </div>

            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Video</label>
                <div class="col-lg-9">
                  <div class="upload-box" id="mainVideo" data-id="16">

                    <div id="preview"></div>

                    <div class="upload-box-body">
                      <p><i class="fa fa-upload"></i> Klik pilih video atau tarik video ke kotak ini</p>
                      <input class="form-control-file" name="videomentor" id="videomentor" type="file" value="<?= set_value('videomentor')  ?>" >
                    </div>

                    <div class="progress mt-3">
                      <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="sr-only">100% Complete</span>
                      </div>
                    </div>

                    <div class="upload-box-description mt-3">
                      <?= form_textarea(['name' => 'video_description[]', 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Deskripsi Video', 'id' => 'video_description', 'required' => 'required'], set_value('video_description')) ?>
                    </div>
                  </div>
                  <div class="additional-video">

                  </div>
									<?php echo form_error('videomentor', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">
            <div class="form-group col-lg-6">

            </div>
            <div class="form-group col-lg-6">
              <input type="hidden" name="user_id" value="<?= $user->id ?>">
              <input type="hidden" name="video_id" id="videoID" value="<?= $this->session->userdata('video_id') ?>">
              <input type="submit" value="Upload" name="submitVideo" class="btn btn-dark btn-modern float-right" data-loading-text="Loading...">
              <button type="button" class="btn btn-warning btn-modern float-right mr-2 text-dark" name="addvideo"><i class="fa fa-plus-circle"></i> Tambah Video</button>
            </div>
            </div>
        </form>

      </div>
    </div>

  </div>

</div>
