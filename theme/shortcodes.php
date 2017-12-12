<?php
function blog_func($atts){

	extract(shortcode_atts(array(
		'per_page'			=> '15',
		'row_class' 		=> 'vrow',
		'column_class'	=> '',
		'pagination'		=> "false"
	), $atts));

	$args1 = array(
		'post_type'				=> 'post',
		'post_status'			=> 'publish',
		'posts_per_page'	=> $per_page
	);
	$query = new WP_Query($args1);
	if( $query->have_posts() ){
		$return = '<div class="'.$row_class.'">';
		while ( $query->have_posts() ) {

			$query->the_post();
			ob_start();
			get_template_part('template-parts/article');
			$return .= ob_get_clean();
		}
		$return .= '</div>';
	}
	return $return;
}
add_shortcode('blog', 'blog_func');

function formShortcode($atts){
	extract(shortcode_atts(array(
		'id'							=> "1",
		'path'						=> "SiteConsultation",
		'button_text' 		=> "Отправить заявку",
		'button_text_en'	=> 'Send form',
		'name' 						=> "true",
		'phone' 					=> "true",
		'class' 					=> "block"
	), $atts));
	$case_html = 	'<form accept-charset="utf-8" action="http://cryptonet.biz/api.client2crm_2/" id="'.$id.'" method="post" class="_form vform vform_'.$class.'">';

	if($name == "true") :
		if(get_locale() == 'ru_RU') :
			$case_html .= '<div class="vform__row vform__row_name"><input class="vform__control" name="first_name" type="text" placeholder="Ваше имя" required /></div>';
		else:
			$case_html .= '<div class="vform__row vform__row_name"><input class="vform__control" name="first_name" type="text" placeholder="Your Name" required /></div>';
		endif;
	endif;

	if(get_locale() == 'ru_RU') :
		$case_html .= '<div class="vform__row vform__row_email"><input class="vform__control" name="email" type="email" placeholder="Ваш email" required /></div>';
	else:
		$case_html .= '<div class="vform__row vform__row_email"><input class="vform__control" name="email" type="email" placeholder="Your email" required /></div>';
	endif;
	
	if($phone == "true") :
		if(get_locale() == 'ru_RU') :
			$case_html .= '<div class="vform__row vform__row_phone"><input class="vform__control" name="phone" type="text" value="" placeholder="Ваш телефон" required /></div>';
		else:
			$case_html .= '<div class="vform__row vform__row_phone"><input class="vform__control" name="phone" type="text" value="" placeholder="Your phone" required /></div>';
		endif;
		
	endif;
	$case_html .= '<input type="hidden" name="c2cFormId" value="'.$path.'" class="id_form_name" > ';
	$case_html .= '<div class="_form-thank-you" style="display: none"></div>';

	if(get_locale() == 'ru_RU') :
		$case_html .= '<div class="vform__row"><button type="submit" class="vform__button btn btn_size-fluid btn_size-lg btn_brand-1">'.$button_text.'</button></div>';
	else:
		$case_html .= '<div class="vform__row"><button type="submit" class="vform__button btn btn_size-fluid btn_size-lg btn_brand-1">'.$button_text_en.'</button></div>';
	endif;
	
	$case_html .= '</form>';
	return $case_html;
}
add_shortcode('form', 'formShortcode');

function lines(){
	ob_start();
	get_template_part('svg/lines');
	$lines = ob_get_clean();
	return $lines;
}
add_shortcode('line', 'lines');

function wave(){
	ob_start();
	get_template_part('svg/part-svg-1');
	get_template_part('svg/part-svg-2');
	$return = ob_get_clean();
	return $return;
}
add_shortcode('wave', 'wave');


function block_counter_function($atts){
	extract(shortcode_atts(array(
		'title'	=> ''
	), $atts));
	$return = '<div class="block-counter">
			<div class="block-counter__header">
				'.$title.'
			</div>
			<div class="block-counter__info">
				<p class="block-counter__date js-current-date"></p>
				<p>1 bitcoin = <span class="block-counter__highlight js-course-value"></span><span class="block-counter__highlight">$</span></p>
			</div>
			<ul class="block-counter__content">
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">1</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">5</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">0</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">3</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">7</span>
				</li>
			</ul>
		</div>';
	return $return;
}
add_shortcode('block_counter', 'block_counter_function');

function quote_entry($atts, $content = null){
	extract(shortcode_atts(array(
		'name'	=> ''
	), $atts));
	$return = '<blockquote class="entry-content-blockquote">
	<div class="entry-content-blockquote-body">'.$content.'</div>
	<p class="entry-content-blockquote-footer">'.$name.'</p>
	</blockquote>';
	return $return;
}
add_shortcode('q', 'quote_entry');

// Allow using shortcode inside widget
add_filter('widget_text','do_shortcode');
?>