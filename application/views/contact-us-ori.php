<?php include_once "template/include/header.php"; ?>
<content>
	<div class="container">
    	<div class="clearer about">
        <ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li class="active">Contact Us</li>
		</ol>

        <div class="row">
        	<div class="col-md-8 col-xs-12">
							<?php echo form_error('name', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
							<?php echo form_error('email', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
							<?php echo form_error('phone', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
							<?php echo form_error('subject', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
							<?php echo form_error('comment', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>
							<?php echo form_error('captcha', '<div class="bg-danger" style="padding:15px">', '</div>'); ?>

							<?php echo form_open('contact/send',array('class' => 'hidden')); ?>

									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="form-group form-group-lg">
	                    <label>Name :</label>
	                    <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control"/>
	                    </div>
										</div>

										<div class="col-md-6 col-xs-12 form-group-lg">
											<div class="form-group">
	                    <label>Email :</label>
	                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control"/>
	                    </div>
										</div>

									</div>

									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="form-group form-group-lg">
	                    <label>Phone :</label>
	                    <input type="tel" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control"/>
	                    </div>
										</div>

										<div class="col-md-6 col-xs-12">
											<div class="form-group form-group-lg">
	                    <label>Subject :</label>
	                    <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control"/>
	                    </div>
										</div>

									</div>

									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="form-group">
	                    <label>Comment :</label>
	                    <textarea name="comment" value="<?php echo set_value('comment'); ?>" class="form-control" rows="6"></textarea>
	                    </div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-3 col-xs-12">
											<div class="form-group">
												<?php //echo $cap_img; ?>
											</div>
										</div>

										<div class="col-md-6 col-xs-12">
											<div class="form-group form-group-lg">
	                    <!-- <label>Captcha :</label> -->
	                    <!--<input type="text" name="captcha" placeholder="Captcha" value="" class="form-control"/>-->
											<?php //echo $cap_msg ;?>
	                    </div>
										</div>

										<div class="col-md-3 col-xs-12 hidden">
											<div class="form-group">
	                    <input type="submit" class="btn btn-info btn-lg btn-block" value="SEND"/>
	                    </div>
										</div>

									</div>

                </form>
				
				<h3 class="secTitle"><span>Form Permintaan Apartemen</span></h3><!-- class requesting-apartement -->
				
				<form name="" method="post" action="" enctype="application/x-www-form-urlencoded">
				
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Nama Perusahaan</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">No. Telp</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Email</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Perkiraan Jadwal Move in</label>
								<input type="date" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Perkiraan Jadwal Showing</label>
								<input type="date" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Budget</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Perkiraan Include Pajak</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Harapan Area</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Alamat Kantor</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Nama Apartemen yang Diinginkan</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<label for="">Keinginan Lain</label>
								<input type="text" name="" value="" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label>Comment :</label>
								<textarea name="comment" value="<?php echo set_value('comment'); ?>" class="form-control" rows="6"></textarea>
							</div>
						</div>
						
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<button type="button" name="" class="btn btn-info btn-block">Submit</button>
							</div>
						</div>
						
					</div>
				
				</form>
            </div>

            <div class="col-md-4 col-xs-12">
                	<div class="news-widget">

								<!-- ARTIKEL TERBARU -->
								<div class="panel panel-default">
									<div class="panel-heading">Latest Article</div>
									<div class="panel-body">
										<?php
											$queryBlog = $this->db->order_by('news_id','DESC')->limit(3)->get('news');
											if($queryBlog->num_rows() > 0):
												foreach ($queryBlog->result_array() as $key):
										?>
										<div class="media">
									  		<div class="media-left media-top">
									    	<a href="<?php echo site_url('article/detail') ?>">
												<img class="media-object" src="<?php echo base_url().'assets/uploads/files/'.$key['image_small']; ?>" alt="">
											</a>
									  		</div>
									  		<div class="media-body">
												<h4 class="media-heading">
												<a class="title-news" href="<?php echo site_url('blog/detail').'/'.$key['news_id'].'/'.url_title($key['title_'.$site_lang],'-',true) ?>"><?php echo $key['title_'.$site_lang] ?></a>
												</h4>
									    		<p class="date"><i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($key['posting_date'])) ?></p>
									  		</div>
										</div>

									<?php endforeach ?>
									<?php endif ?>

									</div>

								</div>

									</div>
           </div>
        </div>

        </div>
    </div>
</content>
<?php include_once "template/include/footer.php"; ?>
