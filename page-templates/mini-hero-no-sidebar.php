<?php /* Template Name: Mini Hero (No Sidebar) */ ?>
<?php get_template_part( 'header' ); ?>
<?php get_template_part( 'template-parts/header/header-mini-hero' ); ?>

	<?php if ( is_active_sidebar( 'hovercraft_posthero' ) && in_array( get_theme_mod( 'hovercraft_posthero_widget_display' ), array(
		'full_and_half_and_mini_hero'
		) )) : ?>
		<?php get_template_part( 'template-parts/content/posthero' ); ?>
	<?php endif; ?>

<?php if ( hovercraft_should_show_main_content() ) { ?>

<div id="main">
<div class="inner">
    
	<div id="primary-wide">
	
		<?php get_template_part( 'template-parts/content/content-wide' ); ?>
	
		<?php get_template_part( 'template-parts/content/comments' ); ?>

		<div class="clear"></div>
	</div><!-- primary-wide -->
    
    <?php get_template_part( 'template-parts/content/pagination' ); ?>
	
    <div class="clear"></div>
</div><!-- inner -->
</div><!-- main -->

<?php } ?>

<?php get_template_part( 'footer' ); ?>
