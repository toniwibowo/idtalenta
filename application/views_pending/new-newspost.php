<section class="sec-blog video related-news" id="berita-terkini">
	<div class="container">
		<div class="cellpadding">
		<div class="sec-title">
			<h1 class="title-blog">BERITA TERKINI</h1>
			<hr class="hr-blog">
		</div>
		<div class="row">

			<?php $berita = $this->db->where('cat_page_id', 3)->order_by('posting_date','DESC')->limit(3)->get('post') ?>

			<?php if ($berita->num_rows() > 0): ?>
				<?php foreach ($berita->result() as $key => $row): ?>
					<div class="col-lg-4 col-12 mb-4">
						<div class="card">
			  			<img class="img-fluid" src="<?php echo base_url('assets/uploads/files/post').'/'.$row->img_small; ?>" alt="" />
			  			<div class="card-body">
								<h4>
									<a href="<?php echo site_url('post/detail').'/'.$row->post_id.'/'.url_title($row->title,'-',true) ?>">
										<?php echo $row->title ?>
									</a>
								</h4>
			    		<p class="card-text">
								<?php echo strip_tags($row->resume) ?>
							</p>
			    		<a href="<?php echo site_url('post/detail').'/'.$row->post_id.'/'.url_title($row->title,'-',true) ?>">Read More</a>
			  			</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>
	</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			if ($('#berita-terkini').hasClass('related-news')) {
				$('section.hand-toss').addClass('d-none');
			}
		})
	</script>
</section>
