<?php include_once "include/header.php"; ?>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tosrus.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.tosrus.all.css" />

<script type="text/javascript">
   $(document).ready(function() {
      $("#links a").tosrus();
   });
</script>

<div class="main" role="main">
  <section class="page-header page-header-classic page-header-sm mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <h1 data-title-border>Blog</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo site_url('gallery'); ?>">Photo Gallery</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>

<content class="galleryDetail">
    <div class="container my-5">
    <div class="clearer cellpadding">


      <div class="row">
        <div class="col-md-8 col-12">

        <?php $datad=$query->row_array();?>
        <?php if(count(unserialize($datad['file_images']))>0): ?>
        <div id="links">
          <?php foreach(unserialize($datad['file_images']) as $row): ?>
          <a href="<?php echo base_url() .'assets/uploads/files/'. $row; ?>">
            <img class="img-fluid mb-4" src="<?php echo base_url().'assets/uploads/files/' . $row; ?>" />
          </a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
    		<div class="news-widget">
    		<?php include_once "include/right-column.php"; ?>
      	</div>
    		</div>
      </div>




    </div>

    </div>
</content>


</div>
<?php include_once "include/footer.php"; ?>
