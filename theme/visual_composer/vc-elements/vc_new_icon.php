<?php
/*
Element Description: VC New Icon
*/
 
// Element Class 
class vcNewIcon extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_icon_mapping' ) );
				add_shortcode( 'vc_new_icon', array( $this, 'vc_new_icon_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_icon_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Блок с иконками', 'crypto'),
								'base' => 'vc_new_icon',
								'description' => __('Блок с иконками', 'crypto'), 
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
										),
										array(
											'type' => 'textfield',
											'holder' => 'p',
											'class' => 'title-class',
											'heading' => __( 'Дополнительный класс', 'text-domain' ),
											'param_name' => 'add_class',
											'value' => "",
											'description' => __( 'Необязательно.', 'text-domain' ),
											'admin_label' => false,
											'weight' => 0
										),
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_icon_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title' => '',
									'image_url' => 'image_url',
									'add_class'	=> ''
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$img = wp_get_attachment_image_src($image_url, "large");
				$imgSrc = $img[0];

				$html = '
				<div class="vicon '.$add_class.'">
				 	<div class="vicon__header">
						<div class="vicon__image-wrapper">
							<img src="'.$imgSrc.'" alt="">
						</div>
						<p class="vicon__title">'.$title.'</p>
				 	</div>
					<div class="vicon__content">
						' . $content . '
					</div>
				</div>';      
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcNewIcon();
?>