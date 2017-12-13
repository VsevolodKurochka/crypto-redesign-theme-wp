<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcPartnerScheme extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_partner_scheme_mapping' ) );
				add_shortcode( 'vc_new_partner_scheme', array( $this, 'vc_new_partner_scheme_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_partner_scheme_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Схема воронки продаж', 'crypto'),
								'base' => 'vc_new_partner_scheme',
								'description' => __('Схема воронки продаж', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),         
								'params' => array(
										array(
					            "type" => "textfield",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Количество", "crypto" ),
					            "param_name" => "title",
					            "value" => __( "", "crypto" ),
					            "description" => __( "Введите количество", "crypto" )
						        ),
						        array(
					            "type" => "textfield",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Индекс", "crypto" ),
					            "param_name" => "index",
					            "value" => __( "", "crypto" ),
					            "description" => __( "Индекс", "crypto" )
						        ),
						        array(
					            "type" => "textfield",
					            "holder" => "div",
					            "class" => "",
					            "heading" => __( "Основной текст", "crypto" ),
					            "param_name" => "main_content",
					            "value" => __( "", "crypto" ),
					            "description" => __( "Необязательно.", "crypto" )
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
		public function vc_new_partner_scheme_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title'	=> '',
									'index'	=> '',
									'main_content'	=> '',
									'add_class'	=> ''
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$html = '<div class="partner-scheme__item '.$add_class.'">';
					$html .= '<div class="partner-scheme__item-header">';

						$html .= '<p class="partner-scheme__item-number">';
							$html .= $title;
							if( $index ) {
								$html .= '<sup>' . $index . '</sup>';
							}
						$html .= '</p>';
					$html .= '</div>';
				$html .= '<p class="partner-scheme__item-title">'.$main_content.'</p>';
				$html .= '</div>';
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcPartnerScheme();
?>