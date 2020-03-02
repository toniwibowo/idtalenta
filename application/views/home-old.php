<?php include "include/header.php" ?>

<content id="main">
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">


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

          <div class="carousel-item <?php if($key==0){echo 'active';} ?>" style="background-image: url(<?php echo base_url().'assets/uploads/files/'.$row['file_image']; ?>)">
            <div class="carousel-container">
              <div class="carousel-content d-none">
                <h2>Lorem Ipsum Indosan</h2>
                <p>Lorem Ipsum Dolor Ammet</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
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
<section id="about">
  <div class="container">

    <div class="row about-cols">

      <div class="col-md-4 col-12 column wow fadeInUp" key={fitur.id}>
        <?php if($site_lang=='en'): ?>
           <h1 class="text-center" style="color:#fff">OUR PRODUCTS</h1>
        <?php else: ?>
          <h1 class="text-center" style="color:#fff">PRODUK</h1>
        <?php endif; ?>

        <ul class="product-carousel">
          <?php
        //$where = "start_date <= NOW() AND end_date >= NOW()";
        //$this->db->where($where);
        //$this->db->order_by('product_id','DESC');
        $this->db->order_by('rand()');
        //$this->db->limit(1);
        $data_product = $this->db->get('product');

        if($data_product->num_rows() > 0):
        foreach($data_product->result_array() as $key=>$row):
        ?>

            <li>
              <div class="about-col">
                <div class="img">
                  <a href="<?php echo site_url('product/detail/'.$row['product_id'].'/'.url_title($row['product_name'])); ?>"><img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" alt="" class="img-fluid" />
                 <!-- <div class="icon">
                    <img style="margin-top:5px;width:auto;display:unset" width="30" height="30" src="<?php echo base_url('public/images/logo-A-SAN.png') ?>" alt="">
                  </div>-->
                </div>
                <h2 class="title"><a href="<?php echo site_url('product/detail/'.$row['product_id'].'/'.url_title($row['product_name'])); ?>"><?php echo $row['product_name'] ?></a></h2>
                <p><?php //echo $row['resume']; ?></p>
              </div>
            </li>


      <?php endforeach ?>
        <?php else : ?>

          <h4 class="text-center bg-primary">No Data Slider Found !</h4>
        <?php endif ?>
        </ul>
      </div>




  <!--=================NEWS========================================================================-->

  <div class="col-md-4 col-12 column wow fadeInUp" key={fitur.id}>
    <?php if($site_lang=='en'): ?>
      <h1 class="text-center" style="color:#fff">NEWS</h1>
    <?php else: ?>
      <h1 class="text-center" style="color:#fff">BERITA</h1>
    <?php endif; ?>
    <ul class="news-carousel">
      <?php
      //$where = "start_date <= NOW() AND end_date >= NOW()";
      //$this->db->where($where);
      //$this->db->order_by('news_id','DESC');
      $this->db->order_by('rand()');
      //$this->db->limit(1);
      $data_product = $this->db->get('news');

      if($data_product->num_rows() > 0):
      foreach($data_product->result_array() as $key=>$row):
      ?>

          <li>
            <div class="about-col">
              <div class="img">
               <a href="<?php echo site_url('news/detail/'.$row['news_id'].'/'.url_title($row['title'])); ?>"> <img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" alt="" class="img-fluid" /></a>
                <!--<div class="icon">
                  <img style="margin-top:5px;width:auto;display:unset" width="30" height="30" src="<?php echo base_url('public/images/logo-A-SAN.png') ?>" alt="">
                </div>-->
              </div>
              <h2 class="title"><a href="<?php echo site_url('news/detail/'.$row['news_id'].'/'.url_title($row['title'])); ?>"><?php echo $row['title'] ?></a></h2>
              <p><?php //echo $row['resume']; ?></p>
            </div>
          </li>


    <?php endforeach ?>
      <?php else : ?>

        <h4 class="text-center bg-primary">No Data Slider Found !</h4>
      <?php endif ?>
    </ul>
  </div>


  <!--===============END NEWS=====================================================================-->



  <!--=================ARTICLES========================================================================-->

  <div class="col-md-4 col-12 column wow fadeInUp" key={fitur.id}>
    <?php if($site_lang=='en'): ?>
      <h1 class="text-center" style="color:#fff">ARTICLE</h1>
    <?php else: ?>
      <h1 class="text-center" style="color:#fff">ARTIKEL</h1>
    <?php endif; ?>
    <ul class="article-carousel">
      <?php
      //$where = "start_date <= NOW() AND end_date >= NOW()";
      //$this->db->where($where);
      //$this->db->order_by('articles_id','DESC');
      $this->db->order_by('rand()');
      //$this->db->limit(1);
      $data_product = $this->db->get('articles');

      if($data_product->num_rows() > 0):
      foreach($data_product->result_array() as $key=>$row):
      ?>

          <li>
            <div class="about-col">
              <div class="img">
                <a href="<?php echo site_url('blog/detail/'.$row['articles_id'].'/'.url_title($row['title'])); ?>"><img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" alt="" class="img-fluid" />
                <!--<div class="icon">
                  <img style="margin-top:5px;width:auto;display:unset" width="30" height="30" src="<?php echo base_url('public/images/logo-A-SAN.png') ?>" alt="">
                </div>-->
              </div>
              <h2 class="title"><a href="<?php echo site_url('blog/detail/'.$row['articles_id'].'/'.url_title($row['title'])); ?>"><?php echo $row['title'] ?></a></h2>
              <p><?php //echo $row['resume']; ?></p>
            </div>
          </li>


    <?php endforeach ?>
      <?php else : ?>

        <h4 class="text-center bg-primary">No Data Slider Found !</h4>
      <?php endif ?>
    </ul>
  </div>


  <!--===============END NEWS=====================================================================-->

<!--
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column wow fadeInUp" key={fitur.id}>
        <h1 class="text-center" style="color:#fff">Our Product</h1>
        <div class="about-col">
          <div class="img">
            <img src="<?php echo base_url() ?>public/images/feature/our-product.jpg" alt="" class="img-fluid" />
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">Our Product</a></h2>
          <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column wow fadeInUp" key={fitur.id}>
        <h1 class="text-center" style="color:#fff">Our Product</h1>
        <div class="about-col">
          <div class="img">
            <img src="<?php echo base_url() ?>public/images/feature/our-product.jpg" alt="" class="img-fluid" />
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
          </div>
          <h2 class="title"><a href="#">Our Product</a></h2>
          <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
        </div>
      </div>-->

    </div>
  </div>
</section>
<section id="team">
  <div class="container">
    <div class="section-header wow fadeInUp">


       <?php if($site_lang=='en'): ?>
      <h3>PARTNERS</h3>
        <?php else: ?>
      <h3>REKANAN</h3>
        <?php endif; ?>


      <p>Berikut ini adalah daftar our partners dari PT Indosan Berkat Bersama</p>
    </div>

    <div class="row owl-carousel owl-theme">

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

        <div class="col-12 wow fadeInUp item">
          <div class="member">
            <a href="<?php echo site_url('rekanan/detail/'.$row['customer_id'].'/'.url_title($row['title'])) ?>">
              <img src="<?php echo base_url().'assets/uploads/files/'.$row['image_small']; ?>" alt="Partner One" class="img-fluid" />
              <div class="member-info">
                <div class="member-info-content">
                  <h4><?php echo $row['title']; ?></h4>
                  <span><?php echo $row['description']; ?></span>
                </div>
              </div>
            </a>

          </div>
        </div>


<?php endforeach ?>
  <?php else : ?>

    <h4 class="text-center bg-primary">No Data Slider Found !</h4>
  <?php endif ?>

       <!-- <div class="col-lg-3 col-md-6 col-xs-12 wow fadeInUp" >
          <div class="member">
            <img src="<?php base_url() ?>public/images/partners/logo-1.png" alt="Partner One" class="img-fluid" />
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Partner One</h4>
                  <span>Lorem Ipsum Dolor</span>
                </div>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-xs-12 wow fadeInUp" key={partner.id}>
          <div class="member">
            <img src="<?php base_url() ?>public/images/partners/logo-1.png" alt="Partner One" class="img-fluid" />
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Partner One</h4>
                  <span>Lorem Ipsum Dolor</span>
                </div>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-xs-12 wow fadeInUp" key={partner.id}>
          <div class="member">
            <img src="<?php base_url() ?>public/images/partners/logo-1.png" alt="Partner One" class="img-fluid" />
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Partner One</h4>
                  <span>Lorem Ipsum Dolor</span>
                </div>
              </div>
          </div>
        </div>-->

    </div>

  </div>
</section>

<section id="contact">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8034880234595!2d106.7890743140394!3d-6.157068195542221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f74f76eee341%3A0x827cd64703567e2b!2sPT+Indosan+Berkat+Bersama!5e0!3m2!1sen!2sid!4v1533309231299" width="100%" height="490" frameborder="0" style="border: 0" allowfullscreen></iframe>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contactForm">
      <div class="section-header">
      	<?php if($site_lang=='en'): ?>
      		<h3>Contact</h3>
      		<p>Please Leave your message</p>

      		<?php else: ?>
      			<h3>Kontak</h3>
          <p>Silahkan tinggalkan pesan untuk kami</p>
      	<?php endif; ?>

        </div>
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <!--<form action="" method="post" role="form" class="contactForm">-->
            <?php echo form_error('name', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
              <?php echo form_error('email', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
              <?php echo form_error('phone', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
              <?php echo form_error('subject', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
              <?php echo form_error('comment', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
              <?php echo form_error('captcha', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>


<?php if($site_lang=='en'): ?>
   <?php echo form_open('home/send'); ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" id="phone" placeholder="Your phone number" data-rule="phone" data-msg="Please enter a phone number" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>

              <div class="form-group col-md-6">



              	  	<select type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                  <option value="">==Choose Subject==</option>
                  <option value="Product request">Product request</option>
                  <option value="Delivery">Delivery</option>
                  <option value="After sales service"> After sales service</option>
                  <option value="Complaint">Complaint</option>
                  <option value="Charges">Charges</option>
                  <option value="Others">Others</option>
                </select>
                <div class="validation"></div>



              </div>

            </div>

            <div class="form-group">
              <textarea class="form-control"  name="comment"  rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo set_value('comment'); ?></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button class="btn-danger btn-block" type="submit">Send Message</button></div>
          </form>

          <?php else: ?>


          	<?php echo form_open('home/send'); ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" id="name" placeholder="Nama anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="tel" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" id="phone" placeholder="No telp" data-rule="phone" data-msg="Please enter a phone number" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email" id="email" placeholder="Email " data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>

              <div class="form-group col-md-6">



              	  		<select type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                  <option value="">==Pilih Subjek==</option>
                  <option value="Permintaan Produk">Permintaan Produk</option>
                  <option value="Pengiriman">Pengiriman</option>
                  <option value="Layanan Purna Jual">Layanan Purna Jual</option>
                  <option value="Keluhan">Keluhan</option>
                  <option value="Biaya-biaya">Biaya-biaya</option>
                  <option value="Lain-lain">Lain-lain</option>
                </select>
                <div class="validation"></div>


              </div>

            </div>

            <div class="form-group">
              <textarea class="form-control"  name="comment"  rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pesan"><?php echo set_value('comment'); ?></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button class="btn-danger btn-block" type="submit">Kirim</button></div>
          </form>




          	<?php endif; ?>



        </div>
      </div>
    </div>
  </div>
</section>
</content>
<?php include "include/footer.php" ?>
