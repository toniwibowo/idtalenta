  <!-- <div class="sidebar-search">
                            <form class="search-form" action="#">
                                <input type="text" placeholder="Search here…">
                                <button class="button-search"><i class="dlicon ui-1_zoom"></i></button>
                            </form>
                        </div> -->
                        <!-- mt-60 -->
                        <div class="sidebar-widget mb-55">
                            <h4 class="pro-sidebar-title2">Kategori Blog </h4>
                            <div class="sidebar-widget-list mt-40">
                              <?php $categoryBlog = $this->db->get('category_article'); ?>
                                <ul>
                                  <?php $articles = 0; ?>
                                  <?php if ($categoryBlog->num_rows() > 0): ?>
                                    <?php foreach ($categoryBlog->result_array() as $key => $value): ?>
                                      <?php $articles = $this->db->where('category_article_id', $value['category_article_id'])->get('articles')->num_rows(); ?>
                                      <li><a href="<?= site_url('blog?cat='.url_title($value['category_name'],'-',true)) ?>"><?= $value['category_name']  ?></a> <span>(<?= $articles ?>)</span></li>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                      <li class="alert alert-info" role="alert">Belum ada Kategori</li>
                                  <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-60">
                            <h4 class="pro-sidebar-title2">Popular Post </h4>
                            <div class="sidebar-post-wrap mt-45">
                              <?php $queryArticles  = $this->db->order_by('posting_date', 'desc')->limit(3)->get('articles'); ?>
                              <?php if ($queryArticles->num_rows() > 0): ?>
                                <?php foreach ($queryArticles->result() as $key => $article): ?>
                                  <div class="single-sidebar-post">
                                      <div class="sidebar-post-img">
                                          <a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>"><img src="<?= base_url('assets/uploads/blogs/'.$article->image_small) ?>" alt=""></a>
                                      </div>
                                      <div class="sidebar-post-content">
                                          <h4><a href="<?= site_url('articles/detail/'.$article->articles_id.'/'.url_title($article->title,'-',true)) ?>"><?= $article->title ?></a></h4>
                                          <span><?= date('d M Y', strtotime($article->posting_date)) ?></span>
                                      </div>
                                  </div>
                                <?php endforeach; ?>
                              <?php endif; ?>

                            </div>
                        </div>
                        <!-- <div class="sidebar-widget mb-60">
                            <h4 class="pro-sidebar-title2">Archives </h4>
                            <div class="archives-wrap mt-40">
                                <select>
                                    <option>Select Month</option>
                                    <option> January 2020 </option>
                                    <option> December 2018 </option>
                                    <option> November 2018 </option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="sidebar-widget mb-50">
                            <h4 class="pro-sidebar-title2">Tags</h4>
                            <div class="sidebar-widget-tag mt-35">
                                <ul>
                                    <li><a href="#">Beauty,</a></li>
                                    <li><a href="#">Computer,</a></li>
                                    <li><a href="#">Design,</a></li>
                                    <li><a href="#">Fashion,</a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Life Style,</a></li>
                                    <li><a href="#">Motion Design,</a></li>
                                    <li><a href="#">Photography,</a></li>
                                    <li><a href="#">Technology,</a></li>
                                    <li><a href="#">Travel.</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="sidebar-widget">
                            <div class="banner-sidebar-banner">
                                <a href="#"><img alt="" src="assets/images/blog/banner-blog.jpg"></a>
                                <!--<div class="banner-sidebar-content">
                                    <h3>Ads Banner </h3>
                                    <h5>hello@digicard.id</h5>
                                </div>-->
                            </div>
                        </div>
