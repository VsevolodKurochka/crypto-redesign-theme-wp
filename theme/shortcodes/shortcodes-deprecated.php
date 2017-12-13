<?php
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
					<span class="block-counter__content-element-number">2</span>
					<span class="block-counter__content-element-number">3</span>
					<span class="block-counter__content-element-number">4</span>
					<span class="block-counter__content-element-number">5</span>
					<span class="block-counter__content-element-number">6</span>
					<span class="block-counter__content-element-number">7</span>
					<span class="block-counter__content-element-number">8</span>
					<span class="block-counter__content-element-number">9</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">1</span>
					<span class="block-counter__content-element-number">2</span>
					<span class="block-counter__content-element-number">3</span>
					<span class="block-counter__content-element-number">4</span>
					<span class="block-counter__content-element-number">5</span>
					<span class="block-counter__content-element-number">6</span>
					<span class="block-counter__content-element-number">7</span>
					<span class="block-counter__content-element-number">8</span>
					<span class="block-counter__content-element-number">9</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">1</span>
					<span class="block-counter__content-element-number">2</span>
					<span class="block-counter__content-element-number">3</span>
					<span class="block-counter__content-element-number">4</span>
					<span class="block-counter__content-element-number">5</span>
					<span class="block-counter__content-element-number">6</span>
					<span class="block-counter__content-element-number">7</span>
					<span class="block-counter__content-element-number">8</span>
					<span class="block-counter__content-element-number">9</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">1</span>
					<span class="block-counter__content-element-number">2</span>
					<span class="block-counter__content-element-number">3</span>
					<span class="block-counter__content-element-number">4</span>
					<span class="block-counter__content-element-number">5</span>
					<span class="block-counter__content-element-number">6</span>
					<span class="block-counter__content-element-number">7</span>
					<span class="block-counter__content-element-number">8</span>
					<span class="block-counter__content-element-number">9</span>
				</li>
				<li class="block-counter__content-element">
					<span class="block-counter__content-element-number">1</span>
					<span class="block-counter__content-element-number">2</span>
					<span class="block-counter__content-element-number">3</span>
					<span class="block-counter__content-element-number">4</span>
					<span class="block-counter__content-element-number">5</span>
					<span class="block-counter__content-element-number">6</span>
					<span class="block-counter__content-element-number">7</span>
					<span class="block-counter__content-element-number">8</span>
					<span class="block-counter__content-element-number">9</span>
				</li>
			</ul>
		</div>';
	return $return;
}
?>