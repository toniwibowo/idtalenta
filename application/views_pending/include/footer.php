<footer id="footer" class="mt-0">
	<div class="container my-4">
		<div class="row py-5">
			<div class="col-md-5 col-lg-5 mb-5 mb-lg-0">
				<img class="img-fluid mb-4" src="<?= base_url('images/logo.png') ?>" alt="">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra justo nec sem vulputate tempor. Sed congue, ipsum ut ullamcorper efficitur, urna erat finibus ex, nec auctor metus enim at quam. Maecenas pulvinar turpis at ligula mollis, sed commodo ligula lacinia. Phasellus ut vestibulum nisl, eu porttitor augue.</p>
			</div>
			<div class="col-md-7 col-lg-3 mb-5 mb-lg-0">
				<h5 class="text-6 text-transform-none font-weight-semibold text-warning mb-4">Kontak</h5>
				<ul class="list list-icons list-icons-style-3">
					<li>
						<i class="fa fa-map-marker bg-warning text-dark"></i>
						Jl. MH.Thamrin No.1 Lt.50<br> Regus Grand Indonesia Menara BCA,<br> Jakarta, 10240
					</li>
					<li>
						<i class="fa fa-phone bg-warning text-dark"></i>
						<a href="tel:02123584473">021 - 2358 4473</a>
					</li>
					<li>
						<i class="fa fa-envelope bg-warning text-dark"></i>
						<a href="mailto:admin@artademi.com">admin@artademi.com</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-4">
				<h5 class="text-6 text-transform-none font-weight-semibold text-warning mb-4">Langganan Newsletter</h5>
				<div class="alert alert-success d-none" id="newsletterSuccess">
					<strong>Success!</strong> You've been added to our email list.
				</div>
				<div class="alert alert-danger d-none" id="newsletterError"></div>
				<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mw-100">
					<div class="input-group input-group-rounded">
						<input class="form-control form-control-sm bg-light px-4 text-3" placeholder="Email Address..." name="newsletterEmail" id="newsletterEmail" type="text">
						<span class="input-group-append">
							<button class="btn btn-warning text-color-light text-2 py-3 px-4" type="submit"><strong class="text-dark">SUBSCRIBE!</strong></button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="footer-copyright footer-copyright-style-2 bg-warning">
		<div class="container py-2">
			<div class="row py-2">
				<div class="col d-flex align-items-center justify-content-start mb-4 mb-lg-0">
					<p>© Copyright 2019. All Rights Reserved.</p>
				</div>
				<div class="col d-flex align-items-center justify-content-end mb-4 mb-lg-0">
					<h4 class="d-inline mb-0 mr-4 text-dark">follow us on</h4>
					<ul class="social-icons social-icons-big">
						<li>
							<a class="bg-dark text-warning text-5" href="#"><i class="fab fa-facebook-f text-warning"></i> </a>
						</li>
						<li>
							<a class="bg-dark text-warning text-5" href="#"><i class="fab fa-instagram text-warning"></i> </a>
						</li>
						<li>
							<a class="bg-dark text-warning text-5" href="#"><i class="fab fa-youtube text-warning"></i> </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<!-- Vendor -->
<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="<?= base_url() ?>vendor/popper/umd/popper.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>vendor/common/common.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?= base_url() ?>vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?= base_url() ?>vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>vendor/vide/jquery.vide.min.js"></script>
<script src="<?= base_url() ?>vendor/vivus/vivus.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url() ?>js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?= base_url() ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url() ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url() ?>js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url() ?>js/theme.init.js"></script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-12345678-1', 'auto');
ga('send', 'pageview');
</script>
-->

</body>
</html>
