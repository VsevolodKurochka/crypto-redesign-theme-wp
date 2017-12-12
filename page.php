<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crypto
 */

get_header(); ?>
<section class="vsection">
  <div class="vcontainer">
    <div class="vrow">
      <div class="vcol-12 vcol-md-8 entry-content">
      	<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
				?>
      </div>
      <div class="vcol-12 vcol-md-4">
        <?php get_template_part( 'sidebar'); ?> 
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>