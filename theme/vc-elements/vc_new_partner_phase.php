<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcPartnerPhase extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_partner_phase_mapping' ) );
				add_shortcode( 'vc_new_partner_phase', array( $this, 'vc_new_partner_phase_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_partner_phase_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Фаза', 'crypto'),
								'base' => 'vc_new_partner_phase',
								'description' => __('Фаза', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),         
								'params' => array(
										array(
					            "type" => "textfield",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Название этапа", "crypto" ),
					            "param_name" => "title",
					            "value" => __( "", "crypto" ),
					            "description" => __( "Введите Название этапа. Например: `Второе бесплатное видео` ", "crypto" )
						        ),
						        array(
					            "type" => "textfield",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Дата этапа", "crypto" ),
					            "param_name" => "date",
					            "value" => __( "", "crypto" ),
					            "description" => __( "Введите Дату. Например: 1/11", "crypto" )
						        ),
						        array(
					            "type" => "textfield",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Дополнительный класс", "crypto" ),
					            "param_name" => "add_class",
					            "value" => __( "", "crypto" ),
					            "description" => __( "Необязательно.", "crypto" )
						        )
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_partner_phase_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title'			=> '',
									'date'			=> '',
									'add_class'	=> ''
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$html = '
				<div class="partner-phase__item '.$add_class.'">' . $content . '
					<div class="partner-phase__item-header">
						<p class="partner-phase__item-number">'.$date.'</p>
					</div>
					<p class="partner-phase__item-title">'.$title.'</p>
				</div>';
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcPartnerPhase();
?>