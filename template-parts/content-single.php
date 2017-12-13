<?php
/**
* Theme Variables
*/
require get_template_directory() . '/theme/helpers/variables.php'; ?>
<section class="<?php echo $theme_section; ?>">
	<div class="vcontainer">
		<div class="<?php echo $theme_row; ?>">
			<div class="<?php echo $theme_part_content; ?>">
				<?php 
					get_template_part('theme/content/single/single-article');
					get_template_part('theme/content/single/single-telegram');
					get_template_part('theme/content/single/single-author');
					
					get_template_part('theme/content/single/single-social');
					get_template_part('theme/content/single/single-recent-posts');
				?>
			</div>
			<div class="<?php echo $theme_part_sidebar; ?>">
				<?php get_template_part( 'sidebar'); ?>
			</div>
		</div>
	</div>
</section>