<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">My Account</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">My Account</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-2">

    <?php $user = $this->ion_auth->user()->row(); ?>
    <?php $province = $this->member->province($user->province_id) ?>
    <?php $city = $this->member->state($user->city_id, $user->province_id) ?>

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
          <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">My</strong> Profile</h2>
        </div>
        <div class="overflow-hidden mb-4 pb-3">
          <p class="mb-0 d-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <form role="form" method="post" action="<?= site_url('member/update') ?>" enctype="application/x-www-form-urlencoded" class="needs-validation">
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">First name</label>
                <div class="col-lg-9">
                    <input class="form-control" name="firstname" required type="text" value="<?= $user->first_name ?>">
                    <?php echo form_error('firstname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Last name</label>
                <div class="col-lg-9">
                    <input class="form-control" name="lastname" required type="text" value="<?= $user->last_name ?>">
                    <?php echo form_error('lastname', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Email</label>
                <div class="col-lg-9">
                    <input class="form-control" name="email" required type="email" value="<?= $user->email ?>" readonly>
                    <?php echo form_error('email', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Phone</label>
                <div class="col-lg-9">
                    <input class="form-control" name="phone" type="text" value="<?= $user->phone ?>" readonly>
                    <?php echo form_error('phone', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Address</label>
                <div class="col-lg-9">

                    <textarea name="address" class="form-control" rows="4" cols="80" value="<?= set_value('address')  ?>" placeholder="Jalan, Kelurahan, Kecamatan" required>
                      <?= $user->address ?>
                    </textarea>
                    <?php echo form_error('address', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
                <div class="col-lg-9">
                    <select class="form-control" name="province" id="province">
                      <?php if ($queryProvince['rajaongkir']['status']['code'] == 200): ?>
                        <?php foreach ($queryProvince['rajaongkir']['results'] as $key => $value): ?>
                          <option value="<?= $value['province_id'] ?>" <?= $value['province_id'] == $user->province_id ? 'selected' : ''  ?>><?= $value['province'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <?php echo form_error('province', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
                <div class="col-lg-6">
                    <select class="form-control" name="city" id="city">
                      <?php if ($user->province_id != 0 && $user->city_id != 0): ?>
                        <option value="<?= $city['rajaongkir']['results']['city_id'] ?>"><?= $city['rajaongkir']['results']['city_name'] ?></option>
                      <?php endif; ?>

                    </select>
                    <?php echo form_error('city', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="postal-code" value="<?= $user->postal_code  ?>" placeholder="Postal Code">
                    <?php echo form_error('postal-code', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Password</label>
                <div class="col-lg-9">
                    <input class="form-control" type="password" name="password" value="">
                    <?php echo form_error('password', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Confirm password</label>
                <div class="col-lg-9">
                    <input class="form-control" type="password" name="cpassword" value="">
                    <?php echo form_error('cpassword', '<div class="alert alert-danger mt-3 mb-0">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group row">
            <div class="form-group col-lg-9">

            </div>
            <div class="form-group col-lg-3">
              <input type="hidden" name="user_id" value="<?= $user->id ?>">
              <input type="submit" value="Save" class="btn btn-success btn-modern float-right" data-loading-text="Loading...">
            </div>
            </div>
        </form>

      </div>
    </div>

  </div>

</div>
