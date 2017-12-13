<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crypto
 */

?>

	</div><!-- #content -->
	<?php 
		if(is_page('affilate-programm')) :
			get_template_part('sections/contact-section-2');
		else:
			get_template_part('sections/contact-section-1');
		endif;
	?>
	<footer class="vsite-footer" id="colophon">
		<div class="vsite-footer__inner">
			<div class="vsite-footer__container vcontainer">
				<div class="vsite-footer__row vrow">
					<div class="vsite-footer__column vsite-footer__column_menu vcol-12 vcol-sm-6">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_class' => 'vsite-footer__menu'
						)); ?>
						<div class="vsite-footer__detail">
							<div class="vsite-footer__detail-row vrow">
								<div class="vcol-12 vcol-md-6">
									<p>&copy; Cryptonet <?php echo date("Y"); ?></p>
									<?php if(get_option('phone')) : ?>
										<a href="<?php echo get_option('phone'); ?>"><?php echo get_option('phone') ?></a>
									<?php endif; ?>
								</div>
								<div class="vcol-12 vcol-md-6">
									<?php if(get_option('phone')) : ?>
									<p>
										<?php 
											if(get_locale() == 'ru_RU'): 
												echo get_option('city');
											else:
												echo get_option('city_en');
											endif;
										?>
									</p>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="vsite-footer__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
						</div>
					</div>
					<div class="vsite-footer__column vsite-footer__column_info vcol-12 vcol-sm-6">
						<div class="vsite-footer__info">
							<p class="vsite-footer__info-title">
								<?php 
									if(get_locale() == 'ru_RU'): 
										_e('Следите за нами, чтобы получать последние новости из криптовселенной', 'crypto');
									else:
										_e('Follow us to receive the latest news from the cryptowned', 'crypto');
									endif;
								?>
							</p>
							<div class="vsite-footer__info-body">
								<?php
									$array_social = array(
										'facebook' 		=> 'vactive',
										'vk' 					=> '',
										'youtube' 		=> '',
										'telegram' 		=> ''
									);
								?>
								<div class="vtabs">
									<ul class="vtabs__list">
										<?php 
										foreach ($array_social as $social => $social_status) : 
											//echo $social_status;

										if(get_option($social)) : 

										?>
												
										<li class='vtabs__list-item <?php echo $social_status; ?>'>
											<a class="vtabs__list-item-link " data-action="tab" data-target="#footer-info-tab-<?php echo $social;?>">
												<i class="vtabs__item-link-icon vfa vfa-<?php echo $social;?>"></i>
											</a>
										</li>
											
										<?php 

											endif;

										endforeach; ?>
									</ul>
									<div class="vtabs__content">
										<?php foreach ($array_social as $social_tab => $social_tab_class) : ?>
										
											<?php if(get_option($social_tab)) : ?>
												<div class="vtabs__content-inner <?php echo $social_tab_class; ?>" id="footer-info-tab-<?php echo $social_tab?>">
													<div class="vtabs__content-inner-block">
														<a href="<?php echo get_option($social_tab); ?>" class="btn btn_size-lg btn_brand-1" target="_blank">
															<?php 
																if(get_locale() == 'ru_RU'): 
																	_e('Подписаться', 'crypto');
																else:
																	_e('Subscribe', 'crypto');
																endif;
															?>
														</a>
														<div class="vtabs__content-inner-block-info">
															<p class="vtabs__content-inner-block-info-title"><?php echo get_option($social_tab . '_number'); ?></p>
															<p>
																<?php 
																	if(get_locale() == 'ru_RU'): 
																		_e('подписчика', 'crypto');
																	else:
																		_e('subscribers', 'crypto');
																	endif;
																?>
															</p>
														</div>
													</div>
												</div>
											<?php endif; ?>
						
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Place  Scripts -->
  <?php 
	  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	    $ip = $_SERVER['REMOTE_ADDR'];
	}
	$data = file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip);
	$data = json_decode($data);
	?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/intlTelInput/intlTelInput.js"></script>
	<script>
		jQuery(document).ready(function(){
			jQuery("input[type='tel']").intlTelInput({
	      // allowDropdown: false,
	      // autoHideDialCode: false,
	      // autoPlaceholder: "off",
	      // dropdownContainer: "body",
	      // excludeCountries: ["us"],
	      // formatOnDisplay: false,
	       geoIpLookup: function(callback) {

	          callback("<?php echo $data->geoplugin_countryCode ?>");
	  
	       },
	      // hiddenInput: "full_number",
	      initialCountry: "auto",
	       nationalMode: false,
	      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
	      // placeholderNumberType: "MOBILE",
	       preferredCountries: ['uk', 'ru'],
	      // separateDialCode: true,
	      utilsScript: "<?php echo get_template_directory_uri(); ?>/js/intlTelInput/utils.js"
	    });
		});
	</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
