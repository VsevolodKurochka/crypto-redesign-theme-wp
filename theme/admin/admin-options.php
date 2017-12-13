<?php
function vprint_input($args) {
	$name = stripslashes(get_option($args['name']));
	echo '<input type="text" name='.$args['name'].' id='.$args['name'].' value="'.esc_attr($name).'" />';
}
function vdisplay_theme_panel_fields(){
	$items = array(
		'envelope' => array(
			'title'	 => 'Введите email'
		),
		'phone' => array(
			'title'	 => 'Введите телефон'
		),
		'city' => array(
			'title'	 => 'Введите город(ру)'
		),
		'city_en' => array(
			'title'	 => 'Введите город(en)'
		),
		'facebook' => array(
			'title'	 => 'Введите Facebook'
		),
		'facebook_number' => array(
			'title'	 => 'Количество подписчиков в Facebook'
		),
		'vk' => array(
			'title'	 => 'Введите VK'
		),
		'vk_number' => array(
			'title'	 => 'Количество подписчиков в VK'
		),
		'youtube' => array(
			'title'	 => 'Введите Youtube'
		),
		'youtube_number' => array(
			'title'	 => 'Количество подписчиков в Youtube'
		),
		'telegram' => array(
			'title'	 => 'Введите Telegram'
		),
		'telegram_number' => array(
			'title'	 => 'Количество подписчиков в Telegram'
		),
	);
	
	// id
	// title
	// callback
	// theme-options
	// https://wp-kama.ru/function/add_settings_section
	add_settings_section("section", "Контактные данные", null, "theme-options");

	foreach ($items as $item => $item_info) {
		// id
		// title
		// callback
		// page
		// section
		add_settings_field(
			$item,
			$item_info['title'],
			'vprint_input',
			'theme-options',
			'section',
			array(
				'name'	=> $item
			)
		);
		// option_group
		// option_name
		register_setting("section", $item);
	}

	add_settings_section("section-manager", "Данные менеджера", null, "theme-options");

	$manager_array = array(
		'photo'	=> array(
			'title'	=> 'Фото менеджера'
		),
		'name'	=> array(
			'title'	=> 'Имя менеджера'
		),
		'name_en'	=> array(
			'title'	=> 'Имя менеджера(en)'
		),
		'position'=> array(
			'title'	=> 'Должность менеджера'
		),
		'position_en'	=> array(
			'title'	=> 'Должность менеджера(en)'
		),
		'phone'	=> array(
			'title'	=> 'Телефон менеджера'
		),
		'telegram' => array(
			'title'	=> 'Телеграм менеджера'
		),
		'envelope' => array(
			'title'	 => 'Почта менеджера'
		)
	);

	// LOGO
	// function logo_setting() {  
	// 	echo '<input type="file" name="logo" />';
	// }
	
	// add_settings_field('logo', 'Фото менеджера:', 'logo_setting', 'theme-options', 'section-manager');

	// register_setting("section-manager", 'logo');
	// END LOGO

	foreach ($manager_array as $manager => $manager_info) {

		// id
		// title
		// callback
		// page
		// section
		$id = 'manager_' . $manager;
		$manager_title = $manager_info['title'];

		add_settings_field(
			$id,
			$manager_title,
			'vprint_input',
			'theme-options',
			'section-manager',
			array(
				'name'	=> $id
			)
		);

		// option_group
		// option_name
		register_setting("section-manager", $id);
	}
}
?>

<?php function theme_settings_page() { ?>

<div class="wrap">
	<h1><?php _e('Настройки сайта', 'crypto'); ?></h1>
	<form method="post" action="options.php" enctype="multipart/form-data">

		<?php settings_fields("section"); ?>

		<?php settings_fields("section-manager"); ?>


		<?php do_settings_sections("theme-options"); ?>
		<?php
		submit_button(); 
		?>
	</form>
</div>
<?php } ?>

<?php
function add_theme_menu_item() {
	add_menu_page("Настройки сайта", "Настройки сайта", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}


add_action("admin_init", "vdisplay_theme_panel_fields");
add_action("admin_menu", "add_theme_menu_item");
?>