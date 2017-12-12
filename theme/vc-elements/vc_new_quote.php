<?php
/*
Element Description: VC New Quote
*/
 
// Element Class 
class vcNewQuote extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_review_mapping' ) );
				add_shortcode( 'vc_new_review', array( $this, 'vc_new_review_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_review_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Текстовая цитата', 'crypto'),
								'base' => 'vc_new_review',
								'description' => __('Текстовая цитата', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),         
								'params' => array(
										array(
					            "type" => "textarea_html",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Отзыв", "crypto" ),
					            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					            "value" => __( "", "crypto" ),
					            "description" => __( "Текстовая цитата", "crypto" )
						        )
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_review_html( $atts, $content = null ) {

				// Fill $html var with data
				$html = '
				<div class="vc-infobox-wrap">
					<blockquote class="blockquote">' . $content . '</blockquote>
				</div>';      
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcNewQuote();
?>