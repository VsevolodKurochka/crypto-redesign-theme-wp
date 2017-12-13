<div class="entry-author">
	<div class="author">
		<div class="author__image">
			<?php echo get_avatar( get_the_author_meta('ID'), '320' ); ?>
		</div>
		<div class="author__information">
			<p class="author__title"><?php echo __('Автор статьи') ?>:</p>
			<p class="author__name"><?php the_author(); ?></p>
			<p class="author__description"><?php the_author_meta('description'); ?></p>
		</div>
	</div>
</div>