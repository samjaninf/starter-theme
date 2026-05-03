<?php

function hovercraft_is_custom_post_type( $post = null ) {
    $all_custom_post_types = get_post_types( array( '_builtin' => false ) );

    // there are no custom post types
    if ( empty( $all_custom_post_types ) ) {
        return false;
    }

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    // could not detect current type
    if ( ! $current_post_type ) {
        return false;
    }

    return in_array( $current_post_type, $custom_types, true );
}

// https://wordpress.stackexchange.com/questions/6731/how-do-test-if-a-post-is-a-custom-post-type
