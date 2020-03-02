<section class="search">
  <div class="container">
    <div class="clearer">
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo site_url() ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">
            <?php echo 'pencarian: '.$cari; ?>
          </li>
        </ul>
      </nav>

      <div class="row">
        <div class="col-lg-8 col-12">
          <?php if ($searchResult->num_rows() > 0): ?>
            <?php foreach ($searchResult->result() as $key => $row): ?>
              <div class="media">
                <img width="200" class="mr-4" src="<?php echo base_url('assets/uploads/files/post').'/'.$row->img_small ?>" alt="">
                <div class="media-body">
                  <h4>
                    <?php if ($row->category_name != 'Video'): ?>
                      <a href="<?php echo site_url(strtolower($row->category_name).'/detail').'/'.$row->post_id.'/'.url_title($row->title,'-',true) ?>"><?php echo $row->title ?></a>
                    <?php else: ?>
                      <a href="<?php echo site_url(strtolower($row->category_name)) ?>"><?php echo $row->title ?></a>
                    <?php endif; ?>

                  </h4>
                  <p><i class="fa fa-book"></i> category : <?php echo $row->category_name ?> | <i class="fa fa-calendar"></i> Tgl. Posting : <?php echo date('d/M/Y',strtotime($row->posting_date)) ?></p>
                  <p><?php echo strip_tags($row->resume) ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Kosong</p>
          <?php endif; ?>
        </div>
        <div class="col-lg-4 col-12">
          <div class="widget">
            <div class="card mb-4">
              <img class="img-fluid w-100" src="<?php echo base_url()?>images/0.png">
            </div>

            <div class="card">
              <img class="img-fluid w-100" src="<?php echo base_url()?>images/GFundingModel.png">
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
