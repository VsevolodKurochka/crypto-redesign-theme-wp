<?php
// Fixed bug with hidding mce-panel
// @author Vsevolod Kurochka
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
	echo '<style>
		.mce-panel {
			z-index: 999999 !important;
		} 
	</style>';
}

?>