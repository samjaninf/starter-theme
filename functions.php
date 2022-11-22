<?php

// select menu
// disabled // require get_template_directory() . '/inc/select-menu.php';

// back to top
require get_template_directory() . '/inc/back-to-top.php';

// suggest git updater
require get_template_directory() . '/inc/suggest-git-updater.php';

// widget areas
require get_template_directory() . '/inc/widget-areas.php';

// menu locations
require get_template_directory() . '/inc/menu-locations.php';

// featured images
require get_template_directory() . '/inc/featured-images.php';

// default logo
require get_template_directory() . '/inc/logo-default.php';

// alternative logo
require get_template_directory() . '/inc/logo-alternative.php';

// custom header
require get_template_directory() . '/inc/custom-header.php';

// customizer settings
require get_template_directory() . '/inc/customizer-settings.php';

// video uploader
require get_template_directory() . '/inc/header-video.php';

// widget titles
require get_template_directory() . '/inc/widget-titles.php';

// breadcrumbs
require get_template_directory() . '/inc/breadcrumbs.php';

// variables
$welcome = "Stop fixing your WordPress theme, and focus on your business.";
global $hovercraft_excerpt;
$hovercraft_excerpt = "HoverCraft is a WordPress theme focused on saving you time and avoiding maintenance tasks. Instead of messing with page builders, DOM elements, and settings, HoverCraft is largely hardcoded, with only a handful of menus, widgets, and CSS classes that you can lightly customize for new projects or clients. Future-proof WordPress designs, like never before...";

// WooCommerce support
// add_theme_support('woocommerce');
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'hovercraft_main_start', 10);
add_action('woocommerce_after_main_content', 'hovercraft_main_end', 10);

function hovercraft_main_start() {
    echo '<div id="main">';
}

function hovercraft_main_end() {
    echo '</div>';
}

// page excerpts
add_post_type_support( 'page', 'excerpt' );
