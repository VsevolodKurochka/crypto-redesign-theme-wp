<article id="post-<?php the_ID(); ?>" class="article-item">
	<div class="article-item-inner">
		<?php 
			$post_has_video = '';
			if( get_field('article_video') ) : 
				$post_has_video .= 'article-item-image_video';
			endif;
		?>
		<div class="article-item-image <?php echo $post_has_video; ?>">
			<?php if(has_post_thumbnail()): ?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink();?>"><img src="<?php echo get_template_directory_uri(); ?>/img/category.png" alt=""></a>
			<?php endif; ?>
		</div>
		<?php if(has_tag()): ?>
			<div class="article-item-tag article-item-icon article-item-icon-tag">
				<span><?php the_tags(''); ?></span>
			</div>
		<?php endif; ?>
		
		<h2 class="article-item-title">
			<a class="article-item-title-link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"> <?php the_title() ?></a>
		</h2>
		
		<div class="article-item-body">
			 <?php echo excerpt(15); ?>
		</div>
		<footer class="article-item-footer">
			<div class="article-item-info">
				<span><?php echo get_the_date('d.m.Y'); ?></span>
			</div>
			<div class="article-item-info">
				<span class="article-item-views"><?php the_views(); ?></span>
			</div>
		</footer>
	</div>
</article>