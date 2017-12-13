<?php
/*
Template Name: Шаблон Тестовый(не использовать)
See how i Used this template in /theme/layout
*/

get_header();
?>
<?php do_action('layout_general_before'); ?>
<section class="<?php echo $theme_section; ?>">
	<div class="vcontainer">
		<div class="<?php echo $theme_row; ?>">
			<div class="<?php echo $theme_part_content; ?>">
				<?php
		      // Start the Loop.
		      while ( have_posts() ) : the_post();
		        do_action('layout_general_content');
		      endwhile;
		    ?>
			</div>
			<div class="<?php echo $theme_part_sidebar; ?>">
				<?php get_template_part( 'sidebar'); ?>
			</div>
		</div>
	</div>
</section>
<?php do_action('layout_general_after'); ?>
<?php get_footer(); ?>