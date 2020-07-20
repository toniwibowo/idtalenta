<?php $row = $classData->row() ?>

<div class="main d-grid" role="main">

  <section class="page-header page-header-classic page-header-sm mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">Mentor Dashboard</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Video yang diupload</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-mentor-admin border-0 m-0">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-12" id="dataVideo">
              <div class="card mb-4">
                <div class="card-header">
                  THRILLER
                </div>
                <div class="card-body p-3">
                  <?php if ($row->thriller != ''): ?>
                    <div class="embed-responsive embed-responsive-16by9">
                      <?php $filetype = strtolower(pathinfo($row->thriller,PATHINFO_EXTENSION)); ?>
                      <?php if ($filetype == 'mp4'): ?>
                        <video controls controlsList="nodownload" src="<?= base_url('assets/uploads/videos/'.$row->thriller) ?>"></video>
                        <?php else: ?>
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $row->thriller ?>?rel=0"></iframe>
                      <?php endif; ?>

                    </div>
                  <?php else: ?>
                    <div id="thriller" class="thriller">
                      <form class="" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="upload-box" id="mainVideo">

                            <div class="upload-box-body">
                              <p><i class="fa fa-upload"></i> Klik pilih video atau tarik video ke kotak ini</p>
                              <input class="form-control-file" name="thriller" id="thrillerUpdate" type="file" value="<?= set_value('thriller')  ?>" >
                              <input type="hidden" name="thrillerID" value="<?= $row->mentor_class_id ?>">
                            </div>

                            <div class="progress mt-3">
                              <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="sr-only">100% Complete</span>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="form-group">
                          <label for="">Youtube Link</label>
                          <input type="text" name="thriller-youtube" value="<?= $row->thriller ?>" data-user="<?= $row->user_id ?>" data-id="<?= $row->mentor_class_id ?>">
                        </div>

                      </form>
                    </div>
                  <?php endif; ?>

                </div>
                <?php if ($row->thriller != ''): ?>
                  <div class="card-footer text-right">
                    <a class="btn btn-danger" href="<?= site_url('mentor/delete_thriller/'.$row->mentor_class_id.'/'.url_title($row->title,'-',true)) ?>"><i class="fa fa-trash"></i> Delete</a>
                  </div>
                <?php endif; ?>

              </div>

              <!-- YOUTUBE VIDEO LIST -->
              <div class="heading heading-border heading-bottom-double-border">
								<h4 class="font-weight-normal">YOUTUBE <strong class="font-weight-extra-bold">Video</strong> List</h4>
							</div>

              <div class="row">
                <div class="col-lg-12">
                  <form class="" action="" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                      <label for="">Youtube Link</label>
                      <input id="youtubeLink" type="text" name="youtube-link" value="<?= $row->ytube_embeded ?>" data-video_id="<?= $row->video_id ?>" data-user="<?= $row->user_id ?>" data-id="<?= $this->uri->segment(4) ?>">
                    </div>
                  </form>
                </div>
              </div>

              <?php if ($row->ytube_embeded != ''): ?>
                <?php $dataYoutube = explode(',',trim($row->ytube_embeded)) ?>
                <div class="row">
                  <div class="col-lg-12">
                    <?php foreach ($dataYoutube as $key => $link): ?>
                      <div class="embed-responsive embed-responsive-16by9 mb-4">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $link ?>?rel=0"></iframe>
                      </div>
                      <?php $ttl = $this->db->where('youtube_link', $link)->get('mentor_video')->row_array();  ?>
                      
                      <form class="" action="#" method="post">
                        <div class="form-group">
                          <label for="">Title</label>
                          <input class="form-control" type="text" data-link="<?= $link ?>" name="youtube-title" value="<?= $ttl['description'] ?>">
                        </div>
                      </form>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="heading heading-border heading-bottom-double-border">
								<h4 class="font-weight-normal">UPLOAD <strong class="font-weight-extra-bold">Video</strong> List</h4>
							</div>

              <div class="row">
                <div class="col-lg-12">
                  <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for=""><i class="fa fa-plus-circle"></i> Tambah Video</label>

                      <div class="upload-box" id="mainVideo">


                        <div class="upload-box-body">
                          <p><i class="fa fa-upload"></i> Klik pilih video atau tarik video ke kotak ini</p>
                          <input class="form-control-file" name="videolist" id="uploadlistVideo" type="file" value="<?= set_value('videolist')  ?>" data-id="<?= $row->video_id ?>" data-user="<?= $row->user_id ?>">
                        </div>

                        <div class="progress mt-3">
                          <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="sr-only">100% Complete</span>
                          </div>
                        </div>

                      </div>

                    </div>
                  </form>
                </div>
              </div>

              <!-- LIST VIDEOS -->

              <!-- UPLOAD VIDEO LIST -->
              <div id="listVideoParent">
                <?php if ($listVideo->num_rows() > 0): ?>
                  <?php foreach ($listVideo->result() as $key => $vd): ?>
                    <div class="card mb-4" id="video-editor">
                      <div class="card-body p-3">

                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                          <video controls controlsList="nodownload" src="<?= base_url('assets/uploads/videos/'.$vd->video) ?>"></video>
                        </div>

                        <div id="video-edit" class="video-edit d-none">
                          <form id="formUploadVideo" class="" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <div class="upload-box" id="mainVideo">


                                <div class="upload-box-body">
                                  <p><i class="fa fa-upload"></i> Klik pilih video atau tarik video ke kotak ini</p>
                                  <input class="form-control-file" name="videolist" id="listVideo" type="file" value="<?= set_value('videolist')  ?>" data-id="<?= $vd->mentor_video_id ?>" data-oldvideo="<?= $vd->video ?>">
                                </div>

                                <div class="progress mt-3">
                                  <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    <span class="sr-only">100% Complete</span>
                                  </div>
                                </div>

                                <div class="upload-box-description mt-3">

                                  <textarea name="name" rows="3" cols="40" name="video_description<?= $key ?>" id="video_description" class="form-control" data-id="<?= $vd->mentor_video_id ?>" data-string="<?= $vd->description ?>" required>
                                    <?= $vd->description ?>
                                  </textarea>

                                </div>

                              </div>
                            </div>
                          </form>
                        </div>



                      </div>
                      <div class="card-footer text-right">
                        <div class="btn-action">
                          <a class="btn btn-success btn-edit" href="#" data-id="<?= $key ?>" ><i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-danger btn-delete" id="btnDeleteListVideo" data-id="<?= $vd->mentor_video_id ?>" data-parent="<?= $row->mentor_class_id ?>" data-slug="<?= url_title($row->title,'-',true) ?>" href="#"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <?php if ($this->session->flashdata('updateclass')): ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data Kelas</strong> anda berhasil di update.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('errorupdateclass')): ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data Kelas</strong> anda gagal di update.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <div class="card-body">
              <div class="poster mb-4">
                <img class="img-fluid w-100" src="<?= base_url('assets/uploads/files/'.$row->poster) ?>" alt="">
              </div>
              <form id="updateVideoClass" class="needs-validation" action="<?= site_url('mentor/updatevideo') ?>" method="post" enctype="multipart/form-data">

                <div class="form-row">
                  <div class="form-group col-lg-12">
                    <div class="upload-box" id="mainVideo">

                      <div class="upload-box-body">
                        <p><i class="fa fa-upload"></i> Klik atau tarik image poster ke kotak ini</p>
                        <input class="form-control-file" name="poster" id="poster" type="file" value="<?= set_value('poster')  ?>" accept=".jpg,.png,.gif" data-id="<?= $row->mentor_class_id ?>">
                      </div>

                    </div>

                  </div>

                  <div class="form-group col-lg-12">
                    <label for="">Kategori</label>
                    <select class="form-control" name="category">
                      <?php if ($classCategory->num_rows() > 0): ?>
                        <?php foreach ($classCategory->result() as $key => $ct): ?>
                          <option value="<?= $ct->category_product_id ?>" <?= $ct->category_product_id == $row->category_product_id ? 'selected' : '' ?>><?= $ct->category_product_name ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>

                  <div class="form-group col-lg-12">
                    <label for="">Judul</label>
                    <input class="form-control" type="text" name="title" value="<?= $row->title ?>" required>
                  </div>

                  <div class="form-group col-lg-12 textarea">
                    <label for="">Resume</label>
                    <textarea class="form-control" name="resume" rows="4" cols="80" data-string="<?= $row->resume ?>"></textarea>
                  </div>

                  <div class="form-group col-lg-12 textarea">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="8" cols="80" data-string="<?= $row->description ?>"></textarea>
                  </div>

                  <div class="form-group col-lg-6">
                    <label for="">Price</label>
                    <input class="form-control" type="text" name="price" value="<?= $row->price ?>" required>
                  </div>

                  <div class="form-group col-lg-6">
                    <label for="">Sale</label>
                    <input class="form-control" type="text" name="sale" value="<?= $row->sale ?>">
                  </div>

                  <div class="form-group col-lg-12">
                    <label for="">Tags</label>
                    <input id="tags" type="text" name="tags" class="form-control" data-role="tagsinput" required value="<?= $row->tags ?>">
                  </div>

                  <div class="form-group col-lg-12">
                    <label for="">Tgl. Posting</label>
                    <input class="form-control" type="date" name="posting_date" value="<?= $row->posting_date ?>">
                  </div>

                  <input type="hidden" name="btnUpdate" value="1">
                  <input type="hidden" name="id" value="<?= $row->mentor_class_id ?>">

                </div>
              </form>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-dark btn-modern" type="button" name="button" id="mentorClassUpdate">Update</button>
              <a href="<?= site_url('mentor/dashboard') ?>" class="btn btn-primary btn-modern text-dark">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
