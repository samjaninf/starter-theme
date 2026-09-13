<?php

// block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// noindex tag archives
function hovercraft_noindex_tag_archives( $robots ) {
	if ( is_tag() ) {
		$robots['noindex'] = true;
	}

	return $robots;
}
add_filter( 'wp_robots', 'hovercraft_noindex_tag_archives' );
