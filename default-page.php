<?php get_header(); ?>
<section class="vsection">
  <div class="vcontainer">
    <div class="vrow">
      <div class="vcol-12 vcol-md-8">
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
      <div class="vcol-12 vcol-md-4">
        <?php get_template_part( 'sidebar'); ?> 
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>