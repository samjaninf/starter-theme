<?php /* Template Name: Full Hero (Sidebar) */ ?>
<?php get_template_part( 'header' ); ?>
<?php get_template_part( 'template-parts/header/header-full-hero' ); ?>

	<?php if ( is_active_sidebar( 'hovercraft_posthero' ) && in_array( get_theme_mod( 'hovercraft_posthero_widget_display' ), array(
		'full_hero_only',
		'full_and_half_hero',
		'full_and_half_and_mini_hero'
		) )) : ?>
		<?php get_template_part( 'template-parts/content/posthero' ); ?>
	<?php endif; ?>

<?php if ( hovercraft_should_show_main_content() ) { ?>

<div id="main">
<div class="inner">
    
    <div id="primary">

	    <?php get_template_part( 'template-parts/content/content' ); ?>
	
	    <?php get_template_part( 'template-parts/content/comments' ); ?>

	    <div class="clear"></div>
    </div><!-- primary -->
    
    <?php get_template_part( 'sidebar' ); ?>
    
    <?php get_template_part( 'template-parts/content/pagination' ); ?>
    
    <div class="clear"></div>
</div><!-- inner -->
</div><!-- main -->

<?php } ?>

<?php get_template_part( 'footer' ); ?>
