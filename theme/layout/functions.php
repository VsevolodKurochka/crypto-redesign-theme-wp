<?php
function layout_general_content_generate(){
	if( is_page() ) :
		echo '123';
	else:
		echo "it's not a page";
	endif;
}
add_action('layout_general_content', 'layout_general_content_generate');
?>