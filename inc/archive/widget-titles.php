<?php

add_filter( 'widget_title', 'hovercraft_widget_title', 10, 3 );

function hovercraft_widget_title( $title, $instance, $id_base ) {
	if ( 'hovercraft_copyright' === $id_base ) {
		return '';
	}

	return $title;
}

// https://presscustomizr.com/snippet/dynamically-changing-the-widget-title-depending-on-the-context/
