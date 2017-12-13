<?php
function set_custom_excerpt_length( $length ) {
    global $custom_excerpt_length;
    if( ! isset( $custom_excerpt_length ) ) {
        return $length;
    }
    return $custom_excerpt_length;
}

function my_excerpt( $post_id = null, $length = 55 ) {
    global $custom_excerpt_length, $post;
    $custom_excerpt_length = $length;
    if( is_null( $post_id ) ) {
        $post_id = $post->ID;
    }
    add_filter( 'excerpt_length', 'set_custom_excerpt_length', 999 );
    echo get_the_excerpt( $post_id );
    remove_filter( 'excerpt_length', 'set_custom_excerpt_length', 999 );
}
function get_post_entry_content($direction){
	// Check type of direction
	$choise = null;
	$choise = ($direction == 'prev') ? get_previous_post(true) : get_next_post(true);
	// echo '<pre>';
	// print_r($choise);
	// echo '</pre>';
	$choiseID = $choise->ID;
	if($choise) : ?>
	<article id="post-<?php echo get_the_ID($choiseID); ?>" class="article-item">
		<div class="article-item-inner">
			<div class="article-item-image">
				<a href="<?php the_permalink($choiseID);?>">
					<?php if(has_post_thumbnail($choiseID)): ?>
						<?php echo get_the_post_thumbnail($choiseID); ?></a>
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/category.png" alt="">
					<?php endif; ?>
				</a>
			</div>
			<?php if(has_tag($choiseID) ): ?>
				<div class="article-item-tag article-item-icon article-item-icon-tag">
					<span><?php the_tags(''); ?></span>
				</div>
			<?php endif; ?>
			
			<h2 class="article-item-title">
				<a class="article-item-title-link" href="<?php the_permalink($choiseID) ?>" rel="bookmark" title="<?php echo get_the_title($choiseID); ?>"> <?php echo get_the_title($choiseID) ?></a>
			</h2>
			
			<div class="article-item-body">
				 <?php
				 //echo get_the_excerpt($choiseID); 
					my_excerpt( $choise->ID, 15 ); ?>
			</div>
			<footer class="article-item-footer">
				<div class="article-item-info">
					<span><?php echo get_the_date($choiseID); ?></span>
				</div>
				<div class="article-item-info">
					<span class="article-item-views"><?php the_views(); ?></span>
				</div>
			</footer>
		</div>
	</article>
<?php endif;
	}
?>