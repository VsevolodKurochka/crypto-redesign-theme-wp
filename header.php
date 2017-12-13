<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crypto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if(isset($_GET['test']))  : ?>
		<meta name="google-site-verification" content="p0U68pHHom4lVbXn2Yxr95FVguPmUg1rbmhKRL4Re_g" />
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KZTPS7K');</script>
		<!-- End Google Tag Manager -->
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-104622405-1', 'auto');
		  ga('send', 'pageview');

		</script>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="vfixed vfixed_md-top" id="nav-wrapper">
	<div class="vtop-info">
		<div class="vtop-info__container vcontainer">
			<div class="vtop-info__row vrow">
				<div class="vtop-info__column vtop-info__column_info vcol-6">
					<div class="vtop-info__translate">
						<?php get_sidebar('switcher') ?>
					</div>
					<div class="vtop-info__course">
						<span class="vtop-info__course-title"><?php echo (get_locale() == 'ru_RU') ? 'Курс биткойна' : 'Course bitcoin'; ?></span>
						<span class="vtop-info__course-number js-course-value"></span>
						<span class="vtop-info__course-currency js-cource-currency">$</span>
						<span class="vtop-info__course-data">(<span class="js-current-date"></span>, <span class="js-current-time"></span>)</span>
					</div>
				</div>
				<div class="vtop-info__column vtop-info__column_contact vcol-6">
					<ul class="vsocial">
						<?php 
						$social_header = array('envelope', 'facebook', 'vk', 'youtube', 'telegram');
						foreach ($social_header as $social_item) :
						?>
							<?php if(get_option($social_item)) : ?>
								<li class="vsocial__item">
									<a class="vsocial__item-link" href="<?php echo get_option($social_item); ?>">
										<i class="vsocial__item-link-icon vfa vfa-<?php echo $social_item;?>"></i>
										<?php if($social_item == 'envelope') : ?>
											<span class="vsocial__item-text"><?php echo get_option($social_item); ?></span>
										<?php endif; ?>
									</a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="vnav vnav_style">
		<div class="vnav__container vcontainer">
			<div class="vnav__row vrow vflex-y-center">
				<div class="vnav__logo vcol-12 vcol-md-4">
					<button class="vhamburger" type="button" id="js-vnav__btn">
						<span class="vhamburger__lines">
							<span>Line1</span>
							<span>Line2</span>
							<span>Line3</span>
						</span>
					</button>
					<div class="vnav__logo-content">
						<a href="<?php echo site_url() ?>">
							<img class="vnav__logo-content-img" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="" role="presentation"/>
						</a>
					</div>
				</div>
				<nav class="vnav__menu vcol-12 vcol-md-8" id="navigation">
					<div class="vnav__menu-inner">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'container_class' => 'menu'
						)); ?>
					</div>
					<div class="vnav__menu-inner">
						<ul>
							<li class="menu-item">
								<a class="btn btn_brand-1 btn_navigation" href="<?php echo get_permalink('204'); ?>">
									<?php 
										if(get_locale() == 'ru_RU'):
											_e('Бесплатная консультация', 'crypto');
										else:
											_e('Free consultation', 'crypto');
										endif; 
									?>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<div id="page" class="site">
	<?php if( ! (is_front_page() || is_page_template('template-main.php') || is_single()) ) : ?>
		<header class="vsite-header">
			<div class="vsite-header__container vcontainer">
				<h1 class="vtitle-lg">
					<?php
						if( is_post_type_archive() ) :
              post_type_archive_title();

            elseif( is_search() ) :
              if( have_posts() ) :
                echo get_search_query();
              else:
              	if(get_locale() == 'ru_RU'):
                	esc_html_e( 'Мы ничего не нашли', 'crypto' );
                else:
                	esc_html_e( 'We did not find anything', 'crypto' );
                endif;
              endif;

            elseif(is_category()) :
              single_cat_title();

            elseif( is_404() ) :
            	if(get_locale() == 'ru_RU'):
              	_e( '404!<br> Эта страница не найдена.', 'crypto' );
              else:
              	_e( '404!<br> This page was not found.', 'crypto' );
              endif;

            elseif( is_tax() ) :
              single_term_title();

            else:
              the_title();

            endif;
					?>
				</h1>
			</div>
			<div class="wave-header-row">
				<div class="wave wave-header wave-header_static">
					<?php echo do_shortcode('[wave]'); ?>
				</div>
			</div>
		</header>
	<?php endif; ?>
	<div id="content" class="site-content">