<?php /* Template Name: Basic Gallery (No Sidebar) */ ?>
<?php get_template_part( 'header' ); ?>
<?php get_template_part( 'template-parts/header/header-basic' ); ?>

<?php $hovercraft_homepage_hide_main_checked = get_theme_mod( 'hovercraft_homepage_hide_main' ) ? true : false;
if ( !is_front_page() || ( is_front_page() && $hovercraft_homepage_hide_main_checked != true ) ) { ?>

<div id="main">
<div class="inner">
	
    <div id="primary">
		
	    	<div id="content-wrapper">
			
				<?php get_template_part( 'template-parts/content/featured-image' ); ?>
				
				<div id="content-padded">
					<?php get_template_part( 'template-parts/content/breadcrumbs' ); ?>
					<?php get_template_part( 'template-parts/content/title' ); ?>
					<?php get_template_part( 'template-parts/content/loop' ); ?>
					<?php get_template_part( 'template-parts/content/gallery' ); ?>
					<?php get_template_part( 'template-parts/content/pagination' ); ?>
					<?php get_template_part( 'template-parts/content/comments' ); ?>
				<div class="clear"></div>
				</div><!-- content-padded -->
				
			</div><!-- content-wrapper -->

	<div class="clear"></div>
    </div><!-- primary -->
        
<div class="clear"></div>
</div><!-- inner -->
</div><!-- main -->

<?php } //endif is_front_page ?>

<?php get_template_part( 'footer' ); 
// https://wordpress.org/support/topic/show-all-attached-images-of-a-specific-post/
?>
