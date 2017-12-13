<div class="vrow entry-navigation">
	<div class="vcol-12 vcol-sm-6">
		<?php $prevPost = get_previous_post(true); if($prevPost) : ?>
		<?php setup_postdata($prevPost); ?>
		<article id="post-<?php echo get_the_ID($prevPost->ID); ?>" class="article-item">
			<div class="article-item-inner">
				<?php 
				$next_post_has_video = '';
				if( get_field('article_video', $prevPost->ID) ) : 
					$prev_post_has_video .= 'article-item-image_video';
				endif;
				?>
				<div class="article-item-image <?php echo $prev_post_has_video; ?>">
					<a href="<?php the_permalink($prevPost->ID);?>">
						<?php if(has_post_thumbnail($prevPost->ID)): ?>
							<?php echo get_the_post_thumbnail($prevPost->ID); ?></a>
						<?php else: ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/category.png" alt="">
						<?php endif; ?>
					</a>
				</div>
				<?php if(has_tag($prevPost->ID) ): ?>
					<div class="article-item-tag article-item-icon article-item-icon-tag">
						<span><?php the_tags(''); ?></span>
					</div>
				<?php endif; ?>

				<h2 class="article-item-title">
					<a class="article-item-title-link" href="<?php the_permalink($prevPost->ID) ?>" rel="bookmark" title="<?php echo get_the_title($prevPost->ID); ?>"> <?php echo get_the_title($prevPost->ID) ?></a>
				</h2>

				<div class="article-item-body">
					<?php
						 echo get_the_excerpt($prevPost->ID); 
					//my_excerpt( $prevPost->ID, 15 ); ?>
				</div>
				<footer class="article-item-footer">
					<div class="article-item-info">
						<span><?php echo get_the_date('d.m.Y', $prevPost->ID); ?></span>
					</div>
					<div class="article-item-info">
						<span class="article-item-views"><?php the_views(); ?></span>
					</div>
				</footer>
			</div>
		</article>
		<?php endif; ?>
	</div>
	<div class="vcol-12 vcol-sm-6">
		<?php $nextPost = get_next_post(true); if($nextPost) : ?>
			<?php setup_postdata($nextPost); ?>
			<article id="post-<?php echo get_the_ID($nextPost->ID); ?>" class="article-item">
				<div class="article-item-inner">
					<?php 
					$next_post_has_video = '';
					if( get_field('article_video', $prevPost->ID) ) : 
						$next_post_has_video .= 'article-item-image_video';
					endif;
					?>
					<div class="article-item-image <?php echo $next_post_has_video ?>">
						<a href="<?php the_permalink($nextPost->ID);?>">
							<?php if(has_post_thumbnail($nextPost->ID)): ?>
								<?php echo get_the_post_thumbnail($nextPost->ID); ?></a>
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/category.png" alt="">
							<?php endif; ?>
						</a>
					</div>
					<?php if(has_tag($nextPost->ID) ): ?>
						<div class="article-item-tag article-item-icon article-item-icon-tag">
							<span><?php the_tags(''); ?></span>
						</div>
					<?php endif; ?>

					<h2 class="article-item-title">
						<a class="article-item-title-link" href="<?php the_permalink($nextPost->ID) ?>" rel="bookmark" title="<?php echo get_the_title($nextPost->ID); ?>"> <?php echo get_the_title($nextPost->ID) ?></a>
					</h2>

					<div class="article-item-body">
						<?php
								echo get_the_excerpt($nextPost->ID); 
						//my_excerpt( $nextPost->ID, 15 ); ?>
					</div>
					<footer class="article-item-footer">
						<div class="article-item-info">
							<span><?php echo get_the_date('d.m.Y', $nextPost->ID); ?></span>
						</div>
						<div class="article-item-info">
							<span class="article-item-views"><?php the_views(); ?></span>
						</div>
					</footer>
				</div>
			</article>
		<?php endif; ?>
	</div>
</div>