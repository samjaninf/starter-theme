<?php

// css from customizer
function hovercraft_generate_css(){
	
	$url_header_image = esc_url( get_header_image() );
	$url_featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' ); 
	
	if (!empty( $url_featured_image )) { 
		$hero_image = $url_featured_image; 
	} else { 
		$hero_image = $url_header_image; 
	}
    
	$topbar_background_color = get_theme_mod( 'hovercraft_topbar_background_color' );
	$topbar_font_color = get_theme_mod( 'hovercraft_topbar_font_color' );
	$topbar_link_color = get_theme_mod( 'hovercraft_topbar_link_color' );
	$hero_gradient_start_color = get_theme_mod( 'hovercraft_hero_gradient_start_color' );
	$hero_gradient_stop_color = get_theme_mod( 'hovercraft_hero_gradient_stop_color' );
    $header_half_hero_background_color = get_theme_mod( 'hovercraft_header_half_hero_background_color' );
    $header_mini_hero_background_color = get_theme_mod( 'hovercraft_header_mini_hero_background_color' );
    $header_basic_background_color = get_theme_mod( 'hovercraft_header_basic_background_color' );
    $prefooter_top_background_color = get_theme_mod( 'hovercraft_prefooter_top_background_color' );
    $prefooter_bottom_background_color = get_theme_mod( 'hovercraft_prefooter_bottom_background_color' );
    $footer_background_color = get_theme_mod( 'hovercraft_footer_background_color' );
    $copyright_background_color = get_theme_mod( 'hovercraft_copyright_background_color' );
     
    ?>

<style type="text/css" id="hovercraft_custom_css">
<?php if( !empty($topbar_background_color) && !empty($topbar_font_color) && !empty($topbar_link_color) ) { ?>
#topbar {
	background: <?php echo $topbar_background_color; ?>;
	color: <?php echo $topbar_font_color; ?>;
}

#topbar a {
	color: <?php echo $topbar_link_color; ?>;
}
<?php } ?>

<?php if( !empty($hero_image) && !empty($hero_gradient_start_color) ) { ?>
.splash-wide {
	background: linear-gradient(60deg, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba($r1, $g1, $b1, 0.7777485994397759)"; 
		?> 30%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba($r2, $g2, $b2, 0.1)"; 
		?> 100%), url(<?php echo $hero_image; ?>);
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
}

.splash-mini {
	background: linear-gradient(60deg, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba($r1, $g1, $b1, 0.7777485994397759)"; 
		?> 30%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba($r2, $g2, $b2, 0.1)"; 
		?> 100%), url(<?php echo $hero_image; ?>);
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
}
<?php } elseif( !empty($hero_image) && empty($hero_gradient_start_color) ) { ?>
.splash-wide {
	background: linear-gradient(60deg, rgba(55, 71, 79, 0.7777485994397759) 30%, rgba(255, 255, 255, 0.1) 100%), url(<?php echo $hero_image; ?>);
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
}

.splash-mini {
	background: linear-gradient(60deg, rgba(55, 71, 79, 0.7777485994397759) 30%, rgba(255, 255, 255, 0.1) 100%), url(<?php echo $hero_image; ?>);
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
}
<?php } elseif( empty($hero_image) && !empty($hero_gradient_start_color) ) { ?>
.splash-wide {
	background: linear-gradient(60deg, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba($r1, $g1, $b1, 0.7777485994397759)"; 
		?> 30%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba($r2, $g2, $b2, 0.1)"; 
		?> 100%);
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
}

.splash-mini {
	background: linear-gradient(60deg, <?php 
		list($r1, $g1, $b1) = sscanf($hero_gradient_start_color, "#%02x%02x%02x");
		echo "rgba($r1, $g1, $b1, 0.7777485994397759)"; 
		?> 30%, <?php 
		list($r2, $g2, $b2) = sscanf($hero_gradient_stop_color, "#%02x%02x%02x");
		echo "rgba($r2, $g2, $b2, 0.1)"; 
		?> 100%);
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
}
<?php } ?>

<?php if( !empty($header_half_hero_background_color) ) { ?>
#header-half-hero {
	background: <?php echo $header_half_hero_background_color; ?>;
}
<?php } ?>

<?php if( !empty($header_mini_hero_background_color) ) { ?>
#header-mini-hero {
	background: <?php echo $header_mini_hero_background_color; ?>;
}
<?php } ?>

<?php if( !empty($header_basic_background_color) ) { ?>
#header-basic {
	background: <?php echo $header_basic_background_color; ?>;
}
<?php } ?>

<?php if( !empty($prefooter_top_background_color) ) { ?>
#prefooter-top {
	background: <?php echo $prefooter_top_background_color; ?>;
}
<?php } ?>

<?php if( !empty($prefooter_bottom_background_color) ) { ?>
#prefooter-bottom {
	background: <?php echo $prefooter_bottom_background_color; ?>;
}
<?php } ?>

<?php if( !empty($footer_background_color) ) { ?>
#footer {
	background: <?php echo $footer_background_color; ?>;
}
<?php } ?>

<?php if( !empty($copyright_background_color) ) { ?>
#copyright {
	background: <?php echo $copyright_background_color; ?>;
}
<?php } ?>

</style>

<?php }
 
add_action( 'wp_head', 'hovercraft_generate_css' );
