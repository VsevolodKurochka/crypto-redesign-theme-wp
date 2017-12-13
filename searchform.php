<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
  <?php
  	$input_placeholder = '';
  	if(get_locale() == 'ru_RU') :
  		$input_placeholder .= 'Поиск';
  	else:
  		$input_placeholder .= 'Search';
  	endif;
  ?>
	<input type="text" class="search_input" placeholder="<?php _e($input_placeholder, 'crypto') ?>" value="<?php echo get_search_query() ?>" name="s" id="s" />
	<button type="submit" id="searchsubmit">Submit</button>

</form>