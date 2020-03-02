<?php include "include/header.php" ?>

<div class="main" role="main">
  <section class="section section-mainslider m-0 border-0 p-0">
    <div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'smartSpeed': 500, 'autoplaySpeed':800, 'loop': true, 'nav': true, 'dots': true, 'autoplay':true}">


              <?php
    $where = "start_date <= NOW() AND end_date >= NOW()";
              //$where = "end_date >= NOW()";
    //          $where = "start_date <= NOW() ";
    $this->db->where($where);
    $this->db->order_by('slider_id','DESC');
    $data_slider = $this->db->get('slider');

    if($data_slider->num_rows() > 0):
    foreach($data_slider->result_array() as $key=>$row):
    ?>

      <div>
        <div class="img-thumbnail border-0 p-0 d-block">
          <img class="img-fluid border-radius-0" src="<?php echo base_url().'assets/uploads/files/'.$row['file_image']; ?>" alt="">
        </div>
      </div>

        <?php endforeach ?>
    <?php else : ?>

      <h4 class="text-center bg-primary">No Data Slider Found !</h4>
    <?php endif ?>

    </div>
  </section>

  <section class="section section-promo border-0 m-0 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="owl-promo owl-carousel owl-theme" data-plugin-options="{'items': 3, 'margin': 10, 'loop': true, 'nav': false, 'dots': true}">


              <?php

       $where = "posting_date <= now()";
              
    $this->db->where($where);        
    $this->db->order_by('promo_id','DESC');
    $data_slider = $this->db->get('promo');

    if($data_slider->num_rows() > 0):
    foreach($data_slider->result_array() as $key=>$row):
    ?>

            <div>
              <a href="<?php echo site_url('promo/detail/'.$row['promo_id'].'/'.url_title($row['title'])); ?>"><img class="img-fluid border-radius-0" src="<?= base_url('assets/uploads/files/'.$row['image_small']) ?>" alt=""></a>
            </div>

           <?php endforeach; ?>

         <?php endif; ?>


          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="section section-product m-0 border-0">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
         
           <?php if($site_lang=='en'): ?>
           <h2 class="text-center" >OUR PRODUCTS</h2>
        <?php else: ?>
          <h2 class="text-center">PRODUK</h2>
        <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-lg-4">
          <div class="card">
            <a href="#">
              <img class="img-fluid w-100 border-radius-0" src="<?= site_url() ?>images/product/secure-storage.jpg" alt="">
            </a>
            <div class="card-body bg-danger">
              <h4 class="text-white">
                <a href="#">SECURE STORAGE SOLUTIONS</a>
              </h4>
              
                  <?php if($site_lang=='en'): ?>
         
           <ul>  
               <li class="text-white"><a href="http://www.indosan.com/product/category/1/Burglar-Resistance-Safes">Burglar resistant safes</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/4/Fire-Resistance-Safes">Fire resistant safes</a></li>
               <li class="text-white">Luxury safes</li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/16/Portable-Safes">Portable safes</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/8/Hotel-Safes">Hotel safe</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/5/Vault-Doors">Vault door</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/6/Safe-Deposit-Box">Safe Deposit Box</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/7/Fire-Resistance-Filing-Cabinet">Fire resistant Cabinet</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/2/Office-Cabinet">Office cabinet</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/10/Drawer-Cabinet">Drawer cabinet</a></li>
               <li class="text-white">Mobile drawer</li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/11/Locker">Locker</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/12/Mobile-File">Mobile file</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/14/Book-Shelf">Bookshelf</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/3/Rak-Serba-Guna">Multipurpose shelf</a></li>
           </ul>
           </p>
        <?php else: ?>
           <ul> 
               <li class="text-white"><a href="http://www.indosan.com/product/category/1/Lemari-Besi-Tahan-Bongkar">Brankas tahan bongkar</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/4/Lemari-Besi-Tahan-Api">Brankas tahan api</a></li>
               <li class="text-white">Brankas mewah</li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/16/Brankas-Portabel">Brankas portable</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/8/Brankas-Hotel">Brankas hotel</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/5/Pintu-Khasanah">Pintu khasanah</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/6/Safe-Deposit-Box">Safe Deposit Box</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/7/Lemari-Arsip-Tahan-Api">Lemari arsip tahan api</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/2/Lemari-Kantor">Lemari kantor</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/10/Laci-Arsip">Laci arsip</a></li>
               <li class="text-white">Laci sorong</li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/11/Loker">Lemari loker</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/12/Mobile-File">Mobile file</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/14/Rak-Buku">Rak buku</a></li>
               <li class="text-white"><a href="http://www.indosan.com/product/category/3/Rak-Serba-Guna">Rak serbaguna</a></li>
           </ul>
        <?php endif; ?>
        
              <!--<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-lg-4">
          <div class="card">
            <a href="#">
              <img class="img-fluid w-100 border-radius-0" src="<?= site_url() ?>images/product/fire-rescue.jpg" alt="">
            </a>
            <div class="card-body bg-danger">
              <h4 class="text-white">
                <a href="#">FIRE & RESCUE SOLUTIONS</a>
              </h4>
               <?php if($site_lang=='en'): ?>
          
                <ul>
               <li class="text-white">Fire Extinguisher</li>
               <li class="text-white">Fire Fighting Equipment</li>
               <li class="text-white">Fire Pump</li>
               <li class="text-white">Fire Truck</li>
               <li class="text-white">Rescue Tools</li>
               <li class="text-white">Fire Protection System</li>
           </ul>
               
               </p>
        <?php else: ?>
          <ul> 
               <li class="text-white">Tabung pemadam</li>
               <li class="text-white">Perangkat pemadam api</li>
               <li class="text-white">Pompa pemadam</li>
               <li class="text-white">Mobil pemadam</li>
               <li class="text-white">Perangkat penyelamatan</li>
               <li class="text-white">Sistim pemadaman api</li>
           </ul>
        <?php endif; ?>
              <!--<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-lg-4">
          <div class="card">
            <a href="#">
              <img class="img-fluid w-100 border-radius-0" src="<?= site_url() ?>images/product/premises-sec.jpg" alt="">
            </a>
            <div class="card-body bg-danger">
              <h4 class="text-white">
                <a href="#">PREMISES SECURITY SOLUTIONS</a>
              </h4>
              
           <?php if($site_lang=='en'): ?>
              <ul>
               <li class="text-white">Fencing</li>
               <li class="text-white">Entrance Control</li>
               <li class="text-white">Access control</li>
               <li class="text-white">High security equipment</li>
               <li class="text-white">Video Surveillance (CCTV)</li>
               <li class="text-white">Intruder Alarm</li>
           </ul>
        <?php else: ?>
          <ul> 
               <li class="text-white">Pagar</li>
               <li class="text-white">Pengawasan jalan masuk</li>
               <li class="text-white">Pengawasan akses gedung</li>
               <li class="text-white">Perangkat pengaman tingkat tinggi</li>
               <li class="text-white">Kamera pengawas</li>
               <li class="text-white">Alarm penyusup</li>
           </ul>
        <?php endif; ?>
        
              <!--<p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  

  <section class="section section-news border-0 bg-white">
    <div class="container">
      <div class="row">
        <div class="col text-center">
         <?php if($site_lang=='en'): ?>
      <h2 class="text-center" >NEWS</h2>
    <?php else: ?>
      <h2 class="text-center" >BERITA</h2>
    <?php endif; ?>
        </div>
      </div>

      <div class="row my-4">



      	 <?php
      //$where = "start_date <= NOW() AND end_date >= NOW()";
      //$this->db->where($where);
      //$this->db->order_by('news_id','DESC');
      $this->db->order_by('rand()');
      $this->db->limit(4);
      $data_product = $this->db->get('news');

      if($data_product->num_rows() > 0):
      foreach($data_product->result_array() as $key=>$row):
      ?>

        <div class="col-12 col-md-6 mb-4">
          <div class="row no-gutters">
            <div class="col-12 col-lg-6">
               <a href="<?php echo site_url('news/detail/'.$row['news_id'].'/'.url_title($row['title'])); ?>"> <img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" alt="" class="img-fluid" /></a>
            </div>
            <div class="col-12 col-lg-6 bg-dark text-center p-4 d-table">
              <div class="entry-title d-table-cell">
                <a class="text-white" href="<?php echo site_url('news/detail/'.$row['news_id'].'/'.url_title($row['title'])); ?>">
                  <?php echo $row['title'] ?>
                </a>

              </div>
            </div>
          </div>
        </div>


    <?php endforeach ?>
      <?php else : ?>

        <h4 class="text-center bg-primary">No Data News Found !</h4>
      <?php endif ?>


      </div>
    </div>
  </section>

  <section class="section section-article border-0 m-0">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <?php if($site_lang=='en'): ?>
      <h2 class="text-center">ARTICLE</h2>
    <?php else: ?>
      <h2 class="text-center">ARTIKEL</h2>
    <?php endif; ?>
        </div>
      </div>

      <div class="row my-4">

      	<?php
      //$where = "start_date <= NOW() AND end_date >= NOW()";
      //$this->db->where($where);
      //$this->db->order_by('articles_id','DESC');
      $this->db->order_by('rand()');
      $this->db->limit(4);
      $data_product = $this->db->get('articles');

      if($data_product->num_rows() > 0):
      foreach($data_product->result_array() as $key=>$row):
      ?>

        <div class="col-12 col-md-6 mb-4">
          <div class="row no-gutters">
            <div class="col-12 col-lg-6">
               <a href="<?php echo site_url('blog/detail/'.$row['articles_id'].'/'.url_title($row['title'])); ?>"><img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" alt="" class="img-fluid" />
            </div>
            <div class="col-12 col-lg-6 bg-dark text-center p-4 d-table">
              <div class="entry-title d-table-cell">
                <a class="text-white" href="<?php echo site_url('blog/detail/'.$row['articles_id'].'/'.url_title($row['title'])); ?>">
                  <?php echo $row['title'] ?>
                </a>
                <!--<p class="text-white mb-0"><i>07 Sept 2019</i></p>-->
              </div>
            </div>
          </div>
        </div>

            <?php endforeach ?>
      <?php else : ?>

        <h4 class="text-center bg-primary">No Data Slider Found !</h4>
      <?php endif ?>

      </div>
    </div>
  </section>

  <section class="section section-partner border-0 m-0 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
             <?php if($site_lang=='en'): ?>
      <h2>PARTNERS</h2>
        <?php else: ?>
      <h2>REKANAN</h2>
        <?php endif; ?>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-12">
          <div class="owl-partner owl-carousel owl-theme stage-margin">


          	  <?php
  //$where = "start_date <= NOW() AND end_date >= NOW()";
  //$this->db->where($where);
  //$this->db->order_by('customer_id','DESC');
  $this->db->limit(12);
  $this->db->order_by('title', 'RANDOM');
  $data_customer = $this->db->get('customer');

  if($data_customer->num_rows() > 0):
  foreach($data_customer->result_array() as $key=>$row):
  ?>

            <div class="item-partner">
              <a href="#!">
                <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info">
                  <span class="thumb-info-wrapper">
                    <img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" class="img-fluid" alt="">
                    <span class="thumb-info-title">
                      <span class="thumb-info-inner"><?php echo $row['title']; ?></span>
                    </span>
                    <span class="thumb-info-action">
                      <span class="thumb-info-action-icon"><i class="fas fa-plus"></i></span>
                    </span>
                  </span>
                </span>
              </a>
            </div>

          <?php endforeach ?>
  <?php else : ?>

    <h4 class="text-center bg-primary">No Data Slider Found !</h4>
  <?php endif ?>




          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="g-maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8036055321236!2d106.78914831479443!3d-6.157052462061667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7ff681b2f57%3A0xdea89fd05df09db4!2sPT%20Indosan%20Berkat%20Bersama!5e0!3m2!1sen!2sid!4v1568643388025!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </section>

</div>

<?php include "include/footer.php" ?>
