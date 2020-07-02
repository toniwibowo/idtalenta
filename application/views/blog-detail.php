<?php $row = $query->row() ?>
<div class="main" role="main">
  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-8">
        <h1><?= $row->title ?></h1>

        <?php if (count(unserialize($row->images)) > 0): ?>
          <?php foreach (unserialize($row->images) as $key => $pict): ?>
            <img class="img-fluid w-100 mb-4" src="<?= base_url('assets/uploads/blogs/'.$pict) ?>" alt="<?= substr($row->image_small,0,-4) ?>">
          <?php endforeach; ?>
          <?php else: ?>
            <img class="img-fluid w-100 mb-4" src="<?= base_url('assets/uploads/blogs/'.$row->image_small) ?>" alt="<?= substr($row->image_small,0,-4) ?>">
        <?php endif; ?>



        <?= $row->description  ?>
      </div>

      <div class="col-lg-4">
        <div class="row">
  				<div class="col-7">
  					<div class="heading text-primary heading-border heading-bottom-border">
  						<h3><strong class="font-weight-extra-bold">Artikel Lainya</strong></h3>
  					</div>
  				</div>

          <div class="col-12">

            <?php if ($queryOtherBlog->num_rows() > 0): ?>
              <?php foreach ($queryOtherBlog->result() as $key => $val): ?>
                <div class="media mb-4">
                  <img class="img-fluid rounded mr-4" src="<?= base_url('assets/uploads/blogs/'.$val->image_small) ?>" width="120" alt="<?= substr($val->image_small,0,-4) ?>">
                  <div class="media-body">
                    <a class="text-dark" href="<?= site_url('blog/detail/'.$val->articles_id.'/'.url_title($val->title,'-',true)) ?>"><?= $val->title  ?></a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>

          <div class="col-7">
  					<div class="heading text-primary heading-border heading-bottom-border">
  						<h3><strong class="font-weight-extra-bold">Video Populer</strong></h3>
  					</div>
  				</div>

          <div class="col-12">
            <?php if ($popularVideo->num_rows() > 0): ?>
              <?php foreach ($popularVideo->result_array() as $key => $value): ?>
                <div class="media mb-4">
                  <img class="img-fluid rounded mr-4" src="<?= base_url('assets/uploads/files/'.$value['poster']) ?>" width="120" alt="">
                  <div class="media-body">
                    <a class="text-dark" href="<?= site_url('course/'.$value['mentor_class_id'].'/'.url_title($value['title'],'-',true)) ?>"><?= $value['title'] ?></a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>


  			</div>
      </div>
    </div>
  </div>
</div>
