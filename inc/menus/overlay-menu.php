<?php

function hovercraft_overlay_menu() {
    wp_enqueue_script(
        'overlay_menu', // unique name 
        get_template_directory_uri().'/assets/js/overlay-menu.js', // location
        array('jquery'), // dependencies
        HOVERCRAFT_VERSION,
        true
    );
}

add_action( 'wp_enqueue_scripts', 'hovercraft_overlay_menu' );

// https://wpmudev.com/blog/adding-jquery-scripts-wordpress/
