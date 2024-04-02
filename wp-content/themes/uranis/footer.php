			<section class="section newsletter-section newsletter-section-about pb-0">
				<div class="container-fluid p-0">
					<div class="newsletter-wrap bg-size">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12">
									<div class="row">
										<div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 newsletter-wrap-text">
											<div class="section-header mb-3 mb-md-4">
												<h2 class="text-white mb-2 mb-md-3"><?= get_option('newsletter_title'); ?></h2>
												<p class="text-white m-0"><?= get_option('newsletter_caption'); ?></p>
											</div>
											<?= do_shortcode('[forminator_form id="548"]'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="footer footer-4">
				<div class="footer-top clearfix">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
								<h4 class="h4 text-uppercase">Quick Links</h4>
								<?php
								wp_nav_menu(array(
									'theme_location'  => 'quick-links',
									'container'       => 'ul',
									'menu_class'      => '',
									'li_class'        => '',
									'a_class'         => ''
								));
								?>
							</div>
							<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
								<h4 class="h4 text-uppercase">Product Glimpse</h4>
								<?php
								wp_nav_menu(array(
									'theme_location'  => 'footer-products',
									'container'       => 'ul',
									'menu_class'      => '',
									'li_class'        => '',
									'a_class'         => ''
								));
								?>
							</div>
							<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
								<h4 class="h4 text-uppercase">Quick Categories</h4>
								<?php
								wp_nav_menu(array(
									'theme_location'  => 'category-menu',
									'container'       => 'ul',
									'menu_class'      => '',
									'li_class'        => '',
									'a_class'         => ''
								));
								?>
							</div>
							<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-contact">
								<h4 class="h4 text-uppercase">Contact Us</h4>
								<h6>Headquarters Info:</h6>
								<p class="address d-flex"><i class="icon anm anm-map-marker-al pt-1"></i> <?= get_option('dip_address'); ?></p>
								<p class="phone d-flex align-items-center phone-icon-rotate" style="margin-left: -5px;"><i class="icon anm anm-phone-l"></i> <b class="me-1 d-none">Phone:</b> <a href="tel:<?= get_option('dip_ph_no'); ?>"><?= get_option('dip_ph_no'); ?></a></p>
								<p class="phone d-flex align-items-center"><i class="icon anm anm-whatsapp"></i> <b class="me-1 d-none">WhatsApp:</b> <a href="https://web.whatsapp.com/send?text=Hello&phone=<?= get_option('dip_whatsapp'); ?>"><?= get_option('dip_whatsapp'); ?></a></p>
								<p class="email d-flex align-items-center"><i class="icon anm anm-envelope-l"></i> <b class="me-1 d-none">Email:</b> <a href="mailto:<?= get_option('dip_email'); ?>"><?= get_option('dip_email'); ?></a></p>
								<hr>
								<h6>Branch Info:</h6>
								<p class="address d-flex"><i class="icon anm anm-map-marker-al pt-1"></i> <?= get_option('thani_address'); ?></p>
								<p class="phone d-flex align-items-center phone-icon-rotate" style="margin-left: -5px;"><i class="icon anm anm-phone-l"></i> <b class="me-1 d-none">Phone:</b> <a href="tel:<?= get_option('thani_ph_no'); ?>"><?= get_option('thani_ph_no'); ?></a></p>
								<p class="phone d-flex align-items-center"><i class="icon anm anm-whatsapp"></i> <b class="me-1 d-none">WhatsApp:</b> <a href="https://web.whatsapp.com/send?text=Hello&phone=<?= get_option('thani_whatsapp'); ?>"><?= get_option('thani_whatsapp'); ?></a></p>
								<p class="email d-flex align-items-center"><i class="icon anm anm-envelope-l"></i> <b class="me-1 d-none">Email:</b> <a href="mailto:<?= get_option('thani_email'); ?>"><?= get_option('thani_email'); ?></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom clearfix">
					<div class="container">
						<div class="row">
							<ul class="list-inline social-icons d-inline-flex align-items-center justify-content-center justify-content-sm-start col-12 col-sm-6 col-lg-6">
								<li class="list-inline-item"><a href="<?= get_option('facebook'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook" target="_blank"><i class="icon anm anm-facebook-f"></i></a></li>
								<li class="list-inline-item"><a href="<?= get_option('linkedin'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin" target="_blank"><i class="icon anm anm-linkedin-in"></i></a></li>
								<li class="list-inline-item"><a href="<?= get_option('insta'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram" target="_blank"><i class="icon anm anm-instagram"></i></a></li>
							</ul>
							<div class="copytext text-end col-12 col-md-12 col-lg-6 order-2 order-lg-0 mt-3 mt-lg-0">&copy; 2023, All rights reserved by URANIS. Design & Developed by <a href="http://artemisys.com/" target="_blank" style="color: #fff; font-weight: bold; font-style: italic;">Artemisys</a> </div>

						</div>
					</div>
				</div>
			</div>
			<script src="<?= get_template_directory_uri(); ?>/assets/js/plugins.js"></script>
			<script src="<?= get_template_directory_uri(); ?>/assets/js/main.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('ul.site-nav').attr('id', 'siteNav');
					$('ul.site-nav').find('li.menu-item-has-children').addClass('lvl1 parent dropdown');
					$('ul.site-nav').find('li.menu-item-has-children > a:first-child').append('<i class="icon anm anm-angle-down-l"></i>');
					$('ul.site-nav').find('li.menu-item-has-children > a:first-child').attr('href', '#');
					$('ul.site-nav').find('li.menu-item-has-children > ul').addClass('dropdown');
					$('ul.site-nav').find('li.menu-item-has-children > ul > li > a').addClass('site-nav lvl-2');
					$('ul.mobile-nav').attr('id', 'MobileNav');
					$('ul.mobile-nav').find('li.menu-item-has-children').addClass('lvl1 parent dropdown');
					$('ul.mobile-nav').find('li.menu-item-has-children > a:first-child').append('<i class="icon anm anm-angle-down-l"></i>');
					$('ul.mobile-nav').find('li.menu-item-has-children > a:first-child').attr('href', '#');
					$('ul.mobile-nav').find('li.menu-item-has-children > ul').addClass('lvl-2');
					$('ul.mobile-nav').find('li.menu-item-has-children > ul > li > a').addClass('site-nav');

					// $('#email-1').find('input').addClass('form-control newsletter-input mb-2 mb-sm-0 me-sm-2 border-0');
					// $('#forminator-module-548').addClass('d-flex flex-column flex-sm-row');
					$('.newsletter-wrap-text').find('.forminator-field').addClass('text-center');
					$('.newsletter-wrap-text').find('button.forminator-button').addClass('btn btn-primary newsletter-submit mt-1 mt-sm-0 ms-sm-1');
				});
			</script>


			<script>
				jQuery(document).ready(function() {
					setTimeout(function() {
						//var tag_new = jQuery("template").eq(38).attr("id");
						var tag_new = jQuery("template").last().attr("id");
						// console.log(tag_new);
						//alert(tag_new);
						jQuery("#" + tag_new).css("display", "none");
						jQuery("#" + tag_new).next().next().css("display", "none");
					}, 100);
				});
			</script>

			<script>
				$(document).ready(function() {
					$("#myInput").click(function() {
						$(".forminator-name--field").focus();
					});
				});
			</script>

			<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
			<script src="https://cdn.mysitemapgenerator.com/api/htmlsitemaps.min.js"></script>

			<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

			<?php wp_footer(); ?>
			</div>
			</body>

			</html>