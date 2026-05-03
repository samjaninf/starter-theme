<?php 
$post_id = get_the_ID();
$hide_title_status = get_post_meta( $post_id, '_hovercraft_hide_title', true );

if ( '' === $hide_title_status ) {
	$hide_title_status = get_post_meta( $post_id, '_mysite_meta_hide_title', true );
}

if ( $hide_title_status !== 'on' ) : ?>
	<h1 class="<?php $h1_divider_display = get_theme_mod( 'hovercraft_h1_divider_display', 'none' );
	if ( $h1_divider_display === 'everywhere_possible' || $h1_divider_display === 'everywhere_except_heros' ) { echo esc_attr( 'divide' ); } ?>"><?php echo esc_html( get_the_title() ); ?></h1>
<?php endif; ?>
