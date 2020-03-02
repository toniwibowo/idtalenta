<?php $row = $query->row_array(); ?>

<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm d-none">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <h1 data-title-border><?= ucwords($this->uri->segment(1)) ?></h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <?php if($site_lang=='en'): ?>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active"><?php echo $row['title_jp'] ?></li>

          <?php else: ?>

            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active"><?php echo $row['title_en'] ?></li>

          <?php endif; ?>

          </ul>
        </div>
      </div>
    </div>
  </section>



    <div class="container">

      <div class="row justify-content-center my-5">
        <div class="col-lg-3 text-center">
          <div class="heading text-primary heading-border heading-bottom-border">
            <h1><strong class="font-weight-extra-bold"><?php echo $row['title_jp'] ?></strong></h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">

          <?php $site_lang = $this->session->userdata('language') ?>

          <?php if(count(unserialize($row['file_attachment'])) > 2): ?>
          <?php foreach(unserialize($row['file_attachment']) as $pict): ?>
            <img class="img-fluid w-100 mb-4" src="<?php echo base_url().'assets/uploads/files/'.$pict; ?>"/>
          <?php endforeach ?>
          <?php else: ?>
            <img class="img-fluid w-100 mb-4" src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>"/>
          <?php endif ?>

          <?php if ($site_lang=='en'): ?>
            <?php echo $row['description_en'] ?>
          <?php else: ?>
            <?php echo $row['description_jp'] ?>
          <?php endif; ?>

        </div>
      </div>


    </div>
</div>
