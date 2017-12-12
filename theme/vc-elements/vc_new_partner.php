<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcPartner extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_partner_mapping' ) );
				add_shortcode( 'vc_partner', array( $this, 'vc_partner_html' ) );
		}
		 
		// Element Mapping
		public function vc_partner_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Партнер', 'crypto'),
								'base' => 'vc_partner',
								'description' => __('Партнер', 'crypto'), 
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
											'heading' => __( 'Заголовок', 'text-domain' ),
											'param_name' => 'title',
											'value' => __( 'Заголовок', 'text-domain' ),
											'description' => __( 'Введите заголовок', 'text-domain' ),
											'admin_label' => false,
											'weight' => 0
										),
										array(
											"type" => "textarea_html",
											"holder" => "div",
											"class" => "",
											"heading" => __( "Описание", "crypto" ),
											"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
											"value" => __( "", "crypto" ),
											"description" => __( "Введите Описание.", "crypto" )
										)
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_partner_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title' => '',
									'image_url' => 'image_url'
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$img = wp_get_attachment_image_src($image_url, "large");
				$imgSrc = $img[0];

				$html = '
				<div class="vpartner">
				 	<div class="vpartner__header">
						<img src="'.$imgSrc.'" alt="">
				 	</div>
				 	<p class="vpartner__title">'.$title.'</p>
					<div class="vpartner__content">
						' . $content . '
					</div>
				</div>';      
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcPartner();
?>