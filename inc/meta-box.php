<?php

function mysite_page_metabox() {
    add_meta_box( 
        'remove-title', 
        __( 'HoverCraft Theme', 'textdomain' ), 
        'hide_title_callback', 
        'page', 
        'side', 
        'high' 
    );
}
add_action( 'add_meta_boxes', 'mysite_page_metabox' );

function hide_title_callback( $post ) {
    wp_nonce_field( 'mysite_action_name', 'mysite_nonce_field_name' );

    $value = get_post_meta( $post->ID, '_mysite_meta_hide_title', true );
    ?>
    <label for="hide">Hide Page Title: </label><input type="checkbox" id="hide" name="hide" <?php checked( $value, 'on' ); ?>>
    <?php
}

function mysite_save_postdata( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! isset( $_POST['mysite_nonce_field_name'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mysite_nonce_field_name'] ) ), 'mysite_action_name' ) ) {
        return;
    }

    if ( isset( $_POST['hide'] ) ) {
        update_post_meta( $post_id, '_mysite_meta_hide_title', 'on' );
    } else {
        update_post_meta( $post_id, '_mysite_meta_hide_title', 'off' );
    }
}
add_action( 'save_post', 'mysite_save_postdata' );
