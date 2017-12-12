<section class="vsection">
	<div class="vcontainer">
		<div class="vrow">
			<div class="vcol-12 vcol-md-9">
				<article class="entry-article">
					<header class="entry-header">
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
					</header>
					<?php if( has_post_thumbnail() ) : ?>
					 <div class="entry-image">
						<?php the_post_thumbnail('post-thumb');?>
					 </div>
					<?php endif; ?>
					<div class="entry-info">
						<div class="entry-info-part">
							<span class="entry-info-date"><?php the_date(); ?></span>
						</div>
						<div class="entry-info-part">
							<span class="entry-info-part-views"><?php the_views(); ?></span>
						</div>
					</div>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<div class="entry-message">
					<a href="#" class="entry-message__link">
						<div class="entry-message__row vrow">
							<div class="entry-message__column entry-message__column_icon vcol-12 vcol-sm-2">
								<img src="<?php echo get_template_directory_uri() ?>/img/icon-telegram.svg" class="entry-message__icon">
							</div>
							<div class="vcol-12 vcol-sm-10">
								<?php if(get_locale() === 'ru_RU') : ?>
									<p>Подпишитесь на наш <span class="entry-message-line">канал в телеграм</span>, чтобы быть в курсе новостей из мира криптовалют</p>
								<?php else : ?>
									<p>Subscribe <span class="entry-message-line">to our channel in telegram</span> to to keep abreast of the news from the world of crypto currency</p>
								<?php endif; ?>
							</div>
						</div>
					</a>
				</div>
				<div class="entry-author">
					<?php get_template_part('theme/content/author'); ?>
				</div>
				<div class="entry-social">
					<?php echo do_shortcode('[Sassy_Social_Share]') ?>
				</div>
				<div class="vrow entry-navigation">
          <div class="vcol-12 vcol-sm-6">
            <?php $prevPost = get_previous_post(true); if($prevPost) : ?>
            	<?php setup_postdata($prevPost); ?>
              <article id="post-<?php echo get_the_ID($prevPost->ID); ?>" class="article-item">
								<div class="article-item-inner">
									<div class="article-item-image">
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
										 //echo get_the_excerpt($prevPost->ID); 
											my_excerpt( $prevPost->ID, 15 ); ?>
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
									<div class="article-item-image">
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
										 //echo get_the_excerpt($nextPost->ID); 
											my_excerpt( $nextPost->ID, 15 ); ?>
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
			</div>
			<div class="vcol-12 vcol-md-3">
				<?php get_template_part( 'sidebar'); ?>
			</div>
		</div>
	</div>
</section>