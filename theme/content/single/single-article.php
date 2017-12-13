<article class="entry-article">
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header>
	<?php if( has_post_thumbnail() || get_field('article_video') ) : ?>
		<div class="entry-image">
			<?php if(get_field('article_video')) : ?>
				<iframe width="100%" src="https://www.youtube.com/embed/<?php echo 
				get_field('article_video'); ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
			<?php else : ?>
				<?php the_post_thumbnail('post-thumb');?>

			<?php endif; ?>

		</div>
	<?php endif; ?>
	<div class="entry-info">
		<div class="entry-info-part">
			<span class="entry-info-date"><?php the_date('d.m.Y'); ?></span>
		</div>
		<div class="entry-info-part">
			<span class="entry-info-part-views"><?php the_views(); ?></span>
		</div>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>