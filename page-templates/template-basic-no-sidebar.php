<?php /* Template Name: Basic (No Sidebar) */ ?>
<?php get_template_part( 'header' ); ?>
<?php get_template_part( 'template-parts/header/header-basic' ); ?>

<?php $hovercraft_homepage_hide_main_checked = get_theme_mod( 'hovercraft_homepage_hide_main' ) ? true : false;
if ( !is_front_page() || ( is_front_page() && $hovercraft_homepage_hide_main_checked != true ) ) { ?>

<div id="main">
<div class="inner">
    
	<div id="primary-wide">
	
		<div id="content">
			
			<?php get_template_part( 'template-parts/content/breadcrumbs' ); ?>
						
			<?php $url_featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' ); 
			if ( !empty( $url_featured_image ) ) { ?>
			<img class="featured-image" src="<?php echo $url_featured_image; ?>" />
			<?php } ?>
		
			<div class="content-padded">
				<h1><?php the_title(); ?></h1>
				<?php get_template_part( 'template-parts/content/loop' ); ?>
				<?php get_template_part( 'template-parts/content/last-modified' ); ?>
				<?php get_template_part( 'template-parts/content/pagination' ); ?>
				<?php get_template_part( 'template-parts/content/comments' ); ?>
			<div class="clear"></div>
			</div><!-- content-padded -->
	
		</div><!-- content -->

	<div class="clear"></div>
	</div><!-- primary-wide -->
	
<div class="clear"></div>
</div><!-- inner -->
</div><!-- main -->

<?php } //endif is_front_page ?>

<?php get_template_part( 'footer' ); ?>
