<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcNewVideoReview extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_video_review_mapping' ) );
				add_shortcode( 'vc_new_video_review', array( $this, 'vc_new_video_review_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_video_review_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Видео отзыв', 'crypto'),
								'base' => 'vc_new_video_review',
								'description' => __('Видео', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),
								
								'params' => array(
										array(
											'type' => 'attach_image',
											'holder' => 'div',
											'class' => 'title-class',
											'heading' => __( 'Выберите картинку', 'text-domain' ),
											'param_name' => 'image_url',
											'value' => __( 'Default value', 'text-domain' ),
											'description' => __( 'Выберите картинку', 'text-domain' ),
											'admin_label' => false,
											'weight' => 0
										),
										array(
											'type' => 'textfield',
											'holder' => 'p',
											'class' => 'title-class',
											'heading' => __( 'Заголовок:', 'text-domain' ),
											'param_name' => 'title',
											'value' => "",
											'description' => __( 'Введите заголовок.', 'text-domain' ),
											'admin_label' => false,
											'weight' => 0
										)
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_video_review_html( $atts ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title' 			=> '',
									'image_url' 	=> 'image_url'
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$img = wp_get_attachment_image_src($image_url, "large");
				$imgSrc = $img[0];

				$return = '<div class="review-item"><div class="review-item__header"><img src="'.$imgSrc.'" alt="'.$title.'"></div><p class="review-item__title">'.$title.'</p></div>';    
				 
				return $return;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcNewVideoReview();
?>