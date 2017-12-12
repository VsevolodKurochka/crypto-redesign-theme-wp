<?php get_header(); ?>


   <?php
      // Start the Loop.
      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content-single');
      endwhile;
    ?>

<?php get_footer(); ?>