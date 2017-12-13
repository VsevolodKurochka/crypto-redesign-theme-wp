<?php get_header(); ?>
<?php require get_template_directory() . '/theme/helpers/variables.php'; ?>
<section class="<?php echo $theme_section; ?>">
  <div class="vcontainer">
    <div class="<?php echo $theme_row; ?>">
      <div class="<?php echo $theme_part_content; ?>">
        <div class="vrow">
          <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
            <div class="vcol-12 vcol-sm-6">
              <?php get_template_part('template-parts/article') ?>
            </div>
          <?php endwhile;  else: ?>
            <p class="vtitle">
              <?php 
                if( is_search() ) : 
                  if(!have_posts()) :
                    echo 'Мы ничего не нашли. Попробуйте с другим поисковым запросом.';
                  endif;
                else:
                  echo 'Записи появятся в скором времени';
                endif;
              ?>
            </p>
          <?php endif;  ?>
        </div>
        <div class="navigation">
          <?php wp_pagenavi(); ?>
        </div>
      </div>
      <div class="<?php echo $theme_part_sidebar; ?>">
        <?php get_template_part( 'sidebar'); ?> 
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>