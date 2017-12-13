<?php
/*
Element Description: vc New Icon
*/
 
// Element Class 
class vcNewNumbers extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_numbers_mapping' ) );
				add_shortcode( 'vc_new_numbers', array( $this, 'vc_new_numbers_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_numbers_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Блок с цифрами', 'crypto'),
								'base' => 'vc_new_numbers',
								'description' => __('Блок с цифрами', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),         
								'params' => array(
										array(
					            "type" => "textarea_html",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Заголовок", "crypto" ),
					            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					            "value" => __( "", "crypto" ),
					            "description" => __( "Введите Заголовок.", "crypto" )
						        ),
						        array(
					            "type" => "textarea",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Описание", "crypto" ),
					            "param_name" => "description", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
					            "value" => __( "", "crypto" ),
					            "description" => __( "Введите Описание.", "crypto" )
						        )
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_numbers_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title'					=> '',
									'description' 	=> ''
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$html = '
				<div class="vnumbers">
				 	
				 	<div class="vnumbers__header">
						<p class="vnumbers__title">' . $content . '</p>
				 	</div>
					<div class="vnumbers__body">
						'.$description.'
					</div>
				</div>';      
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcNewNumbers();
?>