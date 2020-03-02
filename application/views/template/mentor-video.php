
<div class="row">
  <?php if ($queryVideo->num_rows() > 0): ?>
    <?php foreach ($queryVideo->result() as $key => $value): ?>
      <div class="col-lg-6">
        <div class="panel panel-primary" id="video-editor">


          <div class="panel-body">
            <div id="preview" class="mb-2">
              <div class="embed-responsive embed-responsive-16by9">
                <video src="<?= base_url('assets/uploads/videos/'.$value->video) ?>" controls controlsList="nodownload"></video>
              </div>
            </div>


            <div id="video-edit" class="video-edit d-none">
              <form id="formUploadVideo" class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="upload-box" id="mainVideo">

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
                      <?= form_textarea(['name' => 'video_description', 'value' => $value->description, 'class' => 'form-control', 'rows' => 3, 'placeholder' => 'Deskripsi Video', 'id' => 'video_description', 'required' => 'required'], set_value('video_description')) ?>
                      <input id="videoID" type="hidden" name="videoid" value="<?= $value->mentor_video_id ?>">
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="btn-action text-right mt-3">
              <a class="btn btn-primary btn-edit" href="#" data-id="<?= $key ?>"><i class="fa fa-edit"></i> Edit</a>
              <a class="btn btn-danger" href="#" data-id ="<?= $value->mentor_video_id ?>" id="btnDelete" ><i class="fa fa-trash"></i> Delete</a>
            </div>

          </div>
        </div>

      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>
