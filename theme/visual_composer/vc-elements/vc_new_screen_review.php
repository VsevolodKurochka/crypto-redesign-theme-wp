<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcNewScreenReview extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_screen_review_mapping' ) );
				add_shortcode( 'vc_new_screen_review', array( $this, 'vc_new_screen_review_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_screen_review_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Скриншоты с соц.сети (телеграм, вк...)', 'crypto'),
								'base' => 'vc_new_screen_review',
								'description' => __('Скриншоты с соц.сети (телеграм, вк...)', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),
								
								'params' => array(
										array(
											'type' => 'attach_images',
											'holder' => 'div',
											'class' => 'title-class',
											'heading' => __( 'Выберите картинки', 'text-domain' ),
											'param_name' => 'screenshots',
											'value' => "",
											'description' => __( 'Выберите картинки', 'text-domain' ),
											'admin_label' => false,
											'weight' => 0
										)
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_screen_review_html( $atts ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'screenshots' 	=> 'screenshots'
								), 
								$atts
						)
				);
				 
				$get_images_ID = explode(',' , $screenshots );

				$return = '<div class="review-screenshots">';
				foreach( $get_images_ID as $image_id ){
					$image = wp_get_attachment_image_src( $image_id, 'full' );
					$image_url = $image[0];
					$return .= '<div class="review-screenshots__item"><img src="'. $image_url .'" alt="" /></div>';
				}
				$return .= '</div>';
				 
				return $return;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcNewScreenReview();
?>