<?php

add_action( 'pre_get_posts', 'hovercraft_hide_certain_categories' );

function hovercraft_hide_certain_categories( $wp_query ) {
	$portal_category = get_theme_mod( 'hovercraft_portal_category', 'none' );
	$portal_category_id = get_cat_ID( $portal_category );

	$bullets_category = get_theme_mod( 'hovercraft_bullets_category', 'none' );
	$bullets_category_id = get_cat_ID( $bullets_category );

	$excluded_categories = array_filter( array( $portal_category_id, $bullets_category_id ) );

	if ( empty( $excluded_categories ) ) {
		return;
	}

	if ( ! is_admin() && ! is_category( $excluded_categories ) ) {
		$wp_query->set( 'category__not_in', $excluded_categories );
	}
}

// https://wordpress.stackexchange.com/questions/31553/is-there-a-quick-way-to-hide-category-from-everywhere
// https://stackoverflow.com/questions/13750619/if-is-not-category-wordpress-with-multiple-categories
