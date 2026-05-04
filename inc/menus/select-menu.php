<?php

function hovercraft_select_menu() {
	wp_enqueue_script(
		'hovercraft_select_menu',
		get_template_directory_uri() . '/assets/js/select-menu.js',
		array( 'jquery' ),
		HOVERCRAFT_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'hovercraft_select_menu' );
