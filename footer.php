<div class="clear"></div>

<?php if ( is_active_sidebar( 'hovercraft_home_postmain_top' ) && is_front_page() ) { ?>
<div id="home-postmain-top">
<div class="inner">
	<?php dynamic_sidebar( 'hovercraft_home_postmain_top' ); ?>
	<div class="clear"></div>
</div><!--inner -->
</div><!-- home-postmain-top -->
<?php } ?>

<?php if ( is_active_sidebar( 'hovercraft_home_postmain_bottom' ) && is_front_page() ) { ?>
<div id="home-postmain-bottom">
<div class="inner">
	<?php dynamic_sidebar( 'hovercraft_home_postmain_bottom' ); ?>
	<div class="clear"></div>
</div><!--inner -->
</div><!-- home-postmain-bottom -->
<?php } ?>

<?php if ( is_active_sidebar( 'hovercraft_prefooter_top' ) ) { ?>
<div id="prefooter-top">
<div class="inner">
	<?php dynamic_sidebar( 'hovercraft_prefooter_top' ); ?>
	<div class="clear"></div>
</div><!--inner -->
</div><!-- prefooter-top -->
<?php } ?>

<?php if ( is_active_sidebar( 'hovercraft_prefooter_bottom' ) ) { ?>
<div id="prefooter-bottom">
<div class="inner">
	<?php dynamic_sidebar( 'hovercraft_prefooter_bottom' ); ?>
	<div class="clear"></div>
</div><!--inner -->
</div><!-- prefooter-bottom -->
<?php } ?>

<?php if ( is_active_sidebar( 'hovercraft_footer_one' ) || is_active_sidebar( 'hovercraft_footer_two' ) || is_active_sidebar( 'hovercraft_footer_three' ) ) { ?>
<div id="footer">
<div class="inner">
	
	<?php if ( get_theme_mod( 'hovercraft_footer_columns' ) == 'four_equal') { 
		get_template_part( 'template-parts/footer/footer-four-columns-equal' );
	} elseif ( get_theme_mod( 'hovercraft_footer_columns' ) == 'four_weighted') {
		get_template_part( 'template-parts/footer/footer-four-columns-unequal' );
	} elseif ( get_theme_mod( 'hovercraft_footer_columns' ) == 'three_equal') {
		get_template_part( 'template-parts/footer/footer-three-columns-equal' );
	} elseif ( get_theme_mod( 'hovercraft_footer_columns' ) == 'three_weighted') {
		get_template_part( 'template-parts/footer/footer-three-columns-unequal' );
	} else {
		get_template_part( 'template-parts/footer/footer-four-columns-unequal' );
	} ?>
	
	<div class="clear"></div>
</div><!--inner -->
</div><!-- footer -->
<?php } ?>

<div id="copyright">
	<div class="inner">
		
	<div class="copyright-left">
		&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. Powered by <a rel="nofollow" href="https://hovercraft.vip">HoverCraft</a>.
	<div class="clear"></div>
	</div><!-- copyright-left -->
	
	<?php if ( is_active_sidebar('hovercraft_copyright')) { ?>
	<div class="copyright-right">
		<?php add_filter('widget_title', '__return_false');
		dynamic_sidebar( 'hovercraft_copyright' ); // https://stackoverflow.com/questions/13903918/apply-widget-title-filter-only-to-wordpress-widgets-from-a-certain-sidebar
		remove_filter('widget_title', '__return_false'); ?>
	<div class="clear"></div>
	</div><!-- copyright-right -->
	<?php } ?>
	
	<?php $hovercraft_scroll_to_top = get_theme_mod( 'hovercraft_scroll_to_top', 'mobile_only' );
	if ( $hovercraft_scroll_to_top != 'none' ) { ?>
	<div class="scrollup-wrapper">
		<a class="scrollup-link" href="#top">Back to top<i class="material-icons arrow_upward">arrow_upward</i></a>
	</div><!-- scrollup-wrapper -->
	<?php } ?>

	<div class="clear"></div>
</div><!--inner -->
</div><!-- copyright -->

</div><!-- container -->

<?php $hovercraft_search_icon = get_theme_mod( 'hovercraft_search_icon', 'none' );
	if ( $hovercraft_search_icon != 'none' ) { ?>
	<div id="full-screen-search">
		<button type="button" class="close"><i class="material-icons close">close</i></button>
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				<div id="full-screen-search-container">
					<input type="text" name="s" placeholder="<?php _e( 'Search entire site...' ); ?>" />
				</div>
			</form>
	</div><!-- full-screen-search -->
<?php } ?>

<?php wp_footer(); ?>

</body><!-- body -->
</html><!-- html -->
