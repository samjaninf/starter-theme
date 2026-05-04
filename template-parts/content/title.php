<?php if ( ! hovercraft_is_title_hidden() ) : ?>
	<h1 class="<?php $h1_divider_display = get_theme_mod( 'hovercraft_h1_divider_display', 'none' );
	if ( $h1_divider_display === 'everywhere_possible' || $h1_divider_display === 'everywhere_except_heros' ) { echo esc_attr( 'divide' ); } ?>"><?php echo esc_html( get_the_title() ); ?></h1>
<?php endif; ?>
