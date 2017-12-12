<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcEventLarge extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_event_large_mapping' ) );
				add_shortcode( 'vc_new_event_large', array( $this, 'vc_new_event_large_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_event_large_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Мероприятие (большой формат)', 'crypto'),
								'base' => 'vc_new_event_large',
								'description' => __('Мероприятие (большой формат)', 'crypto'), 
								'category' => __('Для работы с сайтом', 'crypto'),         
								'params' => array(
										array(
											'type' => 'attach_image',
											'holder' => 'div',
											'class' => 'title-class',
											'heading' => __( 'Выберите картинку', 'crypto' ),
											'param_name' => 'image_url',
											'value' => __( 'Default value', 'crypto' ),
											'description' => __( 'Выберите картинку', 'crypto' ),
											'admin_label' => false,
											'weight' => 0
										),
										array(
											'type' => 'textfield',
											'holder' => 'p',
											'class' => 'title-class',
											'heading' => __( 'Заголовок:', 'crypto' ),
											'param_name' => 'title',
											'value' => "",
											'description' => __( 'Введите заголовок.', 'crypto' ),
											'admin_label' => false,
											'weight' => 0
										),
										array(
											'type' => 'textfield',
											'holder' => 'p',
											'class' => 'title-class',
											'heading' => __( 'Верхний индекс у заголовка:', 'crypto' ),
											'param_name' => 'top_index',
											'value' => "",
											'description' => __( 'Необязательно.', 'crypto' ),
											'admin_label' => false,
											'weight' => 0
										),
										array(
											'type' => 'textfield',
											'holder' => 'p',
											'class' => 'title-class',
											'heading' => __( 'Скидка:', 'crypto' ),
											'param_name' => 'sale',
											'value' => "",
											'description' => __( 'Необязательно.', 'crypto' ),
											'admin_label' => false,
											'weight' => 0
										),
										
										array(
											"type" => "textarea_html",
											"holder" => "div",
											"class" => "",
											"heading" => __( "Описание:", "crypto" ),
											"param_name" => "content",
											"value" => __( "", "crypto" ),
											"description" => __( "Введите описание.", "crypto" )
										),
										array(
											"type" => "textfield",
											"holder" => "div",
											"class" => "",
											"heading" => __( "Ссылка на Мероприятие", "crypto" ),
											"param_name" => "link",
											"value" => __( "", "crypto" ),
											"description" => __( "Введите ссылку мероприятия.", "crypto" )
										),
										array(
											'type'        		=> 'dropdown',
											'heading'     		=> __('Выберите формат'),
											'param_name'  		=> 'format',
											'admin_label' 		=> true,
											'value'       		=> array(
												'online'   			=> 'Online',
												'offline'   		=> 'Offline'
											),
											'std'         => 'online', // Your default value
											'description' => __('Выберите формат:')
										),
										array(
											'type' => 'textfield',
											'holder' => 'div',
											'class' => 'title-class',
											'heading' => __( 'Количество просмотров:', 'crypto' ),
											'param_name' => 'views',
											'value' => "",
											'description' => __( 'Введите количество просмотров.', 'crypto' ),
											'admin_label' => false,
											'weight' => 0
										)
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_event_large_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'image_url'			=> '',
									'title'					=> '',
									'top_index'			=> '',
									'sale'					=> '',
									'link'					=> '',
									'format'				=> '',
									'views'					=> ''
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$img = wp_get_attachment_image_src($image_url, "large");
				$imgSrc = $img[0];


				$return = '<div class="event-large-item">';
					$return .= '<div class="vrow event-large-item__row">';

						// Image
						$return .= '<div class="vcol-12 vcol-sm-4">
													<div class="event-large-item__header">
														<img src="'.$imgSrc.'" alt="" class="event-large-item__image">
													</div>
												</div>';
						// End image
						
						$return .= '<div class="vcol-12 vcol-sm-8">'; // Start Text Column

							// Title
							$return .= '<p class="event-large-item__title">';
								$return .= $title;
								if(!empty($top_index)) :
									$return .= '<sup class="event-large-item__title-index">'.$top_index.'</sup>';
								endif;
								if(!empty($sale)) :
									$return .= '<span class="event-large-item__title-sale">'.$sale.'</span>';
								endif;
							$return .= '</p>';
							// End title

							// Content
							$return .= '
								<div class="event-large-item__content">'.wpautop($content).'</div>
								<div class="event-large-item__btn-wrapper">
									<a href="'.$link.'" class="btn btn_brand-1 event-large-item__btn" target="_blank">'.__('Узнать подробнее').'</a>
								</div>
								<footer class="event-large-item__footer">
									<p>'.$format.'</p>
									<p><span class="event-large-item__views">'.$views.'</span></p>
								</footer>';  

						$return .= '</div>'; // End Text Column

					$return .= '</div>';
				$return .= '</div>';
				
				    
				 
				return $return;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcEventLarge();
?>