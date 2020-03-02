<?php include_once "include/header.php"; ?>

<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <h1 data-title-border>Gallery</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
         <?php if($site_lang=='en'): ?>
            <li><a href="<? echo base_url(); ?>">Home</a></li>
            <li class="active">Gallery</li>

          <?php else: ?>
          
          	<li><a href="<? echo base_url(); ?>">Beranda</a></li>
            <li class="active">Galeri</li>
          <?php endif; ?>  
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-2">

    <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
      <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
      <!--<li class="nav-item" data-option-value=".websites"><a class="nav-link text-1 text-uppercase" href="#">Gathering</a></li>
      <li class="nav-item" data-option-value=".logos"><a class="nav-link text-1 text-uppercase" href="#">Event</a></li>
      <li class="nav-item" data-option-value=".brands"><a class="nav-link text-1 text-uppercase" href="#">Outlet</a></li>
      <li class="nav-item" data-option-value=".medias"><a class="nav-link text-1 text-uppercase" href="#">Medias</a></li>-->
    </ul>

    <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
      <div class="row portfolio-list sort-destination" data-sort-id="portfolio">


 <?php if($jlh >0): ?>
        <?php foreach($query->result_array() as $r): ?>


        <div class="col-sm-6 col-lg-3 isotope-item brands">
          <div class="portfolio-item">
            <a href="<?php echo site_url('gallery/detail/'.$r['gallery_id'].'/'.url_title($r['title'])) ?>">
              <span class="thumb-info thumb-info-lighten border-radius-0">
                <span class="thumb-info-wrapper border-radius-0">
                  <img src="<?php echo base_url().'assets/uploads/files/'.$r['image_small']; ?>" class="img-fluid border-radius-0" alt="">

                  <span class="thumb-info-title">
                    <span class="thumb-info-inner"><?php echo $r['title']; ?></span>
                    <!--<span class="thumb-info-type">Brand</span>-->
                  </span>
                  <span class="thumb-info-action">
                    <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
                  </span>
                </span>
              </span>
            </a>
          </div>
        </div>
<?php endforeach; ?>
        <?php endif; ?>


        <?php echo $this->pagination->create_links(); ?>

      </div>
    </div>

  </div>
</div>



<?php include_once "include/footer.php"; ?>