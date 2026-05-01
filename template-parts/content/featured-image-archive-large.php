<?php

$image_id = get_post_thumbnail_id( get_the_ID() );

if ( empty( $image_id ) || is_singular( 'product' ) ) {
    return;
}

$url_featured_image_large = wp_get_attachment_image_src( $image_id, 'large' );

if ( empty( $url_featured_image_large ) ) {
    return;
}

$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
$image_width = $url_featured_image_large[1];
$image_height = $url_featured_image_large[2];
?>
<a href="<?php the_permalink(); ?>"><img width="<?php echo esc_attr( $image_width ); ?>" height="<?php echo esc_attr( $image_height ); ?>" class="featured-image-archive-large" src="<?php echo esc_url( $url_featured_image_large[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" /></a>
<div class="clear"></div>
