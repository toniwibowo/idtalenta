<div class="main d-inline-block" role="main">
  <section class="section section-dashboard section-dashboard-banner m-0 border-0">
    <div class="container">
      <div class="row no-gutters">
        <div class="col parallax m-0 p-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url('images/mentor/darwis-triadi.jpg')  ?>">
          <div class="row dashboard-banner-box align-items-center">
            <div class="col text-center">
              <h3 class="text-white mb-0"><strong>Selamat Datang, Darwis</strong></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-dashboard-content m-0 border-0 pt-0">
    <div class="container">
      <div class="row">
        <?php if ($this->session->flashdata('upload') == true): ?>
          <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
              Data kelas anda telah berhasil di upload.
            </div>
          </div>
        <?php endif; ?>
        <div class="col-lg-3 d-none">
          <div class="nav-left-sidebar">
            <h4 class="p-4 mb-0"><strong>Navigation</strong></h4>
            <ul>
              <li>
                <a class="active" href="#">
                  <i class="fa fa-home fa-2x"></i>
                  <span>Beranda</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-film fa-2x"></i>
                  <span>Daftar Video</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-shopping-cart fa-2x"></i>
                  <span>Video yang terjual</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-chart-bar fa-2x"></i>
                  <span>Statistik</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="statistic">
            <div class="entry-title text-right">
              <h3><strong>Statistik</strong></h3>
            </div>

            <div class="row">

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-lg-8">
                        <h2 class="mb-0 text-warning"><strong><?= $this->mentor->get_class_by_user($userID)->num_rows() ?></strong></h2>
                        <p class="mb-0">Total unggah video</p>
                      </div>
                      <div class="col-lg-4 align-self-center">
                        <a class="btn btn-outline btn-dark btn-block btn-rounded" href="#">Lihat</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-lg-8">
                        <h2 class="mb-0 text-warning"><strong><?= $this->mentor->total_video_purchased($userID) ?></strong></h2>
                        <p class="mb-0">Total video terbeli</p>
                      </div>
                      <div class="col-lg-4 align-self-center">
                        <a class="btn btn-outline btn-dark btn-block btn-rounded" href="#">Lihat</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-lg-8">
                        <h2 class="mb-0 text-warning"><strong>200</strong></h2>
                        <p class="mb-0">Total video ditonton</p>
                      </div>
                      <div class="col-lg-4 align-self-center">
                        <a class="btn btn-outline btn-dark btn-block btn-rounded" href="#">Lihat</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="populer-video mt-5">
            <div class="entry-title text-right">
              <h3><strong>Video yang diupload</strong></h3>
            </div>

            <div class="row mt-4 appear-animation" data-appear-animation="bounceInLeft" data-appear-animation-delay="300" data-appear-animation-duration="1s">
              <?php if ($mentorClass->num_rows() > 0): ?>
                <?php foreach ($mentorClass->result() as $key => $value): ?>
                  <div class="col-lg-4">
          					<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons">
          						<span class="thumb-info-wrapper">
                        <div class="poster" style="background-image: url('<?= base_url('assets/uploads/files/'.$value->poster) ?>')">

      									</div>
          							<!-- <img src="<?= base_url('assets/uploads/files/'.$value->poster) ?>" class="img-fluid" alt=""> -->
          							<span class="thumb-info-action">
          								<a href="#">
          									<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-play-circle fa-5x text-dark text-dark"></i></span>
          								</a>
          							</span>
          						</span>
          					</span>
          					<h5 class="mt-2 text-center">
          						<a class="text-dark" href="#">
          							<?= $value->title ?>
          						</a>
          					</h5>
                    <p class="text-center">Dibeli oleh <strong><?= $this->mentor->video_puchased_by_id($value->mentor_class_id) ?> member</strong><br><strong><?= $value->hits ?> member</strong> total view</p>
                    <div class="button-action text-center mb-4">
                      <a class="btn btn-dark" href="<?= site_url('mentor/dashboard/edit/'.$value->mentor_class_id.'/'.url_title($value->title,'-',true)) ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                    </div>
          				</div>
                <?php endforeach; ?>
              <?php endif; ?>

      			</div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
