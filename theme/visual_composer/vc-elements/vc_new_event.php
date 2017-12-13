<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcEvent extends WPBakeryShortCode {
		 
		// Element Init
		function __construct() {
				add_action( 'init', array( $this, 'vc_new_event_mapping' ) );
				add_shortcode( 'vc_new_event', array( $this, 'vc_new_event_html' ) );
		}
		 
		// Element Mapping
		public function vc_new_event_mapping() {
				 
				// Stop all if VC is not enabled
				if ( !defined( 'WPB_VC_VERSION' ) ) {
						return;
				}
				 
				// Map the block with vc_map()
				vc_map( 
						array(
								'name' => __('Мероприятие', 'crypto'),
								'base' => 'vc_new_event',
								'description' => __('Мероприятие', 'crypto'), 
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
										),
										
										array(
											"type" => "textfield",
											"holder" => "div",
											"class" => "",
											"heading" => __( "Описание Мероприятия:", "crypto" ),
											"param_name" => "subtitle",
											"value" => __( "", "crypto" ),
											"description" => __( "Введите описание мероприятия.", "crypto" )
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
											'type' => 'textfield',
											'holder' => 'div',
											'class' => 'title-class',
											'heading' => __( 'Дата:', 'text-domain' ),
											'param_name' => 'date',
											'value' => "",
											'description' => __( 'Введите дату.', 'text-domain' ),
											'admin_label' => false,
											'weight' => 0
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
										)
								),
						)
				);
				
		}
		 
		 
		// Element HTML
		public function vc_new_event_html( $atts, $content = null ) {
				 
				// Params extraction
				extract(
						shortcode_atts(
								array(
									'title' 			=> '',
									'subtitle'		=> '',
									'link'				=> '',
									'image_url' 	=> 'image_url',
									'format'			=> '',
									'date'				=> ''
								), 
								$atts
						)
				);
				 
				// Fill $html var with data
				$img = wp_get_attachment_image_src($image_url, "large");
				$imgSrc = $img[0];

				$html = '
				<div class="event-item">
					<div class="event-item__header">
						<img src="'.$imgSrc.'" alt="" class="event-item__image">
						<div class="event-item__content">
							<p class="event-item__title">'.$title.'</p>
							<p class="event-item__subtitle">'.$subtitle.'</p>
						</div>
					</div>
					
					<div class="event-item__footer">
						<div class="event-item__footer-item">
							<p>'.$date.'</p>
							<p>'.$format.'</p>
						</div>
						<div class="event-item__footer-item">
							<a href="'.$link.'" class="btn btn_brand-1 event-item__btn" target="_blank">Узнать подробнее</a>
						</div>
					</div>
				</div>';      
				 
				return $html;
				 
		}
		 
} // End Element Class
 
 
// Element Class Init
new vcEvent();
?>