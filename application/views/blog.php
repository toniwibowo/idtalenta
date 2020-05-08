<!-- Blog start -->
<div class="blog-area-2 pt-100 pb-100">
		<div class="container">
				<div class="row">
						<div class="col-lg-9">
							<?php if ($queryArticles->num_rows() > 0): ?>
								<?php foreach ($queryArticles->result() as $key => $article): ?>
									<div class="blog-wrap-3 mb-70">
											<div class="blog-img-3 mb-20">
													<a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>"><img src="<?= base_url('assets/uploads/blogs/'.$article->image_small) ?>" alt="blog"></a>
											</div>
											<div class="blog-content-3">
													<!-- <div class="blog-category">
															<a href="#">Technology</a>
													</div> -->
													<h3><a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>"><?= $article->title ?></a></h3>
													<div class="blog-meta">
															<ul>
																	<li><a href="#">Posted on <?= date('d M Y', strtotime($article->posting_date)) ?></a></li>
																	<li>By <a href="#">Admin</a></li>
															</ul>
													</div>
													<?= $article->resume ?>
													<div class="blog-btn-2 blog-btn-2-red">
															<a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>">Read More</a>
													</div>
											</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>

						</div>




						<div class="col-lg-3">
							<?php include "include/blog-right.php" ?>
						</div>
					</div>
			</div>
</div>
<!-- Blog end -->
